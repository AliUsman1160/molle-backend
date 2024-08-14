<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'event_id',
    ];

    /**
     * The user who is attending the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The event that is being attended.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
