<?php

namespace App\dao;

use App\Exceptions\MonException;
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

    public function insertMedicament($id_famille, $depot_legal, $nom_commercial, $effets, $contre_indication, $prix_echantillon)
    {
        try {
            DB::table('medicament')->insert([
                'id_famille' => $id_famille,
                'depot_legal' => $depot_legal,
                'nom_commercial' => $nom_commercial,
                'effets' => $effets,
                'contre_indication' => $contre_indication,
                'prix_echantillon' => $prix_echantillon
            ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
