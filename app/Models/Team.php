<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','email','phone','role_id','department_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
