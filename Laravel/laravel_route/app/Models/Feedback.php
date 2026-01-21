<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'complain_id',
        'message',
    ];

    public function complain()
    {
        return $this->belongsTo(Complain::class);
    }
}
