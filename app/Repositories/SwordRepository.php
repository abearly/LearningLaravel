<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Sword;

class SwordRepository
{
    /**
     * Get all existing types of swords
     *
     * @return Collection
     */
    public function getTypes()
    {
        return Sword::all();
    }
}

?>
