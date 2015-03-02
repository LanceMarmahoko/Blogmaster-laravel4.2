@include('partials.header')  
@include('partials.nav')
@include('partials.notifications.flash_messages') 
<!--<div class="row margin-none text-right">
   <div class="col-sm-12">
       <button class="btn buton" onclick="goBack()">back</button>
   </div>
</div>
<div class="row margin-none">
    <div class=" banners col-sm-12 text-right">
        <h1 class="headings">
            Sign in
        </h1>
    </div>
</div>-->

<div class="row margin-none form-style text-left">
<div class="col-sm-12">
    
    @yield('content')
</div>
<div class="col-sm-4">
    @yield('sidebar')
</div>
</div>
@include('partials.footer_editor')
@include('partials.footer')



