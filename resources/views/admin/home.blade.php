@extends('layouts.admin')
@section('content')
  
<div class="row mt-5">
        
 <div class="col-md-3">
    <div class="card bg-info ">
        <div class="card-heading text-center">
        	
        	 Jobs
        	
        </div>

            <div class="card-body">
               
               <h1 class="text-center">{{$jobs_count}}</h1>
               
            </div>
    </div>
    
    </div>
    
    
    <div class="col-md-3">
    <div class="card bg-danger ">
        <div class="card-heading text-center">
        	
        	Companies
        	
        </div>

            <div class="card-body">
               
               <h1 class="text-center">{{$company_count}}</h1>
               
            </div>
    </div>
    
    </div>
    
    
    <div class="col-md-3">
    <div class="card bg-success ">
        <div class="card-heading text-center">
        	
        	Categories
        	
        </div>

            <div class="card-body">
               
               <h1 class="text-center">{{$categories_count}}</h1>
               
            </div>
    </div>
    
    </div>
    
    
    <div class="col-md-3">
    <div class="card bg-info ">
        <div class="card-heading text-center">
        	
        	Admins
        	
        </div>

            <div class="card-body">
               
               <h1 class="text-center">{{$admins_count}}</h1>
               
            </div>
    </div>
    
    </div>
    <div class="col-md-3">
    <div class="card bg-warning ">
        <div class="card-heading text-center">
            
            Clients
            
        </div>

            <div class="card-body">
               
               <h1 class="text-center">{{$clients_count}}</h1>
               
            </div>
    </div>
    
    </div>
 </div>
    
@endsection
@section('scripts')
@parent
@endsection