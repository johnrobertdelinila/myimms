<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRAStatus extends Model
{
    use HasFactory;

    protected $table = 'prastatus';

    protected $fillable = [
        'application_number',
        'identification',
        'employee',
        'document_number',
        'date_of_application',
        'citizens',
        'status',
    ];
}
