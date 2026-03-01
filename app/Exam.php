<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['course_id','name','total_time','status'];

    /**
     * The scores that belong to the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function scores()
    {
        return $this->belongsToMany(User::class,'scores', 'exam_id', 'user_id')->withPivot('score');
    }

    /**
     * Get all of the questions for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the course that owns the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
