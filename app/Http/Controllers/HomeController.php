<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Job;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $searchLocations = Location::pluck('name', 'id');
        $searchCategories = Category::pluck('name', 'id');
        $searchByCategory = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $jobs = Job::with('company')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs']));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function login(){
        return view('login');
      } 
      public function signup(){
        return view('signup');
      } 

      public function createAccount(Request $request){
          
        $this->validate($request, [
            'email' => 'required|unique:clients',
            'password' => 'required|min:4',

        ]);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();

        Session::flash('success','You successfully created a Account');

        return redirect()->route('login.user');
 

    }

    public function accessAccount(Request $request){
          
        $this->validate($request, [
		
            'email'=>'required',
            
            'password'=>'required|min:4',
            
        ]);	
            
        $client = Client::where('email', $request->input('email'))->first();

        if($client){
            if(Hash::check($request->input('password'),$client->password)){
                
               return redirect()->route('home'); 
            }
            Session::flash('info','Wrong Password');

           return redirect()->back();

        }
        else{
        Session::flash('info','You Dont have Account');

        return redirect()->back();  
        }

    } 

     public function logout()
     {

        return redirect()->route('login.user');
    }



}
