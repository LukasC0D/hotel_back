<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'approved',
        'hotel_id',
        'user_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
