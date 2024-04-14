<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionRequest extends Model
{
    use HasFactory;

    protected $table = 'session_requests';

    protected $fillable = [
        'user_id',
        'session_id',
        'status',
        'request_count',
        'last_request_date',
        'user_ip'
    ];


    //user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
