<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparql;

class DataController extends Controller
{
    function getAllKarakter()
    {
        $sparql = new Sparql();
        return $sparql->getKarakter('all');
    }

    function filtersKarakter($name, $species, $films){
        $sparql = new Sparql();
        $data = $sparql->memfilterKarakter($name, $species, $films);
        return $data;
    }

    function showProfile($nama){
        $sparql = new Sparql();
        return $sparql->getKarakterSingle($nama);
    }

    function showFilms(){
        $sparql = new Sparql();
        return $sparql->filmList('all');
    }

    function filtersFilm($name, $phase){
        $sparql = new Sparql();
        $data = $sparql->memfilterFilm($name, $phase);
        return $data;
    }

}
