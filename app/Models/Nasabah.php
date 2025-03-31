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
        'phone_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class, 'nasabah_id', 'id');
    }

    public function creditFacilities()
    {
        return $this->hasMany(FasilitasKredit::class, 'nasabah_id', 'id');
    }

    public function employeePayrolls()
    {
        return $this->hasMany(PayrollPegawai::class, 'nasabah_id', 'id');
    }

    public function employeePlos()
    {
        return $this->hasMany(PLOPegwai::class, 'nasabah_id', 'id');
    }

    public function bimaMobile()
    {
        return $this->hasMany(BimaMobile::class, 'nasabah_id', 'id');
    }

    public function dplk()
    {
        return $this->hasMany(DPLK::class, 'nasabah_id', 'id');
    }

    public function phrLain()
    {
        return $this->hasMany(PHRLain::class, 'nasabah_id', 'id'); // Perbaikan ke model PHRLain
    }
}
