@extends('layouts.app')

@section('content')
    <h1>Kontak</h1>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telpon</label>
                    <input type="tel" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mb-2">Kirim</button>
            </form>
        </div>
    </div>
@endsection