<?php

namespace App\Http\Controllers;

use App\Models\TikTok;
use App\Http\Requests\StoreTikTokRequest;
use App\Http\Requests\UpdateTikTokRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TikTokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.tiktokform',compact('allsettings'));
    }

    public function allwinners()
    {
        $allsettings = DB::table('settings')->first();
        $pubgfollowers     = DB::table('pubgs')->count();
        $vodafonefollowers = DB::table('vodafones')->count(); 
        $tiktokfollowers   = DB::table('tiktoks')->count(); 
        return view('layouts.style.allwinners',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'tiktokfollowers'=>$tiktokfollowers ,'vodafonefollowers'=>$vodafonefollowers]);
    }
    
    public function create(Request $request)
    {
        $validated = $request->validate([
            'fullname'   => 'required|unique:tiktoks|max:255',
            'usertiktok' => 'required|unique:tiktoks|max:255',
            'nophone'    => 'required|unique:tiktoks|max:255'
        ]);

       $insert =  DB::table('tiktoks')->insert([
            'fullname'   =>$request->fullname,
            'usertiktok' =>$request->usertiktok,
            'nophone'    =>$request->nophone,
            'country'    =>$request->country,
            'user_agent' => request()->header('user-agent') ?? 'n/a',
            'ip'         => request()->ip() ?? null
            ]);
            $IdUser = DB::getPdo()->lastInsertId();
            $inno = $IdUser.preg_replace('/000+/','',time()-1658888000);
            if($insert){
                $creat = DB::table('innotiktoks')->insert([
                    'iduser' =>$IdUser,
                    'inno'   =>$inno
                    ]); 
            $dataofinno  = DB::table('innotiktoks')->where('iduser',$IdUser)->first();
            $allsettings = DB::table('settings')->first();
            return redirect()->back()->with(['data'=>$dataofinno->inno , 'message'=>'']);
            
          }else{
            return Redirect::back()->withErrors(['message' => 'The Message']);

          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTikTokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTikTokRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TikTok  $tikTok
     * @return \Illuminate\Http\Response
     */
    public function show(TikTok $tikTok)
    {
        //
    }
 
    
    public function tikToksearch()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.tiktoksearchid',compact('allsettings'));
    }

    public function edit(TikTok $tikTok)
    {
        //
    }

  
    public function getsearchidtikTok(Request $request)
    {
        $validated = $request->validate([
            'usertiktok' => 'required|max:255'
        ]);

        $gitIduser = DB::table('tiktoks')->where('usertiktok', $request->usertiktok)->first();
         if($gitIduser){
            $dataofinno = DB::table('innotiktoks')->where('iduser',$gitIduser->id)->first();
            return redirect()->back()->with(['data'=>"P".$dataofinno->inno , 'message'=>' احتفظ بالرقم لتدخل السحب']);
         }else{
            return redirect()->back()->with(['data'=>'','backto'=>'توجه الى صفحة التسجيل', 'message'=>'لم يتم العثور على رقم']);
         }


    }


    public function update(UpdateTikTokRequest $request, TikTok $tikTok)
    {
        //
    }

/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tikTok  $tikTok
     * @return \Illuminate\Http\Response
     */
    public function tiktokmembers()
    {
        $allsettings =  DB::table('settings')->first();
        $pubgfollowers     = DB::table('pubgs')->count();
        $tiktokfollowers   = DB::table('tiktoks')->count(); 
        $vodafonefollowers = DB::table('vodafones')->count(); 
        $gitInno           = DB::table('tiktoks')
        ->join('innotiktoks', 'tiktoks.id', '=', 'innotiktoks.iduser')
        ->select('tiktoks.*', 'innotiktoks.inno', 'innotiktoks.inno')->orderBy('inno')
        ->get();
        return view('layouts.style.tiktokmembers',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'gitInno'=>$gitInno ,'tiktokfollowers'=>$tiktokfollowers ,'vodafonefollowers'=>$vodafonefollowers]);
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TikTok  $tikTok
     * @return \Illuminate\Http\Response
     */
    public function destroy(TikTok $tikTok)
    {
        //
    }
}
