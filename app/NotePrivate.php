<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotePrivate extends Model
{
    protected $fillable = ['user_id','admin_id','title','content'];

    /**
     * Get the user that owns the NotePrivate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
