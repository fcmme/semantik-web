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
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/semweb/query');

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
            }
            ORDER BY ASC(?name)"
        );
        return $result;
    }

    function memfilterKarakter ($name, $species, $films)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/semweb/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?name ?picture
            WHERE {
                ?person ab:name ?name ;
                ab:picture  ?picture ;
                ab:species  ?species ;
                ab:fullName ?fullName ;
                ab:gender   ?gender ;
                ab:birthYear ?birthYear ;
                ab:actor    ?actor ;
                ab:ir       ?ir ;
                ab:tih      ?tih ;
                ab:ir2      ?ir2 ;
                ab:th       ?th ;
                ab:catfa    ?catfa ;
                ab:ta       ?ta ;
                ab:ir3      ?ir3 ;
                ab:ttdw     ?ttdw ;
                ab:catws    ?catws ;
                ab:gotg     ?gotg ;
                ab:aaou     ?aaou ;
                ab:am       ?am ;
                ab:cacw     ?cacw ;
                ab:ds       ?ds ;
                ab:gotgv2   ?gotgv2 ;
                ab:smh      ?smh ;
                ab:tr       ?tr ;
                ab:bp       ?bp ;
                ab:aiw      ?aiw ;
                ab:amatw    ?amatw ;
                ab:cm       ?cm ;
                ab:ae       ?ae ;
                ab:smffh    ?smffh ;
                ab:bw       ?bw ;
                ab:sc       ?sc ;
                ab:et       ?et ;
                ab:smnwh    ?smnwh ;
                ab:dsmm     ?dsmm .
            {$species}
            {$films}
            FILTER regex (?name, '{$name}', 'i')
            }
            ORDER BY ASC(?name)"
        );
        return $result;
    }

    function getKarakterSingle ($nama)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/semweb/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT *
            WHERE {
                ?person ab:name ?name ;
                        ab:picture  ?picture ;
                        ab:species  ?species ;
                        ab:fullName ?fullName ;
                        ab:gender   ?gender ;
                        ab:birthYear ?birthYear ;
                        ab:actor    ?actor ;
                        ab:ir       ?ir ;
                        ab:tih      ?tih ;
                        ab:ir2      ?ir2 ;
                        ab:th       ?th ;
                        ab:catfa    ?catfa ;
                        ab:ta       ?ta ;
                        ab:ir3      ?ir3 ;
                        ab:ttdw     ?ttdw ;
                        ab:catws    ?catws ;
                        ab:gotg     ?gotg ;
                        ab:aaou     ?aaou ;
                        ab:am       ?am ;
                        ab:cacw     ?cacw ;
                        ab:ds       ?ds ;
                        ab:gotgv2   ?gotgv2 ;
                        ab:smh      ?smh ;
                        ab:tr       ?tr ;
                        ab:bp       ?bp ;
                        ab:aiw      ?aiw ;
                        ab:amatw    ?amatw ;
                        ab:cm       ?cm ;
                        ab:ae       ?ae ;
                        ab:smffh    ?smffh ;
                        ab:bw       ?bw ;
                        ab:sc       ?sc ;
                        ab:et       ?et ;
                        ab:smnwh    ?smnwh ;
                        ab:dsmm     ?dsmm .
            FILTER (?picture = '{$nama}')
            }"
        );
        return $result;
    }

    function filmList ($type = 'all', $value = '')
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/semweb/query');

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

    function memfilterFilm ($name, $phase)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/semweb/query');

        $result = $sparql->query(
            "PREFIX ab: <http://learningsparql.com/ns/addressbook#>

            SELECT ?id ?title ?phase
            WHERE {
                ?person ab:id ?id ;
                        ab:title ?title ;
                        ab:phase ?phase .
            {$phase}
            FILTER regex (?title, '{$name}', 'i')
            }"
        );
        return $result;
    }

}
