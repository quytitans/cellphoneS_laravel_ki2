<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getFormatTotalPriceAttribute(){
        return number_format($this->totalPrice, 0, ',', ' ');
    }
    public $timestamps=false;
    use HasFactory;
}
