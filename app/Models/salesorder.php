<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl', 'nm_customer', 'produk', 'qty', 'hargasatuan'
    ];  


}
