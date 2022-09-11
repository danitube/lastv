<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\DB;

class AdminIndex extends Component
{
    use ToastAlert;
    
    public function addToast(){
        $this->toast('now message','center');
    }

    public function addToastInfo(){
        $this->toastInfo('info message ','bottom-left');
    }

    public function addToastWarning(){
        $this->toastWarning('Warning message ','bottom-left');
    }

    public function addToastError(){
        $this->toastError('Error message ','top-right',6000);
    }



    public function render()
    {
        $allsettings = DB::table('settings')->first();
        return view('livewire.admin.admin.admin-index',['allsettings'=>$allsettings])->layout('layouts.admin');
    }

}
