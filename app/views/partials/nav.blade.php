<ul>         
@if (Auth::guest())
    <li>{{HTML::linkRoute('registeruser', 'Start') }}</li>
    <li>{{HTML::linkRoute('login', 'Login') }}</li>
@else
    <li>{{HTML::linkRoute('dashboard', 'Dashboard') }}</li>
    <li>{{HTML::linkRoute('post.create', 'Create') }}</li>
    <li> <a href="/settings/{{{Auth::User()->username}}}">Settings</a></li>
    <li>{{HTML::linkRoute('logout', 'Logout') }}</li> 
@endif
</ul>