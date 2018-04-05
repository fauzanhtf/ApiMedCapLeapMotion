<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class FrameGerakan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $table = "frame_gerakan";
    protected $fillable = [
        'parent','frame_data',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
