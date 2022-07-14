<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl', 'id_customer', 'produk', 'qty', 'hargasatuan', 'produk2', 'qty2', 'hargasatuan2', 'produk3', 'qty3', 'hargasatuan3'
    ];  
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer')->withDefault(['nm_customer' => 'not found']);
    }
}