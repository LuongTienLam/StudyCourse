<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteGeneral extends Model
{
    protected $fillable = ['class_id','admin_id','title','content'];

    /**
     * Get the class that owns the NotePrivate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo(ClassRoom::class,'class_id');
    }

    /**
     * Get the admin that owns the NoteGeneral
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
