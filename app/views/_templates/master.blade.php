@include('partials.header')
@include('partials.nav')
<div class="row demo-row">    
    <div class="col-sm-12">
        @yield('content')
    </div>
</div> <!-- /row -->
@include('partials.footer')



