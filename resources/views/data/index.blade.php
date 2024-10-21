@extends('main.app')

@section('title', 'Survei')

@section('content')

    <div class="container">

        <div class="m-4">
            <form action="{{ route('data.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <div class="col-12 d-flex justify-content-between">
                        <input class="form-control shadow-sm" name="file" type="file" style="max-width: 48%;">
                        <button type="submit" style="background-color: #828C51; color: white;"
                            class="btn ms-auto">Simpan</button>
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-light shadow-sm mt-3">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Score</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($survey as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->score }}</td>
                            <td align="right"><button style="background-color: #828C51; color: white;"
                                    class="btn btn-sm">Detail</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $survey->links() }}
        </div>
    </div>

@endsection
