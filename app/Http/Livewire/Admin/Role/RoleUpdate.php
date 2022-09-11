<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleUpdate extends Component
{
    use AuthorizesRequests;
    use ToastAlert;


    public $permissions;
    public $itemId;

    public $name, $key, $color , $permission = [];

    public bool $showUpdateModel = false;

    protected $listeners = ['showUpdateModel'=>'showUpdateModel'];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5','unique:roles,name,'.$this->itemId],
            'key' => ['required', 'string', 'min:5', 'max:20', 'unique:roles,key,'.$this->itemId],
            'color' => ['required', 'string', 'min:5','max:255', 'unique:roles,color,'.$this->itemId],
            'permission' => ['required', 'array'],
        ];
    }

    public function mount($permissions){
        $this->permissions = $permissions;

    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        if (!empty($this->itemId)){
            $item = Role::with('permission')->find($this->itemId);
            $this->authorize('update',$item );
            $this->name = $item->name;
            $this->key = $item->key;
            $this->color = $item->color;
            $this->permission = $item->permission->pluck('id');

        }
        $this->showUpdateModel = true;
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('permissions');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){

        $this->validate();

        $data = [
            'name' => $this->name,
            'key' => $this->key,
            'color' => $this->color,
        ];

        $role = Role::where('id', $this->itemId)->update($data);

        if (!empty($this->permission)){
            $permissionsId = Permission::whereIn('id', $this->permission)->pluck('id');
            Role::FindOrFail($this->itemId)->permission()->sync($permissionsId);
        }

        $this->closeUpdateModel();
        $this->toast(__('role.update role'));
        $this->emit('refreshParent');

    }

    public function updatingColor($value){
        $this->color = $value;
    }

    public function render()
    {
        $allsettings = DB::table('settings')->first();
        return view('livewire.admin.role.role-update',['allsettings'=>$allsettings]);
    }
}
