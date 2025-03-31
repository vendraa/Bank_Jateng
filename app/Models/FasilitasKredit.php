<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKredit extends Model
{
    use HasFactory;

    protected $table = 'credit_facilities';

    protected $fillable = 
    [
        'nasabah_id',
        'kreditur',
        'plafond',
        'saldo_debit',
        'tanggal_awal',
        'tanggal_akhir',
        'suku_bunga',
        'user_id',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
