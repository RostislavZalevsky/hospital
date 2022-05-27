<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') === 'production') return;

//        Patient::factory(50)->hasAttached(Doctor::factory())->create();

//        $patients = Patient::all();
//
//        foreach ($patients as $patient) {
//            $patient->doctors()->attach(random_int(1, 50));
//        }
//
//        $doctors = Doctor::all();
//
//        foreach ($doctors as $doctor) {
//            $doctor->patients()->attach( randomElement)
//        }
    }
}
