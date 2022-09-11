@extends('layouts.style.layout')
@section('content')
  <div class="col-md-11 col-lg-12 order-md-last">
   <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted" style='font-size:11px;'>    
          <div class="back-botton">
		<span class="aaa"> <a href="./allsearch"> عودة للخلف </a> </span>
	  </div> </span>
         </h4>
		  
          <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted" style='font-size:11px;'> صفحة البحث عن رقم الاشتراك تيك توك </span>
         </h4>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item"> 
	        <div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
			 <div class="products-dani">
             @if(session()->has('message'))
              <div class="bgluky container">
              {{ Session::get('message') }} 
                  <div class="borderdotter">
                  {{ Session::get('data') }} 
                  <a href="./tiktok"> {{ Session::get('backto') }} </a>
                 </div>
              </div>

              @endif
 
              @if(session()->has('message'))
              @else
			  <form class="needs-validation" novalidate action="{{route('getsearchidtiktok')}}" method="post">
                @csrf 
          <h4 class="mb-3">  </h4>
  
        <div class="row gy-3">
            <div class="col-md-12">
              <label for="usertiktok" class="form-label" style="font-size:14px;">اي دي تيك توك</label>
              <input style="font-size:14px; text-align:left;" type="text" class="form-control" name="usertiktok" id="usertiktok" placeholder="اكتب ID تيك توك " required>
              <div class="invalid-feedback">
                اي دي تيك توك مطلوب
              </div>
              @error('usertiktok')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
		      <hr class="my-4">
        <button class="btn btn-warning btn-lg" type="submit">الاستمرار</button>
        </form>

        
        @endif
			 </div>
			</div>
        </div>
	  </div>
		
     
  @endsection

