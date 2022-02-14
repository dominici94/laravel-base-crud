<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // VALIDAZIONE
        $request->validate([
            "title" => "required|string|max:75|unique:comics",
            "description" => "required|string",
            "image" => "nullable|url",
            "price" => "required|numeric|between:0.99,99999.99",
            "series" => "nullable|string|max:50",
            "sale_date" => "required|date",
            "type" => [
                    "required",
                    Rule::in('graphic novel', 'comic book', 'altro'),
                ]
        ]);

        // dd($request);
        // $newComic = new Comic();
        // $newComic->title = $data["title"];
        // $newComic->description = $data["description"];
        // if (!empty($data["image"])) {
        //     $newComic->image = $data["image"];
        // }
        // $newComic->price = $data["price"];
        // $newComic->series = $data["series"];
        // $newComic->sale_date = $data["sale_date"];
        // $newComic->type = $data["type"];
        // $newComic->save();

        // MASS ASSIGNMENT
        $newComic = Comic::create($data);

        return redirect()->route("comics.show", $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::find($id);

        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view("comics.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        // VALIDAZIONE
        $request->validate([
            "title" => "required|string|max:75|unique:comics,title,{$comic->id}",
            "description" => "required|string",
            "image" => "nullable|url",
            "price" => "required|numeric|between:0.99,99999.99",
            "series" => "nullable|string|max:50",
            "sale_date" => "required|date",
            "type" => [
                    "required",
                    Rule::in('graphic novel', 'comic book', 'altro'),
                ]
        ]);
        // $comic->title = $data["title"];
        // $comic->description = $data["description"];
        // if (!empty($data["image"])) {
        //     $comic->image = $data["image"];
        // }
        // $comic->price = $data["price"];
        // $comic->series = $data["series"];
        // $comic->sale_date = $data["sale_date"];
        // $comic->type = $data["type"];
        // $comic->save();

        // MASS ASSIGNMENT
        $comic->update($data);

        return redirect()->route("comics.show", $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route("comics.index");
    }
}
