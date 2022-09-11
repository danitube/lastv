@extends('layouts.style.layout')
@section('content')


   
<div class="col-md-11 col-lg-12 order-md-last">
  <div class="row g-3">
    
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style='font-size:11px;'> حدد نوع المسابقة لتدخل السحوبات ضمن البث المباشر <span class="circle myBtn" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">؟</span></span>
          </h4>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item" style="margin-top:-7px;"> 
	 	 <div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
	      <div class="products-dani">
            <a style="width:298px; height:55PX; margin:10px 0 14px 14px;" href="./pubg" class="btn btn-warning ">   <img src="./style/images/giveaway/PUBG.svg" class="bi d-block mx-auto mb-1" width="310px" style="margin-top:-5px;" />      </a>
            <a style="width:298px; height:55PX; margin:10px 0 14px 14px;" href="./tiktok" class="btn btn-warning ">     <img src="./style/images/giveaway/TIK.svg" class="bi d-block mx-auto mb-1" width="310px" style="margin-top:-5px;" />     </a> 
            <a style="width:298px; height:55PX; margin:10px 0 14px 14px;" href="./vodafone" class="btn btn-warning ">     <img src="./style/images/giveaway/VOD.svg" class="bi d-block mx-auto mb-1" width="310px" style="margin-top:-5px;" />     </a> 

          </div>
	     </div>
    </div>

  </div>
</div>
   

<div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">معلومات أكثر </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>
      <div class="modal-body" style="font-size:12px;">
    <b class="badge bg-warning text-dark"> الخطوة الأولى </b> <p class="list-group-item"> حدد نوع المسابقة علماً أن كل مسابقة تختلف عن الآخرى 
      كما يمكنك التسجيل بجميع المسابقات , ولا تسجل أكثر من مرة في نفس المسابقة 
      ستحصل على رقم اشتراك لا تفقد هذا الرقم, وفي حال فقدته يمكنك استعادته من زر البحث 
      <a title="البحث عن كود الاشتراك" href="./allsearch"><img src="./style/images/icon/search.png" width="14"> </a>
    </p>

      <b class="badge bg-warning text-dark"> الخطوة الثانية </b> <p class="list-group-item"> تابع الفيديوهات على قناة اليوتيوب ولا تنسى الإشتراك وتفعيل زر الجرس 
      <a title="اشترك بقناة اليوتيوب" target="_blank" href="https://www.youtube.com/danitubegames" alt="Youtube" class="noline"> <img style="width:20px; height:20px;" src="./style/images/social/svg/you.svg"> </a>

      </p>
      <b class="badge bg-warning text-dark">الخطوة الثالثة</b> <p class="list-group-item"> سيتم الإعلان عن موعد السحب ضمن بث مباشر على الرقم الذي حصلت عليه  </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
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
			<a target="_blank" href="https://discord.gg/YhWJvYgKav" alt="Discord" class="noline"> <img style="width:32px; height:32px;" src="./style/images/social/svg/dis.svg" /> </a>
		</div>
	 </div>
     </div>
</div>
</div>
 
@endsection
 