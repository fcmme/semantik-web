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

    <button type="submit" class="mt-3">Filter</button>
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