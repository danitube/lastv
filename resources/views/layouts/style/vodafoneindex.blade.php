@extends('layouts.style.layout')
@section('content')
   
<div class="col-md-12 col-lg-12 order-md-last">
  <div class="row g-3">
    
          <h4 style='font-size:11px;' class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style='font-size:11px;'>  
            
      <div class="bd-example">
        <div class="d-flex justify-content-between flex-wrap">
          <button style='font-size:11px;' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
          عدد جوائز متوفر حالياً / {{ $vodafones }}
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
      الإحتمالات المتوفرة ( 10 جنيه - 50 جنيه - 100 جنيه ) <br>
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
          
        @if(session()->has('done'))

        <div class="alert {{ session()->get('alert') }} alert-dismissible fade show" role="alert">
        <h6 class="alert-heading"> {{ session()->get('congrats') }} </h6>
        <p style="font-size:11px;"> {{ session()->get('message') }}  </p>
        @if(!session()->has('backto'))
        <p class="mb-0">
              <a target="_blank" href="{{ session()->get('youtubelink') }}"> {{ session()->get('youtubelinktext') }} </a> <span style="color:red;"> {{ session()->get('reshare') }} </span> 
             </p>
             @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>         
        </div>

    <div class="bgluky container">
              <div class="borderdotter">
                <p style="font-size:18px;"> 
              @if(!session()->has('backto'))
              {{ session()->get('import') }} <br> 
                {{ session()->get('notactive') }}
                </p>
              @else
               <p style=""> {{ session()->get('backto') }} </p> 
               <p style="{{ Session::get('class') }}"> {{ session()->get('notactive') }} </p> <br /> 
               <div class="navbar-botton">
		               <span class="aaa"> <a href="./vodafoneguess"> عودة للخلف </a> </span>
	             </div>
              @endif
              </div>
              @if(!session()->has('backto'))
      <form class="needs-validation" novalidate action="{{route('createwinnerv')}}" method="post">
        @csrf 
        <div class="row g-3 my-3">
          <div class="col-md-12">
          <label for="idfreefire" class="form-label" style="font-size:14px;"> اكتب  اي رقم فودافون كاش لاستلام الهدية </label>
          <input type="hidden" name="dcount" value="{{session()->get('dcount')}}">
          <input type="hidden" name="dcode" value=" {{ Session::get('dcode') }} ">
          <input type="hidden" name="guessno" value=" {{ Session::get('guessno') }} ">
          <input pattern="\d*" style="font-size:14px; text-align:left;" type="text" class="form-control" id="idfreefire" name="idfreefire" placeholder="رقم فودافون كاش" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="@error('idfreefire') is-invalid @enderror">
          <div class="invalid-feedback">
          اكتب رقم فودافون كاش لاستلام الكود 
          </div>
          @error('idfreefire')
          <div class="alert alert-danger"> {{ $message }} </div>
          @enderror
          </div>
          </div>
        <input type="submit" value="ارسل" name="submit">
      </form>
      @endif
</div>
      

              @else
        <form class="needs-validation" novalidate action="{{route('guessvodafone')}}" method="post">
                @csrf 
        <div class="row g-3 my-3">
            <div class="col-md-12">
              <label for="guessno" class="form-label" style="font-size:12px;">خمن رقم من 5 خانات واربح كاش</label>
              <input pattern="\d*" style="font-size:14px; text-align:left;" type="text" class="form-control" id="guessno" name="guessno" placeholder="اكتب الرقم المتوقع" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="@error('guessno') is-invalid @enderror" disabled="disabled">
              <div class="invalid-feedback">
               خمن رقم ثم اضغط ارسال
              </div>
              @error('guessno')
                <div class="alert alert-danger"> {{ $message }} </div>
              @enderror
            </div>
        </div>
        <input type="submit" id="btnLarge" value="ارسل" name="submit" disabled="disabled">
        </form>
     
        </div> 
      </div>
      <progress value="0" max="9" id="progressBar" style="min-width:310px; margin-top:10px;" class="center"></progress> 
   </div>  
   @endif
       
  </div>
</div>

 
@endsection
 
 <script type="text/javascript">
 var timeleft = 900;
 var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 900 - timeleft;
  timeleft -= 1;
}, 1000);
window.onload = function() {
    window.setTimeout(setDisabled, 9000);
}

function setDisabled() {
    document.getElementById('btnLarge').disabled = false;
    document.getElementById('guessno').disabled = false;
}
</script>