<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','anonymous','email','phone','category_id','role_id','department_id','title','description','files'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function complaintcases(){
        return $this->hasMany(ComplaintCase::class);
    }
}
