<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','code','phone'];

    protected $dates = ['deleted_at'];

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
