<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'description',
        'endtime',
        'user_id'
    ];
    protected $hidden =[
        'created_at',

    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
