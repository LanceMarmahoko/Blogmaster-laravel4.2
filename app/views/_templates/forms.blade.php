@include('partials.header')  
@include('partials.nav') 
@include('partials.notifications.flash_messages') 

<div class="col-sm-8">
    @yield('content')
</div>
<div class="col-sm-4">
    @yield('sidebar')
</div>

@include('partials.footer')



