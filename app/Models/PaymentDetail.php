<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_id',
        'payment_currency',
        'payment_description',
        'payment_response',
        'payer_email',
        'tax_amount',
        'additional_info',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function scopePaymentId($query, $payment_id)
    {
        return $query->where('payment_id', $payment_id);
    }

    public function scopePaymentCurrency($query, $payment_currency)
    {
        return $query->where('payment_currency', $payment_currency);
    }
}
