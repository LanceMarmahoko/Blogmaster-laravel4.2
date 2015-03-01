 <hr>
<ul class="nav text-right">         
@if (Auth::guest())
    <li class="right-menu">{{HTML::linkRoute('register_user', 'Register') }}</li>
    <li class="right-menu">{{HTML::linkRoute('login', 'Login') }}</li>
@else
    <li  class="right-menu avatar"><img src="img/assets/avatar.jpg" alt="img">&nbsp;{{{Auth::User()->username}}}</li>
    <li>{{HTML::linkRoute('home', 'Preview') }}</li>
    <li>{{HTML::linkRoute('dashboard', 'Dashboard') }}</li>
    <li>{{HTML::linkRoute('post.create', 'Create') }}</li>
    <li> <a href="/settings/{{{Auth::User()->username}}}/edit">Settings</a></li>
    <li class="right-menu">{{HTML::linkRoute('logout', 'Logout') }}</li> 
  
@endif
</ul>
