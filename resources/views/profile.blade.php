@extends('template')

@section('content')
@foreach ($dataAll as $data)

<div class="row">

    <div class="col-12 col-md-5 col-xl-3">
        <div class="card mx-auto" style="width: 15rem;">
            <img src="{{ asset('images/chara') }}/{{ $data->picture }}.jpg" class="card-img-top profile-card" alt="{{ $data->picture }}">
        </div>
    </div>

    <div class="col-12 col-md-7 col-xl-9">
        <h1>{{ $data->name }}</h1>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Nama Lengkap: </th>
                    <td>{{ $data->fullName }}</td>
                </tr>
                <tr>
                    <th scope="row">Spesies: </th>
                    <td>{{ $data->species }}</td>
                </tr>
                <tr>
                    <th scope="row">Jenis Kelamin: </th>
                    <td colspan="2">{{ $data->gender }}</td>
                </tr>
                <tr>
                    <th scope="row">Tahun Kelahiran: </th>
                    <td colspan="2">{{ $data->birthYear }}</td>
                </tr>
                <tr>
                    <th scope="row">Pemeran: </th>
                    <td colspan="2">{{ $data->actor }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h3 class="mt-3">Film</h3>

<div class="row">

    @foreach ($dataFilm as $films)
        @if ($data->{$films->id} == 'TRUE')
        <div class="py-3 col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card text-center" style="width: 10rem;">
                <img src="{{ asset('images/poster') }}/{{ $films->id }}.jpg" class="card-img-top" alt="{{ $films->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $films->title }}</h5>
                </div>
            </div>
        </div>
        @endif
    @endforeach

</div>

@endforeach
@endsection