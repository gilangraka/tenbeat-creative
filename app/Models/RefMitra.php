<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefMitra extends Model
{
    use HasFactory;
    protected $table = "ref_mitra";
    protected $fillable = [
        'user_id',
        'nomor_hp',
        'nomor_rekening',
        'id_rekening',
        'resume',
        'saldo',
        'is_active'
    ];
    public $timestamps = false;
}
