@extends('layouts.style.layout')
@section('content')


   
<div class="col-md-11 col-lg-12 order-md-last">
  <div class="row g-3">
    
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style='font-size:11px;'> حدد نوع المسابقة التي تود الانضمام اليها </span>
          </h4>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item" style="margin-top:-7px;"> 
	 	 <div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
	      <div class="products-dani">
            <a style="width:200px; height:200px; margin:10px 40px 14px 14px;" href="./giveaway" class="btn btn-warning ">   <img src="./style/images/homeicon/GIVEAWAY.svg" class="bi d-block mx-auto mb-1" width="200" />      </a>
            <a style="width:200px; height:200px; margin:0 40px 14px 14px;" href="./code" class="btn btn-warning ">     <img src="./style/images/homeicon/CODE.svg" class="bi d-block mx-auto mb-1" width="200" />     </a> 
          </div>
	     </div>
    </div>

  </div>
</div>
   
 
<div class="col-md-11 col-lg-12 order-md-last">
  <div class="row g-3">
    
		<h4 class="justify-content-between align-items-center mb-3">
		 <span class="text-muted" style='font-size:11px;'> لاتنسى الاشتراك بقناة اليوتيوب </span>
		</h4>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item" style="margin-top:-15px;"> 
     <div class="col" style='padding:0 auto; margin:0 auto;'>
		<div class="products-dani center">
			<a target="_blank" href="https://www.youtube.com/danitubegames" alt="Youtube" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/you.svg" /> </a>
			<a target="_blank" href="https://www.facebook.com/PlayerPackage" alt="Facebook" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/face.svg" /> </a>
			<a target="_blank" href="https://www.tiktok.com/@dani.tube1" alt="Tiktok" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/tik.svg" /> </a>
			<a target="_blank" href="https://www.instagram.com/dani.tube1" alt="Instagram" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/ins.svg" /> </a>
			<a target="_blank" href="https://discord.gg/3D4hyWmpqA" alt="Discord" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/dis.svg" /> </a>
		</div>
	 </div>
     </div>
</div>
</div>
 
@endsection
 