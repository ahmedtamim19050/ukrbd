<?php

namespace App\Models;

use App\Events\RetailerCreate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function earnings()
    {
        return $this->hasMany(Earning::class, 'retailer_id');
    }
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
    public function bonuses()
    {
        return $this->morphMany(Bonus::class, 'bonusable');
    }
    protected static function booted()
    {
        static::created(function ($retailer) {
            event(new RetailerCreate($retailer));
        });
    }
}
