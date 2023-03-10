<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();

        return view('links', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ], [
            'url.required' => 'Por favor, insira um link!',
            'url.url' => 'Por favor, insira um link válido! Ex: https://google.com',
        ]);

        $html = file_get_contents($request->url);
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);
        $title = $doc->getElementsByTagName('title')->item(0)->nodeValue;

        if (auth()->check()) {
            $link = Link::firstOrCreate([
                'title' => $title,
                'url' => $request->url,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            $link = Link::firstOrCreate([
                'title' => $title,
                'url' => $request->url,
            ]);
        }

        return redirect()->back()->with([
            'shortened' => $link->identifier,
            'url' => $link->url,
            'title' => $link->title,
            'count' => strlen($link->url) - strlen($link->identifier),
            'success' => 'Link encurtado com sucesso!',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('link-edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'title' => 'required|max:255',
            'identifier' => [
                'required',
                'max:10',
                Rule::unique('links')->ignore($link->id),
            ],
        ], [
            'title.required' => 'Por favor, insira um título!',
            'title.max' => 'O título deve ter no máximo 255 caracteres!',
            'identifier.required' => 'Por favor, insira um identificador!',
            'identifier.max' => 'O identificador deve ter no máximo 10 caracteres!',
            'identifier.unique' => 'O identificador já está em uso!',
        ]);
        
        $link->title = $request->title;
        $link->identifier = $request->identifier;
        $link->save();

        return redirect('/dashboard')->with('success', 'Link atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->back()->with('success', 'Link deletado com sucesso!');
    }

    public function redirect($identifier)
    {
        $link = Link::where('identifier', $identifier)->firstOrFail();

        $link->clicks++;
        $link->save();

        return redirect($link->url);
    }
}
