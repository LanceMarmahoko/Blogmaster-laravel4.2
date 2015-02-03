@include('partials.header')  
<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav navbar-left">           
        <li>{{HTML::linkRoute('dashboard', 'Go to Dashboard') }}</li>
       </ul>
      <ul class="nav navbar-nav navbar-right">         
      		 <li><a href="#">Quick Help</a></li>
       </ul>
    </div>
</nav>

<div class="col-sm-8">
    @yield('content')
</div>
<div class="col-sm-4">
    @yield('sidebar')
</div>

@include('partials.footer')



