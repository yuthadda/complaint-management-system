<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
