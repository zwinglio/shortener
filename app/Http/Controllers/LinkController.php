<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Http\Request;

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
    public function show(Links $links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Links $links)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Links $links)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Links $links)
    {
        //
    }

    public function redirect($identifier)
    {
        $link = Link::where('identifier', $identifier)->firstOrFail();

        $link->clicks++;
        $link->save();

        return redirect($link->url);
    }
}
