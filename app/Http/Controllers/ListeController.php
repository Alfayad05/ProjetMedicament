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

    public function validateMedicament()
    {
        try {
            $erreur = "";

            $id_famille = Request::input('id_famille');
            $depot_legal = Request::input('depot_legal');
            $nom_commercial = Request::input('nom_commercial');
            $effets = Request::input('effets');
            $contre_indication = Request::input('contre_indication');
            $prix_echantillon = Request::input('prix_echantillon');
            $unServiceMedicament = new ServiceMedicaments();
            $unServiceMedicament->insertMedicament($id_famille, $depot_legal, $nom_commercial,$effets,$contre_indication,$prix_echantillon);

            return redirect('/getListeMedicament');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function validateMedicament2()
    {
        try {
            $erreur = "";

            $id_medicament = Request::input('id_medicament');
            $id_famille = Request::input('id_famille');
            $depot_legal = Request::input('depot_legal');
            $nom_commercial = Request::input('nom_commercial');
            $effets = Request::input('effets');
            $contre_indication = Request::input('contre_indication');
            $prix_echantillon = Request::input('prix_echantillon');
            $unServiceMedicament = new ServiceMedicaments();
            $unServiceMedicament->modifierMedicament($id_medicament,$id_famille, $depot_legal, $nom_commercial,$effets,$contre_indication,$prix_echantillon);

            return redirect('/getListeMedicament');
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
            $familles = $unServiceMedicaments->getFamille();
            return view('vues/ajouter', compact('mesMedicaments', 'titrevue', 'erreur','familles'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function modifMedicament($id_medicament)
    {
        try {
            $monErreur = "";
            $erreur = "";
            $UnServiceMedicaments = new ServiceMedicaments();
            $unMedicament = $UnServiceMedicaments->getById($id_medicament);
            $familles = $UnServiceMedicaments->getFamille();
            $titrevue = "Modification d'une formulation de médicaments";
            return view('vues/modifier', compact('unMedicament', 'titrevue', 'erreur',"familles"));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function supprimeMedicament($id_medicament)
    {
        try {
            $erreur = "";
            $serviceMedicaments = new ServiceMedicaments();
            $serviceMedicaments->supprimerMedicament($id_medicament);
            $serviceMedicaments = new ServiceMedicaments();
            $mesMedicaments = $serviceMedicaments->getMedicaments();
            return view('vues/liste', compact('mesMedicaments', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }


}
