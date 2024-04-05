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

    public function getInteraction($id_medicament) {
        try {
            $interaction = DB::table('interagir')
                ->select('medicament.id_medicament', 'medicament.nom_commercial', 'interagir.med_id_medicament')
                ->join('medicament', 'interagir.id_medicament', '=', 'medicament.id_medicament')
                ->where('medicament.id_medicament', '=', $id_medicament)
                ->get();
            return $interaction;
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

    public function insertMedicament($id_famille, $depot_legal, $nom_commercial, $effets, $contre_indication, $prix_echantillon, $med_id_medicament = null)
    {
        try {
            DB::beginTransaction();

            // Insertion du médicament dans la table `medicament`
            $medicamentId = DB::table('medicament')->insertGetId([
                'id_famille' => $id_famille,
                'depot_legal' => $depot_legal,
                'nom_commercial' => $nom_commercial,
                'effets' => $effets,
                'contre_indication' => $contre_indication,
                'prix_echantillon' => $prix_echantillon
            ]);

            // Vérification si med_id_medicament est fourni
            if ($med_id_medicament !== null) {
                // Insertion de l'entrée dans la table `interagir`
                DB::table('interagir')->insert([
                    'id_medicament' => $medicamentId,
                    'med_id_medicament' => $med_id_medicament
                ]);
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function insertInteraction($med_id_medicament = null)
    {
        $medicamentId = DB::table('medicament')->insertGetId([]);
        if ($med_id_medicament !== null) {
            DB::table('interagir')->insert([
                'id_medicament' => $medicamentId,
                'med_id_medicament' => $med_id_medicament
            ]);
        }
    }
    public function modifierMedicament($id_medicament, $id_famille, $depot_legal,$nom_commercial,$effets,$contre_indication,$prix_echantillon,$med_id_medicament)
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

            DB::table('interagir')->where('id_medicament', $id_medicament)->delete();
            DB::table('interagir')->insert([
                'id_medicament' => $id_medicament,
                'med_id_medicament' => $med_id_medicament
            ]);
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

    public function supprimerInteraction($id_medicament) {
        try {
            DB::table('interagir')->where('id_medicament', '=', $id_medicament)->delete();


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
