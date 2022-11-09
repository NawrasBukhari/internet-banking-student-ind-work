<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'currency',
        'category',
        'status',
        'description',
        'transaction_date',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function pending()
    {
        return self::where('status', 'pending');
    }

    public static function completed()
    {
        return self::where('status', 'completed');
    }

    public static function failed()
    {
        return self::where('status', 'failed');
    }

    public static function deposit()
    {
        return self::where('type', 'deposit');
    }

    public static function withdrawal()
    {
        return self::where('type', 'withdrawal');
    }

    public static function transfer()
    {
        return self::where('type', 'transfer');
    }

    public static function currency($currency)
    {
        return self::where('currency', $currency);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeDeposit($query)
    {
        return $query->where('type', 'deposit');
    }

    public function scopeWithdrawal($query)
    {
        return $query->where('type', 'withdrawal');
    }

    public function scopeTransfer($query)
    {
        return $query->where('type', 'transfer');
    }

    public function scopeCurrency($query, $currency)
    {
        return $query->where('currency', $currency);
    }

    public function scopeUser($query, $user)
    {
        return $query->where('user_id', $user);
    }

    public function scopeDate($query, $date)
    {
        return $query->where('transaction_date', $date);
    }

    public function scopeAmount($query, $amount)
    {
        return $query->where('amount', $amount);
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeDescription($query, $description)
    {
        return $query->where('description', $description);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

}
