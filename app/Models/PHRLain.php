<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PHRLain extends Model
{
    use HasFactory;

    protected $table = 'product_holdings';

    protected $fillable = 
    [
        'nasabah_id',
        'nama_produk',
        'status',
        'user_id',
        'nasabah_id', 
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
