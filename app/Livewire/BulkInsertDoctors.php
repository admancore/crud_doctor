<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\DoctorsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Validators\ValidationException;

class BulkInsertDoctors extends Component
{
    use WithFileUploads;

    public $file;

    public function render()
    {
        return view('livewire.bulk-insert-doctors');
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new DoctorsImport, $this->file);
            $this->dispatch('notify', 'Doctors imported successfully.');
            $this->js('window.location.reload()'); 
        } catch (ValidationException $e) {
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $row = $failure->row();
                $errors = $failure->errors();
                foreach ($errors as $error) {
                    Session::flash('error', $error);
                }
            }
            $this->dispatch('notify', 'There were errors in the import. Please check your file.');
        } catch (\Exception $e) {
            $this->dispatch('notify', 'An error occurred during the import.');
        }
    }
}
