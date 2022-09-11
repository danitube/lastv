<?php

namespace App\Http\Controllers;

use App\Models\Vodafoneguesses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVodafoneguessesRequest;
use App\Http\Requests\UpdateVodafoneguessesRequest;

class VodafoneguessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings   = DB::table('settings')->first();
        $vodafone      = DB::table('vodafoneguesses')->where('active',1)->count();
        $vodafones = $vodafone+0;
        return view('layouts.style.vodafoneindex',['vodafones'=>$vodafones ,'allsettings'=>$allsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createidvod(Request $request)
    {
        $allsettings = DB::table('settings')->first();
        $validated = $request->validate([
            'guessno' => 'required|numeric'
        ]);
        $gitGuesses = DB::table('vodafoneguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '1')
        ->first();

        $gitGuessesfalse = DB::table('vodafoneguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '0')
        ->first();
        
        if($gitGuessesfalse){
            $notactive = " تم تخمين هذا الرقم من مشترك أخر ";
        }else{
            $notactive = "محاولة خاطئة حاول مرة أخرى";
            $countrefresh  = DB::table('stoprefreshvod')
            ->where('ip',request()->ip())
            ->where('user_agent',request()->header('user-agent'))
            ->count();
           
            if($countrefresh >= 5){
                $updelete =  DB::table('stoprefreshvod')
                ->where('countrefresh','1')
                ->where('user_agent',request()->header('user-agent')) 
                ->where('ip',request()->ip())->delete();
                return redirect('guess');
            }else{
                $insert =  DB::table('stoprefreshvod')->insert([
                    'countrefresh'=>'1',
                    'user_agent'=> request()->header('user-agent') ?? 'n/a',
                    'ip'=> request()->ip() ?? null
                    ]);
            }

        }

        if($gitGuesses){
            return redirect()->back()->with([
                'done'=>'done',
                'dcount'=>$gitGuesses->dcount,
                'dcode'=>$gitGuesses->dcode,
                'guessno'=>$request->guessno,
                'class'=>'color:#00A4BD; font-size:20px;',
                'notedcount'=>' كاش بقيمة '.$gitGuesses->dcount.'  ',
                'message'=>' لقد خمنت الرقم الصحيح ',
                'notactive'=>' باقي خطوة واحدة ',
                'congrats'=>'الخطوة الأخيرة !.',
                'reshare'=>'',
                'youtubelink'=>'',
                'youtubelinktext'=>'',
                'import'=>'اسرع لتحصل على الهدية أولاً ',
                'alert'=>'alert-success'
            ]);

         }else{
            return redirect()->back()->with([
                'done'=>'',
                'backto'=>' عند تخمين الرقم الصحيح تظهر الهدية هنا',
                'message'=>'محاولة خاطئة حاول مرة أخرى',
                'class'=>'color:#ff0c00; font-size:16px;',
                'notactive'=> $notactive.'  ',
                'congrats'=>'انتبه!!.',
                'alert'=>'alert-danger'
            ]);

         }
    
    }


    public function createwinnerv(Request $request)
    {
        $allsettings   = DB::table('settings')->first();
        $vodafone      = DB::table('vodafoneguesses')->where('active',1)->count();
        $vodafones = $vodafone+0;
        $validated = $request->validate([
            'idfreefire' => 'required|numeric'
        ]);
         
        $gitGuessesfalse = DB::table('vodafoneguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '0')
        ->first();
        
        if($gitGuessesfalse){
            return redirect('freefire');
        }else{
            
        }

             $insert =  DB::table('winnersvods')->insert([
                'idfreefire'=>$request->idfreefire,
                'dcount'=>$request->dcount,
                'dcode'=>$request->dcode,
                'countwin'=>'1',
                'user_agent' => request()->header('user-agent') ?? 'n/a',
                'ip' => request()->ip() ?? null
                ]);
        
         if($insert){
            DB::table('vodafoneguesses')->where('guessno', $request->guessno)
            ->update(['active' => 0]);
            $total = array(
                'done'=>'done',
                'notedcount'=>' كود فودافون كاش بقيمة '.$request->dcount.'',
                'dcode'=>$request->dcode,
                'message'=>' لقد خمنت الرقم الصحيح ',
                'congrats'=>' مبروك !.',
                'class'=>'color:#00A4BD; font-size:20px;',
                'reshare'=>'واكتب أنا ربحت من الموقع تشجيع للأخرين على الاشتراك بالقناة لنستمر بتقديم المزيد .',
                'youtubelink'=>'https://youtube.com/danitubegames',
                'youtubelinktext'=>'شارك رابط قناة اليوتيوب',
                'alert'=>'alert-success'
            );
              return view('layouts.style.createidvod',['vodafones'=>$vodafones ,'total'=>$total ,'allsettings'=>$allsettings]);

         }else{
            $total = array(
                'notedcount'=>'يرجى مراسلة الإدارة',
                'class'=>'color:#ff0c00; font-size:16px;',
                'backto'=>'',
                'message'=>'مصادر غير موثوقة ',
                'alert'=>'alert-danger',
                'congrats'=>'انتبه!!.',
                
            );
            return view('layouts.style.createidvod',['vodafones'=>$vodafones ,'total'=>$total ,'allsettings'=>$allsettings]);
         }
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVodafoneguessesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVodafoneguessesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vodafoneguesses  $Vodafoneguesses
     * @return \Illuminate\Http\Response
     */
    public function show(Vodafoneguesses $Vodafoneguesses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vodafoneguesses  $Vodafoneguesses
     * @return \Illuminate\Http\Response
     */
    public function edit(Vodafoneguesses $Vodafoneguesses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVodafoneguessesRequest  $request
     * @param  \App\Models\Vodafoneguesses  $Vodafoneguesses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVodafoneguessesRequest $request, Vodafoneguesses $Vodafoneguesses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vodafoneguesses  $Vodafoneguesses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vodafoneguesses $Vodafoneguesses)
    {
        //
    }
}
