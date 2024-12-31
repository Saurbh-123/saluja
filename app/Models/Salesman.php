<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
     use HasFactory;

    protected $table = 'salesman';
const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'salesman_name',
        'company_name',
        'phone',
        'email',
        "created_by",
    ];

 

}
