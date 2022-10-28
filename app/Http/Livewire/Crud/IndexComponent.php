<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use App\models\Student;
use Session;
class IndexComponent extends Component
{
    private $students,$student;

    public function delete($id)
    {
        $this->student = Student::find($id);
        $this->student->delete();
        Session::flash('message','Student deleted successfully.');

    }
    public function render()
    {
        $this->students = Student::latest()->get();
        return view('livewire.crud.index-component',['students'=>$this->students])->layout('livewire.layouts.base');
    }
}
