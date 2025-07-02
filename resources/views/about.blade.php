@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
    <h1 class="text-center mb-5">TENTANG KAMI</h1>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>M Prabu Kiandamar Utoyo</td>
                    <td><a href="{{ route('detail1') }}" class="btn btn-primary btn-sm">Lihat Detail</a></td>
                </tr>
                <tr>
                    <td>M Iqbal Nurjaman</td>
                    <td><a href="{{ route('detail2') }}" class="btn btn-primary btn-sm">Lihat Detail</a></td>
                </tr>
                <tr>
                    <td>Ulfah Nuraeni</td>
                    <td><a href="{{ route('detail3') }}" class="btn btn-primary btn-sm">Lihat Detail</a></td>
                </tr>
                <tr>
                    <td>Rifal Fajar Sidiq</td>
                    <td><a href="{{ route('detail4') }}" class="btn btn-primary btn-sm">Lihat Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
