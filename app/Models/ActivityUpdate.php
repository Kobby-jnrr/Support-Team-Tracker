<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ActivityUpdate extends Model
{
    protected $fillable = [
        'activity_id',
        'status',
        'remark',
        'updated_by',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}