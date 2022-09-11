@extends('layouts.style.layout')
@section('content')
<div class="col-md-11 col-lg-12 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted" style='font-size:13px;'> <b> </b> </span>
          </h4>
          <h6> <div class="gofarright forlink col-12 col-sm-12 themed-grid-col" style='font-size:13px;'> <a href="./pubgmembers"> مشتركين ببجي : {{ $pubgfollowers }} </a> </div> </h6>	  
          <h6> <div class="gofarleft forlink col-12 col-sm-12 themed-grid-col" style='font-size:13px; font-weight:bold;'> <a href="./tiktokmembers"> مشتركين تيك توك : {{ $tiktokfollowers }} </a> </div>	 </h6>  
          <h6> <div class="gofarright forlink col-12 col-sm-12 themed-grid-col" style='font-size:13px;'> <a href="./vodmembers"> مشتركين فودافون : {{ $vodafonefollowers }} </a> </div> </h6>
 </div>

  <div class="col-md-11 col-lg-12 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted" style='font-size:11px;'>   </span>
         </h4>
		 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item"> 
	    
	<div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
	 <div class="products-dani">
	 <ul class="list-group list-group-flush">
     @foreach ($gitInno as $tikTok)
       <li class="list-group-item" style="text-align:center; border-bottom:1px dotted #000;"> T{{ $tikTok->inno }} </li>
     @endforeach
        </ul>

	 </div>
	</div>
          </div>
		
      </div>
  @endsection
 
