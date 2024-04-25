<?php

namespace App\Imports;

use App\Models\Doctor;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\ValidationException;

class DoctorsImport implements ToModel, WithValidation, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Doctor([
            'name' => $row[0],
            'nip' => $row[1],
            'sex' => $row[2],
            'specialist' => $row[3],
            'phone' => $row[4],
            'email' => $row[5],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.0' => 'required',
            '*.1' => 'required', 
            '*.2' => 'required|in:Male,Female,male,female',
            '*.3' => 'required', 
            '*.4' => 'required', 
            '*.5' => 'required', 
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.0.required' => 'Name is required.',
            '*.1.required' => 'NIP is required.',
            '*.2.required' => 'Sex is required.',
            '*.2.in' => 'Sex must be either male or female.',
            '*.3.required' => 'Specialist is required.',
            '*.4.required' => 'Phone is required.',
            '*.5.required' => 'Email is required.',
        ];
    }

    public function onError(\Throwable $e)
    {
        if ($e instanceof ValidationException) {
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $row = $failure->row();
                $errors = $failure->errors();
            }
        }
    }
}
