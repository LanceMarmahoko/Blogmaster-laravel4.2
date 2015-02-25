<ul>         
@if (Auth::guest())
    <li>{{HTML::linkRoute('register_user', 'Register') }}</li>
    <li>{{HTML::linkRoute('login', 'Login') }}</li>
@else
    <li>{{HTML::linkRoute('home', 'View Site') }}</li>
    <li>{{HTML::linkRoute('dashboard', 'Dashboard') }}</li>
    <li>{{HTML::linkRoute('post.create', 'Create') }}</li>
    <li> <a href="/settings/{{{Auth::User()->username}}}/edit">Settings</a></li>
    <li>{{HTML::linkRoute('logout', 'Logout') }}</li> 
    <li>Logged in as : {{{Auth::User()->username}}}</li> 
@endif
</ul>
