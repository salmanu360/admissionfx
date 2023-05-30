<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            ['id'=>1, 'parent_id'=>0, 'section_id'=>1, 'name'=>'Business Visa', 'slug'=>'business-visa', 
            'image'=>'', 'description'=>'','status'=>1],

            ['id'=>2, 'parent_id'=>0, 'section_id'=>1, 'name'=>'Travel Visa', 'slug'=>'travel-visa', 'image'=>'','description'=>'',
            'status'=>1],
            ['id'=>3, 'parent_id'=>0, 'section_id'=>1, 'name'=>'Education Visa', 'slug'=>'education-visa', 'image'=>'','description'=>'',
            'status'=>1]
        ];
        Category::insert($categoryRecords);
    }
}
