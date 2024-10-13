<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'status'];

    public function invoices(){
        return $this->hasMany(Invoice::class)->where('status','=',1);
    }
    public function invoices_Paid(){
        return $this->hasMany(Invoice::class)->where("Paid",'=',"Paid")->where('status','=',1);
    }

}
