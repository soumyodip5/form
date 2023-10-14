<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['name','types','middle_name','last_name','email','subject','message','number','telephone','checkbox','select','radio','file'];
}

