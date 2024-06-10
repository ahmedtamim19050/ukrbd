<?php

namespace App\Models;

use App\Models\Traits\Chargeable;
use Carbon\Carbon;
use Codeboxr\PathaoCourier\Facade\PathaoCourier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, Chargeable;

    protected $guarded = [];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }


    public function childs()
    {
        return $this->hasMany(Order::class, 'parent_id');
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'order_id');
    }
    public function getFirstNameAttribute()
    {
        return @explode(' ', json_decode($this->shipping)->name)[0] ?? '';
    }
    public function getEmailAttribute()
    {
        return json_decode($this->shipping)->email;
    }
    public function getPhoneAttribute()
    {
        return json_decode($this->shipping)->phone;
    }
    public function getPostCodeAttribute()
    {
        return json_decode($this->shipping)->post_code;
    }
    public function getCityAttribute()
    {
        return json_decode($this->shipping)->city;
    }
    public function getAddressAttribute()
    {
        return json_decode($this->shipping)->address;
    }
    public function getLastNameAttribute()
    {
        return @explode(' ', json_decode($this->shipping)->name)[1] ?? '';
    }
    public function getFullNameAttribute()
    {
        return @json_decode($this->shipping)->name;
    }

    public function orderProduct()
    {
        return $this->hasOne(OrderProduct::class, 'order_id');
    }
    public function scopeFilter($query)
    {
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();
        $startMonth = Carbon::now()->startOfMonth();
        $EndMonth = Carbon::now()->endOfMonth();

        return $query
            ->when(request('sales') == 2, function ($query) {
                $query->whereYear('created_at', '=', Carbon::now()->year);
            })
            ->when(request('sales') == 3, function ($query) {
                $query->where('created_at', Carbon::now());
            })
            ->when(request('sales') == 1, function ($query) use ($currentWeekStart, $currentWeekEnd) {
                $query->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd]);
            })
            ->when(request('sales') == 4, function ($query) use ($startMonth, $EndMonth) {
                $query->whereBetween('created_at', [$startMonth, $EndMonth]);
            });
    }
    public function scopeCountFilter($query)
    {
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();
        $startMonth = Carbon::now()->startOfMonth();
        $EndMonth = Carbon::now()->endOfMonth();

        return $query
            ->when(request('orders') == 2, function ($query) {
                $query->whereYear('created_at', '=', Carbon::now()->year);
            })
            ->when(request('orders') == 3, function ($query) {
                $query->where('created_at', Carbon::now());
            })
            ->when(request('orders') == 1, function ($query) use ($currentWeekStart, $currentWeekEnd) {
                $query->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd]);
            })
            ->when(request('orders') == 4, function ($query) use ($startMonth, $EndMonth) {
                $query->whereBetween('created_at', [$startMonth, $EndMonth]);
            });
    }
    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
}
