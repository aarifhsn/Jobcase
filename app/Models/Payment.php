<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_id', 'subscription_id', 'method', 'gateway', 'reference', 'transaction_code', 'amount', 'status', 'method', 'paid_at'];

    public function comapny()
    {
        return $this->belongsTo(Company::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function paymentDetails()
    {
        return $this->hasOne(PaymentDetail::class);
    }

    public function scopePaidAt($query, $paid_at)
    {
        return $query->where('paid_at', $paid_at);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            if (!$payment->company_id && $payment->subscription) {
                $payment->company_id = $payment->subscription->company_id;
            }
        });
    }
}
