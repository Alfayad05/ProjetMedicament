<?php

namespace App\Http\Controllers;

use App\dao\ServiceMedicaments;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ListeController
{
    public function getListeMedicaments() {
        try {
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceListe = new ServiceMedicaments();
            $id_liste = Session::get('id');
            $erreur = $monErreur;
            $mesMedicaments = $unServiceListe->getMedicaments();
            return view('vues/liste', compact('mesMedicaments', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/monerror', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/monerror', compact('monErreur'));
        }
    }

    public function updateMedicament($id_medicament)
    {
        try {
            $monErreur = "";
            $erreur = "";
            $unServiceMedicament = new ServiceMedicaments();
            $unMedicament = $unServiceMedicament->getById($id_medicament);
            $titrevue = "Modification d'une fiche de Frais";
            return view('vues/ajouter', compact('unMedicament', 'titrevue', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function validateMedicament()
    {
        try {
            $erreur = "";

            $id_medicament = Request::input('id_medicament');
            $depot_legal = Request::input('depot_legal');
            $nom_commercial = Request::input('nom_commercial');
            $effets = Request::input('effets');
            $contre_indication = Request::input('contre_indication');
            $prix_echantillon = Request::input('prix_echantillon');

            $unServiceMedicament = new ServiceMedicaments();
                $unServiceMedicament->insertMedicament($id_medicament, $depot_legal, $nom_commercial,$effets,$contre_indication,$prix_echantillon);

            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function addMedicament()
    {
        try {
            $erreur = "";
            $titrevue = "Ajout d'une formule de medicament";
            $id_visiteur = Session::get('id');
            $unServiceMedicaments = new ServiceMedicaments();
            $mesMedicaments = $unServiceMedicaments->getMedicaments();
            return view('vues/ajouter', compact('mesMedicaments', 'titrevue', 'erreur', 'id_visiteur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}
