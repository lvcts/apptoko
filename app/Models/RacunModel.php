<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacunModel extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id_racun';
    protected $fillable = [
        'nama_racun',
        'harga_racun',
        'modal_racun',
        'volume',
        'kode_racun',
        'jenis_racun',
        'stok'

    ];
}
