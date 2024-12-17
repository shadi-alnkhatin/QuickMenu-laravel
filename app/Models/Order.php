<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','menu_id','total_price','status','table_number'];
    //

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}

