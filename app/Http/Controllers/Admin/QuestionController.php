<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Course;
use App\Question;
use Illuminate\Http\Request;
use App\Exports\QuestionsExport;
use App\Imports\QuestionsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('admin.questions.index',compact('courses'));
    }

    public function showExam(Exam $exam)
    {
        return view('admin.questions.show-exam',compact('exam'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('admin.questions.add',compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course' => 'required',
            'exam' => 'required',
            'name' => 'required',
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'answer_right' => 'required',
            'level' => 'required'
        ]);

        $exam = Exam::where([
            'course_id' => $data['course'],
            'name' => $data['exam']
        ])->first();

        Question::create([
            'exam_id' => $exam->id,
            'name' => $data['name'],
            'answer_1' => $data['answer_1'],
            'answer_2' => $data['answer_2'],
            'answer_3' => $data['answer_3'],
            'answer_4' => $data['answer_4'],
            'answer_right' => $data[$data['answer_right']],
            'level' => $data['level'],
        ]);

        return redirect()->route('admin.question.index');
    }

    public function edit(Question $question)
    {
        $courses = Course::all();

        return view('admin.questions.edit',compact('question','courses'));
    }

    public function update(Request $request,Question $question)
    {
        $data = $request->validate([
            'course' => 'required',
            'exam' => 'required',
            'name' => 'required',
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'answer_right' => 'required',
            'level' => 'required'
        ]);

        $exam = Exam::where([
            'course_id' => $data['course'],
            'name' => $data['exam']
        ])->first();

        $question->exam_id = $exam->id;
        $question->name = $data['name'];
        $question->answer_1 = $data['answer_1'];
        $question->answer_2 = $data['answer_2'];
        $question->answer_3 = $data['answer_3'];
        $question->answer_4 = $data['answer_4'];
        $question->answer_right = $data[$data['answer_right']];
        $question->level = $data['level'];
        $question->save();

        return redirect()->route('admin.question.show.exam',$question->exam->id);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.question.show.exam',$question->exam->id);
    }

    public function showImportForm()
    {
        return view('admin.questions.add-excel');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        $import = new QuestionsImport;
        $import->import($file);

        return back()->withStatus('Excel file imported successfully');
    }

    public function export() 
    {
        return Excel::download(new QuestionsExport, 'questions.xlsx');
    }
}
