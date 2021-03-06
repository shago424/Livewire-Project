<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;
Use Livewire\WithFileUploads; 
use Auth;
use Livewire\WithPagination;
class Students extends Component
{
    use WithFileUploads;
	public $ids;
	public $name;
	public $email;
	public $address;
	public $mobile;
	public $status;
	public $created_by;
	public $image;
	public $updated_by;
	public $newimage;
	public $searchItem;

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
		$this->image->storeAs('student',$imageName);		
		$student->image = $imageName;
		$student->save(); 
		session()->flash('message','Student Added Successfully');
		$this->resetinputfields();
		$this->emit('studentAdded'); 
	}

	public function edit($id)
	{
		$student = Student::where('id',$id)->first();
		$this->ids = $student->id;
		$this->name = $student->name;
		$this->email = $student->email;
		$this->address = $student->address;
		$this->mobile = $student->mobile;
		$this->status = $student->status;
		$this->image = $student->image;

	}

	public function update()
	{
		$this->validate([
			'email' => 'required',
			'name' => 'required',
			'address' => 'required',
			'status' => 'required',
			'image' => 'required',
			'mobile' => 'required',

		]);

		if($this->ids)
		{
		$student = Student::find($this->ids);
		$student->name = $this->name;
		$student->email = $this->email;
		$student->address = $this->address;
		$student->mobile = $this->mobile;
		$student->status = $this->status;
		$student->updated_by =Auth::user()->id;
		if($this->newimage)
		{
		$imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
		$this->newimage->storeAs('student',$imageName);		
		$student->image = $imageName;
		}

		$student->save(); 
		session()->flash('message','Student Updated Successfully');
		$this->resetinputfields();
		$this->emit('studentUpdated');

	}

}

	public function statusInactive($id)
	{
		$student = Student::find($id);
		$student->status = 0;
		$student->save();
		session()->flash('message','Student Inactive Successfully');
		return back();
	}

	public function delete($id)
	{
		if($id)
		{
			Student::where('id',$id)->delete();
			session()->flash('message','Student Deleted Successful');
		}
	}

	use WithPagination;

    public function render()
    {
    	$searchItem = '%'.$this->searchItem.'%';
    	$students = Student::where('name','LIKE', $searchItem)->where('email','LIKE',$searchItem)->where('mobile','LIKE',$searchItem)->where('address','LIKE',$searchItem)->orderby('id','DESC')->paginate(10);
        return view('livewire.admin.students',['students' => $students])->layout('layouts.base');
    }
}
