@extends('home.home')
@section('judul')

@section('halaman')
<div class="search">
    <h2>Welcome to my dashboard!</h2>
</div>
<?php $no = 1; ?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Task</th>
            </tr>
        </thead>
        @foreach ($data as $x)
        <tbody>
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$x->judul }}</td>
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