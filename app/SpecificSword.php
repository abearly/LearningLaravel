<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificSword extends Model
{
    protected $fillable = ['nickname', 'length', 'avg_width', 'weight'];

    /**
     * Set the type of sword
     */
    public function sword()
    {
        return $this->belongsTo(Sword::class);
    }
}
