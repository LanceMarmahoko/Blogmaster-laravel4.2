@include('partials.header')
@include('partials.nav')
<div class="row demo-row">    
    <div class="col-md-6 col-md-offset-3">
        @yield('content')
    </div>
</div> <!-- /row -->
@include('partials.footer')



