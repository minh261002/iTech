<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'code',
        'date_start',
        'date_end',
        'max_usage',
        'min_order_amount',
        'type',
        'discount_value',
        'percent_value',
        'status',
        'description',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'discount_applications', 'discount_id', 'user_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'discount_applications', 'discount_id', 'product_id');
    }

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class, 'discount_applications', 'discount_id', 'product_variation_id');
    }

    public function discountApplications()
    {
        return $this->hasMany(DiscountApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 2)
            ->where('date_start', '<=', Carbon::now())
            ->where('date_end', '>=', Carbon::now())
            ->where(function ($query) {
                $query->where('max_usage', '>', 0)
                    ->orWhereNull('max_usage');
            });
    }

    public function scopeExpired($query)
    {
        return $query->where(function ($query) {
            $query->where('date_end', '<', Carbon::now())
                ->orWhere('max_usage', '=', 0)
                ->orWhereNull('max_usage');
        });
    }



    /**
     * Check if the discount code is still active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        $now = Carbon::now();
        if ($this->status !== 2) {
            return false;
        }

        if ($now->greaterThan($this->date_start) && $now->lessThan($this->date_end)) {
            if ($this->max_usage !== null && $this->max_usage <= 0) {
                return false;
            }
            return true;
        }

        return false;
    }



}