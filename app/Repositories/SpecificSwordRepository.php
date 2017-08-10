<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\SpecificSword;
use App\Sword;

class SpecificSwordRepository
{
    public function getAll($type)
    {
        $results = Sword::with('specificsword')
            ->where('name', '=', $type)
            ->get();
        $specificswords = [];
        foreach ($results as $result)
            foreach ($result->specificsword as $specsword)
                $specificswords[] = $specsword;
        return $specificswords;
    }
}
