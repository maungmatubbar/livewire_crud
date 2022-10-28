<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use App\models\Student;
use Session;
class EditStudentComponent extends Component
{
    public $name,$email,$phone,$student_id;
    private $student;
    public function mount($id)
    {
        $this->student    = Student::where('id',$id)->first();
        $this->name       = $this->student->name;
        $this->email      = $this->student->email;
        $this->phone      = $this->student->phone;
        $this->student_id = $id;
    }
    public function updated($fileds)
    {
        $this->validateOnly($fileds,[
            'name'  => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric',
        ]);
    }
    public function updateStudent()
    {
        $this->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric',
        ]);
        $this->student        = Student::where('id',$this->student_id)->first();
        $this->student->name  = $this->name;
        $this->student->email = $this->email;
        $this->student->phone = $this->phone;
        $this->student->save();
        Session::flash('message', 'Student updated successfully.');
        return redirect()->to('/students');
    }
    public function render()
    {

        return view('livewire.crud.edit-student-component')->layout('livewire.layouts.base');
    }
}
