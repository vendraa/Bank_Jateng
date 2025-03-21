<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'npwp',
        'address',
        'business_sector',
        'key_person',
        "phone_number",
    ];
}
