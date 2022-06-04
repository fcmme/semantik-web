<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

require_once realpath(__DIR__ . '/..') . "../../vendor/autoload.php";
// require_once realpath(__DIR__ . '/..') . "../Http/html_tag_helpers.php";

class Sparql extends Model
{
    use HasFactory;

    function getKarakter ($type = 'all', $value = '')
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/marvel/query');

        $name = '';
        $picture = '';

        if($type == 'name'){
            $name = $value;
        }
        else if ($type == 'picture'){
            $picture = $value;
        }
        else if ($type == 'all'){
            $value = '';
        }
        else {
            return "Unknown";
        }

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?name ?picture
            WHERE {
                ?person ab:name ?name ;
                        ab:picture ?picture .
            }"
        );
        return $result;
    }

    function memfilterKarakter ($name, $species, $films)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/marvel/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?name ?picture
            WHERE {
                ?person ab:name ?name ;
                        ab:picture ?picture ;
                        ab:species ?species ;
                        ab:ir2		?ir2 ;
						ab:catfa	?catfa ;
						ab:ta		?ta ;
						ab:ir3		?ir3 ;
						ab:ttdw		?ttdw ;
						ab:catws	?catws ;
						ab:aaou		?aaou ;
						ab:cacw		?cacw ;
						ab:smh		?smh ;
						ab:tr		?tr ;
						ab:aiw		?aiw ;
						ab:ae		?ae .
            {$species}
            {$films}
            FILTER regex (?name, '{$name}', 'i')
            }"
        );
        return $result;
    }

    function getKarakterSingle ($nama)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/marvel/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?name ?picture ?species ?fullName ?gender ?birthYear ?actor ?ir2 ?catfa ?ta ?ir3 ?ttdw ?catws ?aaou ?cacw ?smh ?tr ?aiw ?ae
            WHERE {
                ?person ab:name ?name ;
                        ab:picture  ?picture ;
                        ab:species  ?species ;
                        ab:fullName ?fullName ;
                        ab:gender   ?gender ;
                        ab:birthYear ?birthYear ;
                        ab:actor    ?actor ;
                        ab:ir2      ?ir2 ;
                        ab:catfa    ?catfa ;
                        ab:ta       ?ta ;
                        ab:ir3      ?ir3 ;
                        ab:ttdw     ?ttdw ;
                        ab:catws    ?catws ;
                        ab:aaou     ?aaou ;
                        ab:cacw     ?cacw ;
                        ab:smh      ?smh ;
                        ab:tr       ?tr ;
                        ab:aiw      ?aiw ;
                        ab:ae       ?ae .
            FILTER (?picture = '{$nama}')
            }"
        );
        return $result;
    }

    function filmList ($type = 'all', $value = '')
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/marvel/query');

        $id = '';
        $title = '';

        if($type == 'id'){
            $id = $value;
        }
        else if ($type == 'title'){
            $title = $value;
        }
        else if ($type == 'all'){
            $value = '';
        }
        else {
            return "Unknown";
        }

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?id ?title
            WHERE {
                ?person ab:id ?id ;
                        ab:title ?title .
            }"
        );
        return $result;
    }

    function memfilterFilm ($name)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/marvel/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?id ?title
            WHERE {
                ?person ab:id ?id ;
                        ab:title ?title .
            FILTER regex (?title, '{$name}', 'i')
            }"
        );
        return $result;
    }

}
