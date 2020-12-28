<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
              <h2 class="leader">Job Portal</h2>    
          </div>
          <div>
             <li class="btn btn-logout"><a class="text-white" href="{{route('client.logout')}}">Logout</a></li>
          </div>

        </div>
    </div>
</header>
<style>
 .leader{
   font-Size:2rem;
   color:#fff
 }
 .btn-logout{
 	color:#fff;
 	background-color: #49e4fa;
 	
 }
</style>