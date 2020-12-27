<?php

namespace App\Http\Controllers\Admin;

use App\Job;

use App\User;

use App\Company;

use App\Category;

use App\Client;

class HomeController
{
    public function index()
    {
        return view('admin.home')
           ->with('jobs_count',Job::all()->count())
			
			  ->with('company_count',Company::all()->count())
			
			  ->with('admins_count',User::all()->count())
			
			  ->with('categories_count',category::all()->count())
			  ->with('clients_count',Client::all()->count());
    }
}
