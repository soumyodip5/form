<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    use HasFactory;
    protected $fillable = ['name_subject_id','level','placeholder','class','length'];

    public function name_subject(){
        return $this->belongsTo(Name_Subject::class);
    }
}
