<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use App\Models\Student;
use Session;
class AddStudentComponent extends Component
{
    public $name, $email, $phone;
    public function updated($fileds)
    {
        $this->validateOnly($fileds,[
            'name' => 'required',
            'email'=> 'required|email|unique:students',
            'phone'=> 'required|numeric',
        ]);
    }
    public function storeStudent()
    {
        $this->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:students',
            'phone'=> 'required|numeric',
        ]);
        $student = new Student();
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->save();
        Session::flash('message', 'Student created successfully.');
        $this->name  = '';
        $this->email = '';
        $this->phone = '';

    }
    public function render()
    {
        return view('livewire.crud.add-student-component')->layout('livewire.layouts.base');
    }
}
