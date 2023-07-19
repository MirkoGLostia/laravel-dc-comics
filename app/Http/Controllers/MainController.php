<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

class MainController extends Controller
{
    public function index() {

        $comics = Comic :: all();

        return view("home", compact('comics'));
    }

    public function show($id) {

        $comic = Comic :: findOrFail($id);

        return view('show', compact('comic'));
    }

    public function create() {

        return view('create');
    }

    public function store(Request $request) {

        $data = $request -> validate(
            $this -> getValidationRule()
        );

        $comic = Comic :: create([
            "title" => $data["title"],
            "description" => $data["description"],
            "thumb" => $data["thumb"],
            "price" => $data["price"],
            "series" => $data["series"],
            "sale_date" => $data["sale_date"],
            "type" => $data["type"]
        ]);

        return redirect() -> route('show', $comic -> id);
    }

    public function edit($id) {

        $comic = Comic :: findOrFail($id);

        return view('edit', compact("comic"));
    }
    public function update(Request $request, $id) {

        $data = $request -> validate(
            $this -> getValidationRule()
        );

        $comic = Comic :: findOrFail($id);

        $comic -> update($data);

        return redirect() -> route('show', $comic -> id);
    }

    public function destroy($id) {

        $comic = Comic :: findOrFail($id);

        $comic -> delete();

        return redirect() -> route('index');
    }

    private function getValidationRule() {

        return [
            'title' => 'required|max:32',
            'description' => 'required|max:256',
            'thumb' => 'required',
            'price' => 'required|integer',
            'series' => 'required|max:32',
            'sale_date' => 'date',
            'type' => 'required|max:32'
        ];
    }


}
