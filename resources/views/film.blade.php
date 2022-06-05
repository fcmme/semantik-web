@extends('template')

@section('content')

<form method="POST" action="/film">
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

    <!-- Phase -->
    <p>Phase: 
        <input type="radio" id="phase0" name="phase" value="">
        <label for="phase0" class="pilihan"> Semua</label>
        <input type="radio" id="phase1" name="phase" value="FILTER (?phase = 'One')">
        <label for="phase1" class="pilihan"> Phase One</label>
        <input type="radio" id="phase2" name="phase" value="FILTER (?phase = 'Two')">
        <label for="phase2" class="pilihan"> Phase Two</label>
        <input type="radio" id="phase3" name="phase" value="FILTER (?phase = 'Three')">
        <label for="phase3" class="pilihan"> Phase Three</label>
        <input type="radio" id="phase4" name="phase" value="FILTER (?phase = 'Four')">
        <label for="phase4" class="pilihan"> Phase Four</label>
    </p>

    <button type="submit" >Filter</button>
</form>

<h4 class="pt-5">Hasil</h4>

<div class="row">

    @foreach ($dataAll as $data)
    <div class="py-3 col-6 col-md-4 col-lg-3 col-xl-2">
        <div class="card text-center" style="width: 10rem;">
            <img src="{{ asset('images/poster') }}/{{ $data->id }}.jpg" class="card-img-top" alt="{{ $data->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $data->title }}</h5>
            </div>
        </div>
    </div>
    @endforeach

    @if (count($dataAll) == 0)
    <p>Tidak ada film yang cocok.</p>
    @endif

</div>

@endsection