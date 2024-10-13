<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [ 'client_id', 'total', 'discount', 'tax', 'grand_total', 'description', 'invoice_date', 'Paid', 'status'];
    public function items(){
        return $this->hasMany(Invoice_Item::class);
    }
    public function history(){
        return $this->hasMany(History::class);
    }
    public function client(){
        return  $this->belongsTo(Client::class);
    }


}
