<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLOPegwai extends Model
{
    use HasFactory;

    protected $table = 'employee_plos';

    protected $fillable =
    [
        'nasabah_id',
        'noa',
        'plafond_pegawai',
        'baki_debit',
        'angsuran',
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
