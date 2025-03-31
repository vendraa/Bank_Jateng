<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPLK extends Model
{
    use HasFactory;

    protected $table = 'dplks';

    protected $fillable =
    [
        'nasabah_id',
        'jumlah_peserta',
        'akumulasi_iuran',
        'akumulasi_pengembangan',
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
