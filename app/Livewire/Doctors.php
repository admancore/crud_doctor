<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class Doctors extends Component
{
    public $createError = null;

    public $doctors;

    #[Locked]
    public $doctor_id;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $nip = '';

    #[Validate('required')]
    public $sex = '';

    #[Validate('required')]
    public $specialist = '';

    #[Validate('required')]
    public $phone = '';

    #[Validate('required')]
    public $email = '';

    public $isEdit = false;

    public $title = 'Add New Doctor';

    public function resetFields()
    {
        $this->title = 'Add New Doctor';
        $this->reset('name', 'nip', 'sex', 'specialist', 'phone', 'email');
        $this->isEdit = false;
    }

    public function save()
    {
        $this->validate();

        Doctor::updateOrCreate(['id' => $this->doctor_id], [
            'name' => $this->name,
            'nip' => $this->nip,
            'sex' => $this->sex,
            'specialist' => $this->specialist,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        session()->flash('message', $this->doctor_id ? 'Doctor is updated.' : 'Doctor is added.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $this->title = 'Edit Doctor';

        $doctor = Doctor::findOrFail($id);

        $this->doctor_id = $id;
        $this->name = $doctor->name;
        $this->nip = $doctor->nip;
        $this->sex = $doctor->sex;
        $this->specialist = $doctor->specialist;
        $this->phone = $doctor->phone;
        $this->email = $doctor->email;
        $this->isEdit = true;
    }

    public function cancel()
    {
        $this->resetFields();
    }

    public function delete($id)
    {
        Doctor::find($id)->delete();
        session()->flash('message', 'Doctor is deleted.');
    }

    public function render()
    {
        $this->doctors = Doctor::latest()->get();
        return view('livewire.Doctors');
    }
    
}
