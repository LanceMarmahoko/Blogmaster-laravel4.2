<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">
        {{HTML::image('img/assets/logo.png', 'logo', ['class' => 'col-xs-4'])}}
      </a>
    </div>
    </div>
</nav>
<ul class="nav text-right">         
@if (Auth::guest())
	<ul class="little_cute_nav">
	    {{--<li class="right_menu">{{HTML::linkRoute('register_user', 'Register') }}</li>--}}
	    <li class="right_menu"><a href="#">Help</a></li>
    </ul>
@else
<ul class="little_cute_nav">
    <li  class="right_menu avatar"><span class="username_img">{{HTML::image("img/assets/avatar.jpg","img")}}</span><span class="username">{{{Auth::User()->username}}}</span></li>
    <li class="right_menu">{{HTML::linkRoute('logout', 'Logout') }}</li> 

    <li class="left_menu">{{HTML::linkRoute('home', 'Preview App') }}</li>
    <li class="left_menu">{{HTML::linkRoute('dashboard', 'Dashboard') }}</li>
    <li class="left_menu">{{HTML::linkRoute('post.create', 'Create') }}</li>
    <li class="left_menu"><a href="/settings/{{{Auth::User()->username}}}/edit">Settings</a></li>
</ul>  
@endif
</ul>
