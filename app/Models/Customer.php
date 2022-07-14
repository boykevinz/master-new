<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nm_customer', 'alamat', 'nohp'
    ];

    public function salesorder()
    {
        return $this->hasMany(salesorder::class);
    }

}
