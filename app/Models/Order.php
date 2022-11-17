<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'aproved',
        'hotel_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function hotel(){
        return $this->belongsTo(hotel::class);
    }
}
