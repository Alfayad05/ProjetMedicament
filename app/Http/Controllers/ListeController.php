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

    public function getInteraction($id_medicament) {
        try {
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');
            $UnServiceMedicaments = new ServiceMedicaments();
            $erreur = $monErreur;
            $interagir = $UnServiceMedicaments->getInteraction($id_medicament);
            $uninteragir = $UnServiceMedicaments->getById($id_medicament);
            return view('vues/afficheInteraction', compact('interagir', 'uninteragir','erreur'));
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
            $med_id_medicament = Request::input('med_id_medicament'); // Ajout du paramètre med_id_medicament

            $unServiceMedicament = new ServiceMedicaments();
            $unServiceMedicament->insertMedicament($id_famille, $depot_legal, $nom_commercial, $effets, $contre_indication, $prix_echantillon, $med_id_medicament); // Passer le med_id_medicament

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
            $med_id_medicament = Request::input('med_id_medicament'); // Ajout du paramètre med_id_medicament

            $unServiceMedicament = new ServiceMedicaments();
            $unServiceMedicament->modifierMedicament($id_medicament,$id_famille, $depot_legal, $nom_commercial,$effets,$contre_indication,$prix_echantillon,$med_id_medicament);

            return redirect('/getListeMedicament');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ajouterInter($id_medicament)
    {
        $unServiceMedicaments = new ServiceMedicaments();
        $medicaments = $unServiceMedicaments->getMedicaments();
        $uninteragir = $unServiceMedicaments->getById($id_medicament);
        return view('vues/ajouterInteraction', compact('uninteragir', 'medicaments'));
    }

    public function validerInteraction()
    {
        $id_medicament = Request::input('id_medicament');
        $med_id_medicament = Request::input('med_id_medicament');

        $unServiceMedicament = new ServiceMedicaments();
        $unServiceMedicament->insertInteraction($med_id_medicament);
        $medicaments = $unServiceMedicament->getMedicaments();
        return view('vues/afficheInteraction', compact('medicaments'));
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
            $medicaments = $unServiceMedicaments->getMedicaments();
            return view('vues/ajouter', compact('mesMedicaments', 'titrevue', 'erreur','familles','medicaments'));
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
            $medicaments = $UnServiceMedicaments->getMedicaments();
            $titrevue = "Modification d'une formulation de médicaments";
            return view('vues/modifier', compact('unMedicament', 'titrevue', 'erreur',"familles",'medicaments'));
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

    public function supprimerInteraction($id_medicament) {
        try {
            $erreur = "";
            $serviceMedicaments = new ServiceMedicaments();
            $serviceMedicaments->supprimerInteraction($id_medicament);
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
