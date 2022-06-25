<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fname',
        'email',
        'message',
    ];
}
