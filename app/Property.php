<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'real_states_id',
        'type',
        'description',
        'address'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function real_state()
    {
        return $this->belongsTo(RealState::class);
    }
}
