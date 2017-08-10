<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sword extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'curved'];

    public function specificSword()
    {
        return $this->hasMany(SpecificSword::class);
    }
}
