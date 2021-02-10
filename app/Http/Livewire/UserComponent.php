<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;

class UserComponent extends Component
{
    public $email, $password, $role, $myid;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
    ];
    public function insertData()
    {
        $this->validate();
        $data = [
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
        $request = new Request($data);
        $obj = new UserController();
        $res = $obj->store($request);
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->emit('done', $res['status'], $res['message']);
    }

    public function setData($id)
    {
        $data = User::findOrFail($id);
        $this->email = $data->email;
        $this->password = $data->password;
        $this->role = $data->role;
        $this->myid = $id;
    }

    public function render()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('livewire.user-component')->with([
            'users' => $users
        ]);
    }
}
