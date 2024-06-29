<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public $name, $nim, $gelar;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    public function resetFields()
    {
        $this->name = null;
        $this->nim = null;
        $this->gelar = null;
    }

    public function render()
    {
        $users = Admin::paginate(10);
        return view('livewire.dashboard', compact('users'));
    }

    public function create()
    {
        $this->resetFields();
    }

    public function store()
    {
        // $this->validate();
        Admin::create([
            'name' => $this->name,
            'nim' => $this->nim,
            'gelar' => $this->gelar,
        ]);

        $this->resetFields();
        session()->flash('success', 'User Created Successfully!!');
    }

    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success', "Post Deleted Successfully!!");
    }
}
