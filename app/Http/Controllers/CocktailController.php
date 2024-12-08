<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cocktail;

class CocktailController extends Controller
{
    public function index()
    {
        // Configuración para desactivar la verificación SSL
        $response = Http::withOptions([
            'verify' => false, // Desactiva la verificación del certificado SSL
        ])->get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita');

        // Procesar la respuesta
        $cocktails = $response->json()['drinks'] ?? [];

        return view('cocktails.index', compact('cocktails'));
    }

    public function store(Request $request)
    {
        Cocktail::create($request->only(['name', 'category', 'image']));
        return redirect()->route('cocktails.index')->with('success', 'Cóctel guardado con éxito.');
    }

    public function saved()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.saved', compact('cocktails'));
    }

    public function destroy($id)
    {
        Cocktail::destroy($id);
        return redirect()->route('cocktails.saved')->with('success', 'Cóctel eliminado con éxito.');
    }
    public function update(Request $request, $id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->name = $request->name;
        $cocktail->category = $request->category;
        $cocktail->save();

        return redirect()->route('cocktails.index')->with('success', 'Cóctel actualizado con éxito');
    }
}
