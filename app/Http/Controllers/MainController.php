<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class MainController extends Controller
{
    public function dataKarakter()
    {
        $data = new DataController();
        $dataAll = $data->getAllKarakter();
        $dataFilm = $data->showFilms();
        return view('karakter', compact('dataAll', 'dataFilm'));
    }

    public function hasilFilterKarakter(Request $request)
    {
        $data = new DataController();
        $name = $request->name;
        $species = $request->species;
        $films = $request->films;
        $dataAll = $data->filtersKarakter($name, $species, $films);
        $dataFilm = $data->showFilms();
        return view('karakter', compact('dataAll', 'dataFilm'));
    }

    public function profile($nama){
        $data = new DataController();
        $dataAll = $data->showProfile($nama);
        $dataFilm = $data->showFilms();
        return view('profile', compact('dataAll', 'dataFilm'));
    }

    public function dataFilm()
    {
        $data = new DataController();
        $dataAll = $data->showFilms();
        return view('film', compact('dataAll'));
    }

    public function hasilFilterFilm(Request $request)
    {
        $data = new DataController();
        $name = $request->name;
        $phase = $request->phase;
        $dataAll = $data->filtersFilm($name, $phase);
        return view('film', compact('dataAll'));
    }
}