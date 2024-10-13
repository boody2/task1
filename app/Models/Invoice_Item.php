<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_Item extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id', 'name', 'price', 'quantity', 'status'];

    public  function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
