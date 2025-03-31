<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimaMobile extends Model
{
    use HasFactory;

    protected $table = 'bank_accounts';

    protected $fillable = 
    [
        'mobile_banking',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }
}
