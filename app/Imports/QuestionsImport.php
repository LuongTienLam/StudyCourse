<?php

namespace App\Imports;

use App\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionsImport implements ToModel, WithValidation
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'exam_id' => $row[0],
            'name' => $row[1],
            'answer_1' => $row[2],
            'answer_2' => $row[3],
            'answer_3' => $row[4],
            'answer_4' => $row[5],
            'answer_right' => $row[6],
            'level' => $row[7],
        ]);
    }

    public function rules() : array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
        ];
    }
}
