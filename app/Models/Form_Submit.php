<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_Submit extends Model
{
    use HasFactory;
    protected $fillable = ['name_subject_id','f_name','m_name','l_name','email','subject'];

    public function subject(){
        return $this->belongsTo(Name_Subject::class, 'name_subject_id');
    }
}
