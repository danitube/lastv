<?php

namespace App\Http\Controllers;

use App\Models\Vodafone;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVodafoneRequest;
use App\Http\Requests\UpdateVodafoneRequest;
use Illuminate\Http\Request;
class VodafoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.vodform',compact('allsettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|unique:vodafones|max:255',
            'nophone'  => 'required|unique:vodafones|max:255'
        ]);

       $insert =  DB::table('vodafones')->insert([
            'fullname'=>$request->fullname,
            'nophone'=>$request->nophone,
            'country'=>$request->country,
            'user_agent' => request()->header('user-agent') ?? 'n/a',
            'ip' => request()->ip() ?? null
            ]);
            $IdUser = DB::getPdo()->lastInsertId();
            $inno = $IdUser.preg_replace('/000+/','',time()-1658888000);
            if($insert){
                $creat = DB::table('innovods')->insert([
                    'iduser'=>$IdUser,
                    'inno'=>$inno
                    ]);
            $dataofinno = DB::table('innovods')->where('iduser',$IdUser)->first();
            $allsettings = DB::table('settings')->first();
            return redirect()->back()->with(['data'=>$dataofinno->inno , 'message'=>'']);
            
          }else{
            return Redirect::back()->withErrors(['message' => 'The Message']);

          }
}


public function vodmembers()
{
    $allsettings       = DB::table('settings')->first();
    $pubgfollowers     = DB::table('pubgs')->count();
    $tiktokfollowers   = DB::table('tiktoks')->count(); 
    $vodafonefollowers = DB::table('vodafones')->count(); 
    $gitInno           = DB::table('vodafones')
    ->join('innovods', 'vodafones.id', '=', 'innovods.iduser')
    ->select('vodafones.*', 'innovods.inno', 'innovods.inno')->orderBy('inno')
    ->get();
    return view('layouts.style.vodmembers',['pubgfollowers'=>$pubgfollowers ,'allsettings'=>$allsettings ,'gitInno'=>$gitInno ,'vodafonefollowers'=>$vodafonefollowers ,'tiktokfollowers'=>$tiktokfollowers]);
   
}

public function vodsearch()
{
    $allsettings = DB::table('settings')->first();
    return view('layouts.style.vodsearchid',compact('allsettings'));
}

public function getsearchidvod(Request $request)
{
    $validated = $request->validate([
        'nophone' => 'required|numeric'
    ]);

    $gitIduser = DB::table('vodafones')->where('nophone', $request->nophone)->first();
     if($gitIduser){
        $dataofinno = DB::table('innovods')->where('iduser',$gitIduser->id)->first();
        return redirect()->back()->with(['data'=>"V".$dataofinno->inno , 'message'=>' احتفظ بالرقم لتدخل السحب']);
     }else{
        return redirect()->back()->with(['data'=>'','backto'=>'توجه الى صفحة التسجيل', 'message'=>'لم يتم العثور على رقم']);
     }


}


public function vodwinners()
{
    $allsettings = DB::table('settings')->first();
    return view('layouts.style.pubgform',compact('allsettings'));
    
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVodafoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVodafoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vodafone  $vodafone
     * @return \Illuminate\Http\Response
     */
    public function show(Vodafone $vodafone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vodafone  $vodafone
     * @return \Illuminate\Http\Response
     */
    public function edit(Vodafone $vodafone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVodafoneRequest  $request
     * @param  \App\Models\Vodafone  $vodafone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVodafoneRequest $request, Vodafone $vodafone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vodafone  $vodafone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vodafone $vodafone)
    {
        //
    }
}
