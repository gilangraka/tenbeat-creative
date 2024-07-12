<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUser extends Model
{
    use HasFactory;
    protected $table = "ref_user";
    protected $fillable = [
        'user_id',
        'nomor_hp',
        'count_video',
        'is_active',
        'subscribe'
    ];
    public $timestamps = false;
}
