<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = ['course_id','schedule','start'];

    protected $table = 'class_rooms';

    /**
     * Get the course that owns the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * The users that belong to the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id');
    }

    public function percentExamComplete()
    {
        $total_exam = 0;
        $exam_done = 0;
        foreach($this->course->exams as $exam)
        {
            $total_exam++;
            if(isset($exam->scores->where('id',Auth::guard('web')->user()->id)->first()->pivot->score))
            {
                $exam_done++;
            }
        }

        return number_format(($exam_done/$total_exam)*100, 2);
    }
}
