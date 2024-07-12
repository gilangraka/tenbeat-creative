<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $table = "transaksi_detail";
    protected $fillable = [
        'transaksi_id',
        'keterangan_file',
        'file_unggahan',
        'output',
        'created_at',
        'updated_at'
    ];
}
