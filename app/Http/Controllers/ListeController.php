<?php

namespace App\Http\Controllers;

use App\dao\ServiceMedicaments;
use App\Exceptions\MonException;
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

}
