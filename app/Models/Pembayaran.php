<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'pemilik_bank',
        'nominal',
        'nama_bank_lainnya',
        'bukti_pembayaran',
        'status',
        'done_time',
        'user_id',
     
    ];


    public function user(){
        return $this->belongsTo(User::class,  'user_id');
    }
}
