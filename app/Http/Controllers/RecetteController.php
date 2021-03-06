<?php

namespace App\Http\Controllers;

use App\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function index()
    {
        $recettes= Recette::paginate(3);
        $somme=Recette::all();
        $totalRecette = $somme->sum('recette');
        return view('accueil', compact('recettes', 'totalRecette'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'libelle'=> ['required','string'],
            'quantite'=> ['required','numeric'],
            'prix'=> ['required','numeric'],
          ]);
          $produit=$data['prix']*$data['quantite'];
          Recette::create([
            'libelle'=>$request->libelle,
            'quantite'=>$request->quantite,
            'prix'=>$request->prix,
            'recette'=>$produit
        ]);
        return redirect()->back();
    }
}
