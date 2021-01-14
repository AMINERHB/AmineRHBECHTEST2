<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;

class ProduitController extends Controller
{
    public function storeProduit(Request $request) {
        $produit = new Produit();
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->price = $request->price;
        $produit->image = $request->image;
        $produit->save();

        return $produit;
    }

    public function getProduit(Request $request) {
        $produit = Produit::all();

        return $produit;
    }
    
    public function deleteProduit(Request $request){
        $produit = Produit::find($request->id)->delete();
    }

    public  function editProduit(Request $request, $id){
        $produit = Produit::where('id',$id)->first();

        $produit->name = $request->get('val_1');
        $produit->description = $request->get('val_2');
        $produit->price = $request->get('val_3');
        $produit->image = $request->get('val_4');

        $produit->save();

        return $produit;
    }
}