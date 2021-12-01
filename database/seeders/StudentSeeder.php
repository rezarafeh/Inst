<?php

namespace Database\Seeders;

use App\Models\Student; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File; // Include this import. Without this, you can not access institution-data.json 


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_file = File::get('database/data/student-data.json'); 
        DB::table('students')->delete(); 
        $data = json_decode($json_file); 
        foreach ($data as $obj) {
            Student::create(array(
                'first_name' => $obj->first_name,
                'last_name' => $obj->last_name,
                'phone_number' => $obj->phone_number,
                'email_address' => $obj->email_address,
                'institution_id' => $obj->institution_id
            ));
        } 
    }
}
