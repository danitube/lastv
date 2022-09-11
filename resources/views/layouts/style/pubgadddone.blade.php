@extends('layouts.style.layout')
@section('content')
  <div class="col-md-11 col-lg-12 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted" style='font-size:11px;'>   </span>
         </h4>
		 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item"> 
	    
	<div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
	 <div class="products-dani">
	 
             @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('message') }}   
              <h6 class="alert-heading">  مبروك تم تسجيلك بنجاح </h6>
              <hr>
              <p class="mb-0">اشترك بقناة اليوتيوب <a target="_blank" href="https://youtube.com/danitubegames"> قناة اليوتيوب</a>  <span style="color:red;"></span> </p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
              </div>
              @endif
	 
	 
	 </div>
	</div>
          </div>
		
      </div>
  @endsection

