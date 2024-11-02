<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'title' => 'test1_title',
                'image' => 'test1_image',
                'introduction' => 'test1_introduction1',
                'price' => '100',
                'condition' => 'test1_condition',
                'buy_flg' => 1,
                'user_id' => 1,
                'date' => now(),
            ],
            [
                'title' => 'test2_title',
                'image' => 'test2_image',
                'introduction' => 'test2_introduction1',
                'price' => '200',
                'condition' => 'test2_condition',
                'buy_flg' => 1,
                'user_id' => 2,
                'date' => now(),
            ],
            [
                'title' => 'test3_title',
                'image' => 'test3_image',
                'introduction' => 'test3_introduction1',
                'price' => '300',
                'condition' => 'test3_condition',
                'buy_flg' => 0,
                'user_id' => 3,
                'date' => now(),
            ],
        ];
        foreach($params as $param){
            DB::table('post')->insert($param);
        }   
    }
}
