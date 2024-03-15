<?php

namespace App\dao;

use Illuminate\Support\Facades\DB;

class ServiceMedicaments
{

    public function getMedicaments() {
        try{
            $lesMedicaments = DB::table('medicament')
                ->Select()
                ->get();
            return $lesMedicaments;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
