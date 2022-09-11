<?php

namespace App\Http\Controllers;

use App\Models\Pubgguess;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePubgguessRequest;
use App\Http\Requests\UpdatePubgguessRequest;
use Illuminate\Http\Request;

class PubgguessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings   = DB::table('settings')->first();
        $pubg          = DB::table('Pguesses')->where('active',1)->count();
        $pubgs = $pubg+0;
        return view('layouts.style.pubgguessindex',['pubgs'=>$pubgs ,'allsettings'=>$allsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allsettings = DB::table('settings')->first();
        $validated = $request->validate([
            'guessno' => 'required|numeric'
        ]);
        $gitGuesses = DB::table('Pguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '1')
        ->first();

        $gitGuessesfalse = DB::table('Pguesses')
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
                'uccount'=>$gitGuesses->uccount,
                'uccode'=>$gitGuesses->uccode,
                'guessno'=>$request->guessno,
                'class'=>'color:#00A4BD; font-size:20px;',
                'noteuccount'=>' كود شدات بقيمة '.$gitGuesses->uccount.' شدة ',
                'message'=>' لقد خمنت الرقم الصحيح ',
                'notactive'=>' باقي خطوة واحدة ',
                'congrats'=>'الخطوة الأخيرة',
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


    public function createwinnerp(Request $request)
    {
        $allsettings = DB::table('settings')->first();
        $pubg      = DB::table('Pguesses')->where('active',1)->count();
        $pubgs = $pubg+0;
        $validated = $request->validate([
            'idpubg' => 'required|numeric'
        ]);
         
        $gitGuessesfalse = DB::table('Pguesses')
        ->where('guessno', $request->guessno)
        ->where('active', '0')
        ->first();
        
        if($gitGuessesfalse){
            return redirect('guess');
        }else{
            
        }

             $insert =  DB::table('winnerspubgs')->insert([
                'idpubg'=>$request->idpubg,
                'uccount'=>$request->uccount,
                'uccode'=>$request->uccode,
                'countwin'=>'1',
                'user_agent' => request()->header('user-agent') ?? 'n/a',
                'ip' => request()->ip() ?? null
                ]);
        
         if($insert){
            DB::table('Pguesses')->where('guessno', $request->guessno)
            ->update(['active' => 0]);
            $total = array(
                'done'=>'done',
                'noteuccount'=>' كود شدات بقيمة '.$request->uccount.' شدة ',
                'uccode'=>$request->uccode,
                'message'=>' لقد خمنت الرقم الصحيح ',
                'congrats'=>'مبروك !.',
                'class'=>'color:#00A4BD; font-size:20px;',
                'reshare'=>'واكتب أنا ربحت من الموقع تشجيع للأخرين على الاشتراك بالقناة لنستمر بتقديم المزيد .',
                'youtubelink'=>'https://youtube.com/danitubegames',
                'youtubelinktext'=>'شارك رابط قناة اليوتيوب',
                'alert'=>'alert-success'
            );
              return view('layouts.style.createidpubg',['pubgs'=>$pubgs ,'total'=>$total ,'allsettings'=>$allsettings]);

         }else{
            $total = array(
                'noteuccount'=>'يرجى مراسلة الإدارة',
                'class'=>'color:#ff0c00; font-size:16px;',
                'backto'=>'',
                'message'=>'مصادر غير موثوقة ',
                'alert'=>'alert-danger',
                'congrats'=>'انتبه!!.',
                
            );
            return view('layouts.style.createidpubg',['pubgs'=>$pubgs ,'total'=>$total ,'allsettings'=>$allsettings]);
         }
    
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePubgguessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePubgguessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pubgguess  $pubgguess
     * @return \Illuminate\Http\Response
     */
    public function show(Pubgguess $pubgguess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pubgguess  $pubgguess
     * @return \Illuminate\Http\Response
     */
    public function edit(Pubgguess $pubgguess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePubgguessRequest  $request
     * @param  \App\Models\Pubgguess  $pubgguess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePubgguessRequest $request, Pubgguess $pubgguess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pubgguess  $pubgguess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pubgguess $pubgguess)
    {
        //
    }
}
