@extends('home.home')

@section('judul')

@section('halaman')
<div class="search">
    <h3>edit task anda!</h3>

    <form action="update" method="POST">
        @csrf
        @foreach ($data as $x)
        <input type="hidden" placeholder="buat task" name="id" value="{{ $x->id }}">
        <input type="text" placeholder="buat task" name="judul" value="{{ $x->judul }}">
        @endforeach
        @error('judul')
        <div class="message"><span style="color: red">{{ $message }}</span></div>
        @enderror
        <button type="submit" class="cari">Simpan</button>
    </form>
</div>
<?php $no = 1; ?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Task</th>
                {{-- <th>edit</th> --}}
                {{-- <th>delete</th> --}}
            </tr>
        </thead>
        @foreach ($data as $x)
        <tbody>
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$x->judul }}</td>
                {{-- <td><a href="/edit{{ $x->id }}">edit</a></td>
                <td><a href="/delete{{ $x->id }}">delete</a></td> --}}
            </tr>
        </tbody>
        @endforeach
    </table>
    {{-- <li> {{$data}}</li> --}}
    @endsection