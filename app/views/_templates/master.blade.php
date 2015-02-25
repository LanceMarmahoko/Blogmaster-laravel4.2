@include('partials.header')
@include('partials.nav') 
@include('partials.notifications.flash_messages') 

<div class="col-sm-12">
    @yield('content')
</div>

 <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
    @include('partials.modal')
</div>

@include('partials.footer')