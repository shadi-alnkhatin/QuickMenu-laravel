<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    use HasFactory;

    // Add all fields that should allow mass assignment
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone_number',
        'logo_url',
        'cover_url',
        'user_id',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function items()
{
    return $this->hasMany(MenuItem::class);
}
}
