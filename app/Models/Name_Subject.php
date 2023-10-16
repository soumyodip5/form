<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name_Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_subject'];

    public function optional(){
        return $this->hasOne(Optional::class);
    }

    public function optional_submit(){
        return $this->hasMany(Form_Submit::class);
    }

    public function form(){
        return $this->hasMany(form::class);
    }
}
