<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    #[Title('User')]
    public $title = 'User';
    public $id,$name,$email,$role_id,$password,$password_confirmation;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;
    public $listRole;

    public function mount()
    {
        $this->title;
        $this->isStatus ='create';
        $this->listRole = Role::get();
    }
    public function render()
    {
        $data = ModelsUser::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->paginate($this->paginate);
        return view('livewire.user',compact('data'));
    }

    public function search()
    {
        $this->resetPage();
    }

    public function addPost()
    {
        $this->postAdd = true;
        $this->isStatus = 'create';
        $this->resetForm();
    }
    public function close()
    {
        $this->postAdd = false;
        $this->resetForm();
    }

    public function edit($id)
    {
        $this->isStatus = 'edit';
        $data = ModelsUser::find($id);
        $this->id = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->role_id = $data->role_id;
    }


    public function resetForm()
    {
        $this->id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role_id = '';
    }

    public function save()
    {
        if ($this->isStatus == 'create') {
            $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $this->id,
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
                'role_id' => 'required',
            ]);
            ModelsUser::create([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'password' => Hash::make($this->password),
            ]);
            $this->dispatch('swal',[
                'title' => 'Success!',
                'text' => 'Data berhasil disimpan',
                'icon' => 'success',
            ]);
            $this->addPost();
        } else {
            // dd($this->all());
            if ($this->password) {
                $this->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required',
                    'role_id' => 'required',
                ]);
                ModelsUser::where('id',$this->id)
                ->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'role_id' => $this->role_id,
                    'password' => Hash::make($this->password),
                ]);
                $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Data berhasil diedit',
                    'icon' => 'success',
                ]);
                // $this->create();
            } else {
                $this->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'role_id' => 'required',
                ]);
                ModelsUser::where('id' ,$this->id)
                ->update( [
                    'name' => $this->name,
                    'email' => $this->email,
                    'role_id' => $this->role_id,
                ]);
                $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Data berhasil diedit',
                    'icon' => 'success',
                ]);
                // $this->create();
            }
        }
        $this->dispatch('close-modal');
    }

    public function cofirmDelete($id)
    {
        $this->dispatch('confirm',id:$id);
    }
    #[On('delete')]
    public function delete($id)
    {
        ModelsUser::find($id)->delete();
        $this->dispatch('swal',[
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
