<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBlocklist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'blocked_event_id',
    ];

    /**
     * The user who blocked the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The event that was blocked.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'blocked_event_id');
    }
}
