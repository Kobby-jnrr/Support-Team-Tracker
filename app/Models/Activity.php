<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function updates()
    {
        return $this->hasMany(ActivityUpdate::class);
    }
}