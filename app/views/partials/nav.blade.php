<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav navbar-left">           
        <li>{{HTML::linkRoute('home', 'Home') }}</li>
       </ul>
      <ul class="nav navbar-nav navbar-right">         
        @if (Auth::guest())
            <li>{{HTML::linkRoute('registeruser', 'Start') }}</li>
            <li>{{HTML::linkRoute('login', 'Login') }}</li>
        @else
            <li>{{HTML::linkRoute('post.create', 'Create') }}</li>
            <li> <a href="/settings/{{{Auth::User()->username}}}">Settings</a></li>
            <li>{{HTML::linkRoute('logout', 'Logout') }}</li> 
        @endif
       </ul>
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->