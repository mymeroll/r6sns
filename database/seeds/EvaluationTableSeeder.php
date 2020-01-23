<?php

use Illuminate\Database\Seeder;

class EvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("evaluations")->insert([
            [
                'evaluation_id' => '1',
                'evaluationed_id' => '2',
                'evaluation'   => '3',
            ],
            [
                'evaluation_id' => '2',
                'evaluationed_id' => '3',
                'evaluation'   => '4',
            ],
            [
                'evaluation_id' => '3',
                'evaluationed_id' => '4',
                'evaluation'   => '5',
            ],
            [
                'evaluation_id' => '4',
                'evaluationed_id' => '5',
                'evaluation'   => '4',
            ],
            [
                'evaluation_id' => '1',
                'evaluationed_id' => '3',
                'evaluation'   => '2',
            ],
        ]);
    }
}
