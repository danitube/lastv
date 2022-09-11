<?php

namespace App\Http\Controllers;

use App\Models\Pubg;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePubgRequest;
use App\Http\Requests\UpdatePubgRequest;
use Illuminate\Http\Request;
class PubgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.pubgform',compact('allsettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|unique:pubgs|max:255',
            'idpubg'   => 'required|unique:pubgs|max:255',
            'nophone'  => 'required|unique:pubgs|max:255'
        ]);

       $insert =  DB::table('pubgs')->insert([
            'fullname'=>$request->fullname,
            'idpubg'=>$request->idpubg,
            'nophone'=>$request->nophone,
            'country'=>$request->country,
            'user_agent' => request()->header('user-agent') ?? 'n/a',
            'ip' => request()->ip() ?? null
            ]);
            $IdUser = DB::getPdo()->lastInsertId();
            $inno = $IdUser.preg_replace('/000+/','',time()-1658888000);
            if($insert){
                $creat = DB::table('innopubgs')->insert([
                    'iduser'=>$IdUser,
                    'inno'=>$inno
                    ]); 
            $dataofinno = DB::table('innopubgs')->where('iduser',$IdUser)->first();
            $allsettings = DB::table('settings')->first();
            return redirect()->back()->with(['data'=>$dataofinno->inno , 'message'=>'']);
            
          }else{
            return Redirect::back()->withErrors(['message' => 'The Message']);

          }
}

public function allsearch()
{
    $allsettings = DB::table('settings')->first();
    $pubgfollowers     = DB::table('pubgs')->count();
    $tiktokfollowers   = DB::table('tiktoks')->count();
    $vodafonefollowers = DB::table('vodafones')->count(); 

    return view('layouts.style.allsearch',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'tiktokfollowers'=>$tiktokfollowers ,'vodafonefollowers'=>$vodafonefollowers]);
}

public function pubgsearch()
{
    $allsettings = DB::table('settings')->first();
    return view('layouts.style.pubgsearchid',compact('allsettings'));
}

public function getsearchidpubg(Request $request)
{
    $validated = $request->validate([
        'idpubg' => 'required|numeric'
    ]);

    $gitIduser = DB::table('pubgs')->where('idpubg', $request->idpubg)->first();
     if($gitIduser){
        $dataofinno = DB::table('innopubgs')->where('iduser',$gitIduser->id)->first();
        return redirect()->back()->with(['data'=>"P".$dataofinno->inno , 'message'=>' احتفظ بالرقم لتدخل السحب']);
     }else{
        return redirect()->back()->with(['data'=>'','backto'=>'توجه الى صفحة التسجيل', 'message'=>'لم يتم العثور على رقم']);
     }


}

public function pubgmembers()
{
    $allsettings       = DB::table('settings')->first();
    $pubgfollowers     = DB::table('pubgs')->count();
    $tiktokfollowers   = DB::table('tiktoks')->count(); 
    $vodafonefollowers = DB::table('vodafones')->count(); 
    $gitInno           = DB::table('pubgs')
    ->join('innopubgs', 'pubgs.id', '=', 'innopubgs.iduser')
    ->select('pubgs.*', 'innopubgs.inno', 'innopubgs.inno')->orderBy('inno')
    ->get();
    return view('layouts.style.pubgmembers',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'gitInno'=>$gitInno ,'tiktokfollowers'=>$tiktokfollowers ,'vodafonefollowers'=>$vodafonefollowers]);
   
}


public function allmembers()
{
    $allsettings       = DB::table('settings')->first();
    $pubgfollowers     = DB::table('pubgs')->count();
    $tiktokfollowers   = DB::table('tiktoks')->count();  
    $vodafonefollowers = DB::table('vodafones')->count(); 

    return view('layouts.style.allmembers',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'tiktokfollowers'=>$tiktokfollowers ,'vodafonefollowers'=>$vodafonefollowers]);
           
}

public function pubgwinners()
{
    $allsettings = DB::table('settings')->first();
    return view('layouts.style.pubgform',compact('allsettings'));
    
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePubgRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePubgRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pubg  $pubg
     * @return \Illuminate\Http\Response
     */
    public function show(Pubg $pubg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pubg  $pubg
     * @return \Illuminate\Http\Response
     */
    public function edit(Pubg $pubg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePubgRequest  $request
     * @param  \App\Models\Pubg  $pubg
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePubgRequest $request, Pubg $pubg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pubg  $pubg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pubg $pubg)
    {
        //
    }
}
