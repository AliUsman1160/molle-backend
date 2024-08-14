<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'event_reportlists';
    protected $fillable = [
        'user_id',
        'reported_event_id',
    ];

    /**
     * The user who reported the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The event that was reported.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'reported_event_id');
    }
}
