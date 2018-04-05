<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Gerakan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $table = "gerakan";
    protected $fillable = [
        'nama_gerakan','fisioterapis_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
