<?php

namespace App\Exports;

use App\Question;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuestionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $questions = Question::all();

        $questions = $questions->map(function ($item, $key) {
            return collect($item)->except(['id', 'created_at', 'updated_at'])->toArray();
        });

        return $questions;
    }
}
