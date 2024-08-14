<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_type_id',
        'created_by_user_id',
        'image',
        'start_time',
        'end_time',
        'location',
        'start_date',
        'end_date',
        'description',
        'paid',
        'amount',
        'seat_limit',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
