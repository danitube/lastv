@extends('layouts.style.layout')
@section('content')
   
<div class="col-md-12 col-lg-12 order-md-last">
  <div class="row g-3">
    
          <h4 style='font-size:11px;' class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style='font-size:11px;'>  
            
            <div class="bd-example">
        <div class="d-flex justify-content-between flex-wrap">
          <button style='font-size:11px;' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
          عدد جوائز متوفر حالياً / {{ $freefires }}
          </button>
        </div>
        </div>


<div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">معلومات أكثر عن المسابقة </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>
      <div class="modal-body">
      خمن رقم من 5 خانات لتحصل على هديتك <br>
      الإحتمالات المتوفرة (110 جوهرة -231 جوهرة - 583 جوهرة ) <br>
      ملاحظة : يتم تجديد قائمة الهدايا كل يوم سبت الساعة 23:00

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

          </h4>
        
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 list-group-item" style="margin-top:-7px;"> 
	 	 <div class="col" style="padding:0 auto; margin:0 auto; max-width:310px;">
	      <div class="products-dani">
          
        @if($total["done"])

        <div class="alert {{ $total['alert'] }} alert-dismissible fade show" role="alert">
        <h6 class="alert-heading"> {{ $total["congrats"] }} </h6>
        <p style="font-size:11px;"> {{ $total["message"] }}  </p>
        <hr>
              <p class="mb-0">
                 <a target="_blank" href="{{ $total['youtubelink'] }}"> {{ $total['youtubelinktext'] }} </a> <span style="color:red;"> {{ $total['reshare'] }} </span> 
             </p>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>         
        </div>

    <div class="bgluky container">
              <div class="borderdotter">
                <p style="font-size:18px;"> 

                {{ $total["notedcount"] }} <br><br>
                {{ $total["dcode"] }} <br> <br>
               </p>
               <div class="navbar-botton">
		               <span class="aaa"> <a href="./freefireguess"> عودة للخلف </a> </span>
	             </div><br>
              </div>
              </div>

</div>
    
              @else
        
        </div> 
      </div>
 
   </div>  
   @endif
       
  </div>
</div>

 
@endsection
 
 <script type="text/javascript">
 var timeleft = 3000;
 var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 3000 - timeleft;
  timeleft -= 1;
}, 1000);
window.onload = function() {
    window.setTimeout(setDisabled, 30000);
}

function setDisabled() {
    document.getElementById('btnLarge').disabled = false;
    document.getElementById('guessno').disabled = false;
}
</script>