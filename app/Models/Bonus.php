<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function bonusable()
    {
        return $this->morphTo();
    }
    public function retailer()
    {
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }
}
