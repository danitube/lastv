<?php

namespace App\Http\Controllers;

use App\Models\Freefireguess;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFreefireguessRequest;
use App\Http\Requests\UpdateFreefireguessRequest;
use Illuminate\Http\Request;

class FreefireguessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings   = DB::table('settings')->first();
        $freefire      = DB::table('freefireguesses')->where('active',1)->count();
        $freefires = $freefire+0;
        return view('layouts.style.freefireindex',['freefires'=>$freefires ,'allsettings'=>$allsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createidfire(Request $request)
    {
        $allsettings = DB::table('settings')->first();
        $validated = $request->validate([
            'guessno' => 'required|numeric'
        ]);
        $gitGuesses = DB::table('freefireguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '1')
        ->first();

        $gitGuessesfalse = DB::table('freefireguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '0')
        ->first();
        
        if($gitGuessesfalse){
            $notactive = " تم تخمين هذا الرقم من مشترك أخر ";
        }else{
            $notactive = "محاولة خاطئة حاول مرة أخرى";
            $countrefresh  = DB::table('stoprefreshes')
            ->where('ip',request()->ip())
            ->where('user_agent',request()->header('user-agent'))
            ->count();
           
            if($countrefresh >= 5){
                $updelete =  DB::table('stoprefreshes')
                ->where('countrefresh','1')
                ->where('user_agent',request()->header('user-agent')) 
                ->where('ip',request()->ip())->delete();
                return redirect('guess');
            }else{
                $insert =  DB::table('stoprefreshes')->insert([
                    'countrefresh'=>'1',
                    'user_agent' => request()->header('user-agent') ?? 'n/a',
                    'ip' => request()->ip() ?? null
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
                'notedcount'=>' كود جواهر بقيمة '.$gitGuesses->dcount.' جوهرة ',
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

    public function createwinnerf(Request $request)
    {
        $allsettings = DB::table('settings')->first();
        $freefire      = DB::table('freefireguesses')->where('active',1)->count();
        $freefires = $freefire+0;
        $validated = $request->validate([
            'idfreefire' => 'required|numeric'
        ]);
         
        $gitGuessesfalse = DB::table('freefireguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '0')
        ->first();
        
        if($gitGuessesfalse){
            return redirect('freefire');
        }else{
            
        }

             $insert =  DB::table('winnersfreefires')->insert([
                'idfreefire'=>$request->idfreefire,
                'dcount'=>$request->dcount,
                'dcode'=>$request->dcode,
                'countwin'=>'1',
                'user_agent' => request()->header('user-agent') ?? 'n/a',
                'ip' => request()->ip() ?? null
                ]);
        
         if($insert){
            DB::table('freefireguesses')->where('guessno', $request->guessno)
            ->update(['active' => 0]);
            $total = array(
                'done'=>'done',
                'notedcount'=>' كود جواهر بقيمة '.$request->dcount.' جوهرة ',
                'dcode'=>$request->dcode,
                'message'=>' لقد خمنت الرقم الصحيح ',
                'congrats'=>' مبروك !.',
                'class'=>'color:#00A4BD; font-size:20px;',
                'reshare'=>'واكتب أنا ربحت من الموقع تشجيع للأخرين على الاشتراك بالقناة لنستمر بتقديم المزيد .',
                'youtubelink'=>'https://youtube.com/danitubegames',
                'youtubelinktext'=>'شارك رابط قناة اليوتيوب',
                'alert'=>'alert-success'
            );
              return view('layouts.style.createidfire',['freefires'=>$freefires ,'total'=>$total ,'allsettings'=>$allsettings]);

         }else{
            $total = array(
                'notedcount'=>'يرجى مراسلة الإدارة',
                'class'=>'color:#ff0c00; font-size:16px;',
                'backto'=>'',
                'message'=>'مصادر غير موثوقة ',
                'alert'=>'alert-danger',
                'congrats'=>'انتبه!!.',
                
            );
            return view('layouts.style.createidfire',['freefires'=>$freefires ,'total'=>$total ,'allsettings'=>$allsettings]);
         }
    
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFreefireguessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFreefireguessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Freefireguess  $freefireguess
     * @return \Illuminate\Http\Response
     */
    public function show(Freefireguess $freefireguess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freefireguess  $freefireguess
     * @return \Illuminate\Http\Response
     */
    public function edit(Freefireguess $freefireguess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFreefireguessRequest  $request
     * @param  \App\Models\Freefireguess  $freefireguess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFreefireguessRequest $request, Freefireguess $freefireguess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freefireguess  $freefireguess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freefireguess $freefireguess)
    {
        //
    }
}
