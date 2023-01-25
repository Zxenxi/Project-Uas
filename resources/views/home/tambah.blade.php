@extends('home.home')
@section('judul')

@section('halaman')
<div class="search">
    <h2>Buat task anda!</h2>
    {{-- <form action="proses_tambah" method="POST">
        @csrf
        <button type="submit" class="button-62">tambah</button>
        <div class="input-group">
            <input value="" class="form-control" type="text" name="judul" id="text-1542372332072" required="required"
                placeholder="Ihr Name">
            <label for="text-1542372332072">Buat Task</label>
            @error('judul')
            <div class=" message"><span style="color: red">{{ $message }}</span></div>
            @enderror
        </div>
    </form>
    <form action="cari" method="GET">
        @csrf
        <button class="button-62" type="submit" value="CARI">cari</button>
        <div class="input-group">
            <input value="{{ old('cari') }}" class="form-control" type="text" name="cari" id="text-1542372332072"
                required="required" placeholder="cari">
            <label for="text-1542372332072">Cari</label>
        </div>
    </form> --}}
    {{-- hr ini ya --}}
    <form action="proses_tambah" method="POST">
        @csrf
        <input type="text" placeholder="Buat task!" name="judul">
        @error('judul')
        <div class=" message"><span style="color: red">{{ $message }}</span></div>
        @enderror
        <button type="submit" class="button-62">tambah</button>
    </form>
    <div class="space">
        <form action="cari" method="GET">
            <input type="text" name="cari" placeholder="Cari" value="{{ old('cari') }}">
            <button class="button-62" type="submit" class="cari" value="CARI">cari
        </form>
    </div>
</div>
<?php $no = 1; ?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Task</th>
                <th>action</th>
            </tr>
        </thead>
        @foreach ($data as $x)
        <tbody>
            <tr>
                <td>{{ $no++ }}</td>
                <td> {{$x->judul}}</td>
                <td>
                    <a class="action" href="/edit{{ $x->id }}">edit</a>
                    <a class="action" href="/delete{{ $x->id }}">delete</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <h5>
        Halaman : {{ $data->currentPage() }} <br />
        Jumlah Data : {{ $data->total() }} <br />
        Data Per Halaman : {{ $data->perPage() }} <br />
        {{ $data->links() }}
    </h5>
</div>
@endsection