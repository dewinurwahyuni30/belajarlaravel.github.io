<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Schema::disableForeignKeyConstraints();
        // student::truncate();
        // Schema::enableForeignKeyConstraints();
        
        // $data = [
        //     ['name' => 'dewi','gender'=> 'P','nis'=>'01098','class_id'=>2],
        //     ['name' => 'mbok','gender'=> 'P','nis'=>'01078','class_id'=>2],
        //     ['name' => 'angga','gender'=> 'L','nis'=>'087098','class_id'=>1],
        //     ['name' => 'mochie','gender'=> 'P','nis'=>'010768','class_id'=>3],

        // ];
        // foreach ($data as $value){
        //     student::insert([
        //         'name'=>$value ['name'],
        //         'gender'=>$value ['gender'],
        //         'nis'=>$value ['nis'],
        //         'class_id'=>$value ['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' =>Carbon::now()
        //     ]);
        // }
        student::factory()->count(20)->create();
    }
}
