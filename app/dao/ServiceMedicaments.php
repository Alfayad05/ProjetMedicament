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

    public function getFamille() {
        try {
            $familles = DB::table('famille')
                ->select("id_famille", "lib_famille")
                ->get();
            return $familles;
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

    public function modifierMedicament($id_medicament, $id_famille, $depot_legal,$nom_commercial,$effets,$contre_indication,$prix_echantillon)
    {
        try {
            DB::table('medicament')
                ->where('id_medicament', '=', $id_medicament)
                ->update(['id_famille' => $id_famille,
                    'depot_legal' => $depot_legal,
                    'nom_commercial' => $nom_commercial,
                    'effets' => $effets,
                    'contre_indication' => $contre_indication,
                    'prix_echantillon' => $prix_echantillon]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);

        }
    }

    public function supprimerMedicament($id_medicament){
        try {
            DB::table('medicament')->where('id_medicament', '=', $id_medicament)->delete();
        }catch (QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }



    }

    public function getById($id_medicament)
    {
        try {
            $medicamentById = DB::table('medicament')
                ->where('id_medicament', '=', $id_medicament)
                ->first();

            // Vérifiez si le médicament existe
            if (!$medicamentById) {
                throw new MonException('Medicament not found', 404);
            }

            return $medicamentById; // Retourne l'objet du médicament
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }


}
