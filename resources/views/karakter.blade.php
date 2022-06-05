@extends('template')

@section('content')

<form method="POST" action="/karakter">
    @csrf

    <!-- Search -->
    <h4>Search</h4>
    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" name ="name" class="form-control" />
        </div>
    </div>

    <!-- Filter -->
    <h4 class="pt-5">Filter</h4>

    <!-- Spesies -->
    <p>Spesies: 
        <input type="radio" id="spesies0" name="species" value="">
        <label for="spesies0" class="pilihan"> Semua</label>
        <input type="radio" id="spesies1" name="species" value="FILTER (?species = 'Manusia')">
        <label for="spesies1" class="pilihan"> Manusia</label>
        <input type="radio" id="spesies2" name="species" value="FILTER (?species != 'Manusia')">
        <label for="spesies2" class="pilihan"> Lain-lain</label>
    </p>

    <!-- Film -->
    <p>Film: 
        <select name="films" id="films">
            <option value="">Semua</option>
            @foreach ($dataFilm as $films)
        	<option value="FILTER (?{{ $films->id }} = 'TRUE')">{{ $films->title }}</option>
            @endforeach
        </select>
    </p>

    <button type="submit">Filter</button>
</form>

<h4 class="pt-5">Hasil</h4>

<div class="row">

    @foreach ($dataAll as $data)
    <div class="py-3 col-6 col-md-4 col-lg-3 col-xl-2">
        <a href="/karakter/{{ $data->picture }}" class="card text-center" style="width: 10rem;">
            <img src="{{ asset('images/chara') }}/{{ $data->picture }}.jpg" class="card-img-top" alt="{{ $data->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $data->name }}</h5>
                <p class="card-text text-muted" style="font-size: 11px;"><em>Click for more info.</em></p>
            </div>
        </a>
    </div>
    @endforeach

    @if (count($dataAll) == 0)
    <p>Tidak ada karakter yang cocok.</p>
    @endif

</div>

@endsection