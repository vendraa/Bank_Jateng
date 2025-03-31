<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollPegawai extends Model
{
    use HasFactory;

    protected $table = 'employee_payrolls';

    protected $fillable = 
    [
        'nasabah_id',
        'payroll_bank',
        'noa_pegawai',
        'nominal_payroll',
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
