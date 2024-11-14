<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintCase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['team_id','complaint_id','status'];

    public function complaint(){
        return $this->belongsTo(Complaint::class);
    }
}
