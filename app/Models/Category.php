<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'menu_id',
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function items()
    {
    return $this->hasMany(MenuItem::class);
    }
}
