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
              <p style="font-size:11px;"> التسجيل بأكثر من أسم يلغي جميع حساباتك في حال كشفت قواعد البيانات لدينا تسجيلك بأكثر من أسم </p>
              <hr>
              <p class="mb-0">انتقل إلى <a target="_blank" href="https://youtube.com/danitubegames"> قناة اليوتيوب</a> واكتب <span style="color:red;"> تم التسجيل في التعليقات </span> </p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
              </div>
              <div class="bgluky container">
              احتفظ بالرقم لتدخل السحب
              <div class="borderdotter">
              V{{ Session::get('data') }} 
              <br />
              <br />
              </div>
              </div>

              @endif
 
              @if(session()->has('message'))
              @else
   <form class="needs-validation" novalidate action="{{route('vodcreate')}}" method="post">
                @csrf 
          <h4 class="mb-3"> اكسب رصيد فودافون كاش </h4>

          
		<div class="row g-3 my-3">
            <div class="col-md-12">
              <label for="fullname" class="form-label" style="font-size:14px;">الأسم الكامل</label>
              <input style="font-size:14px; text-align:left;" type="text" class="form-control" name="fullname" id="fullname user" placeholder="اسمك الكامل" value="" required class="@error('fullname') is-invalid @enderror">
              <div class="invalid-feedback">
                يرجى ادخال الاسم
              </div>
              @error('fullname')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
		
        <div class="row gy-3">
            <div class="col-md-12">
              <label for="nophone" class="form-label" style="font-size:14px;">رقم فودافون كاش</label>
              <input pattern="\d*" style="font-size:14px; text-align:left;" type="text" class="form-control" name="nophone" id="nophone" placeholder="تأكد من كتابة الرقم بشكل صحيح" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="@error('nophone') is-invalid @enderror">
              <div class="invalid-feedback">
               رقم فودافون كاش مطلوب 
              </div>
              @error('nophone')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
		
		<div class="row g-3 my-3 ">
            <div class="col-md-12">
              <label for="country" class="form-label" style="font-size:14px;">الدولة / المدينة</label>
              <input style="font-size:14px; text-align:left;" type="text" class="form-control" name="country" id="country user" placeholder="الدولة / المدينة" value="egypt" required oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
              <div class="invalid-feedback">
                يرجى ادخال الدولة
              </div>
            </div>
        </div>
		
   <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" required>
            <label style="font-size:12px;" class="form-check-label" for="same-address"> أوافق على الشروط والأحكام <a href="./terms.php" style="color:red; font-size:12px;"> اقرأ </a>... </label>
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

  <script type="text/javascript">
        document.getElementById("txt_1").value = getSavedValue("txt_1");    // set the value to this input
        document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>