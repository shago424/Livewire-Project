<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;
Use Livewire\WithFileUploads; 
use Auth;

class StudentComponent extends Component
{
	use WithFileUploads;
	public $name;
	public $email;
	public $address;
	public $mobile;
	public $status;
	public $created_by;
	public $image;

	public function mount(){
		
		$this->status = 1;
		
	}

		public function resetinputfields()
		{
			$this->name = '';
			$this->email = '';
			$this->mobile = '';
			$this->address = '';
			$this->image = '';
		}
	

	// public function generateslug()
	// {
	// 	$this->slug = Str:: slug($this->name);
	// }

		public function updated($fields)
	{
		$this->validateOnly($fields,[
			'email' => 'required|unique:students',
			'name' => 'required',
			'address' => 'required',
			'status' => 'required',
			'image' => 'required',
			'mobile' => 'required',
		]);
	}


	public function store()
	{ 
		$this->validate([
			'email' => 'required|unique:students',
			'name' => 'required',
			'address' => 'required',
			'status' => 'required',
			'image' => 'required',
			'mobile' => 'required',

		]);



		$student = New Student();
		$student->name = $this->name;
		$student->email = $this->email;
		$student->address = $this->address;
		$student->mobile = $this->mobile;
		$student->status = $this->status;
		$student->created_by =Auth::user()->id;
		$imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
		$this->image->storeAs('students',$imageName);		
		$student->image = $imageName;
		$student->save(); 
		session()->flash('message','Student Added Successfully');
		$this->resetinputfields();
		$this->emit('studentAdded');

        
	}

    public function render()
    {
    	$students = Student::orderby('id','DESC')->get();
        return view('livewire.admin.studnet-component',['students' => $students])->layout('layouts.base');
    }
}
