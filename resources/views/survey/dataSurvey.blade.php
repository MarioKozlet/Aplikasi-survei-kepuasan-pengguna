@extends('main.app')

@section('title', 'Survei')

@section('content')

    <div class="container">
        <form action="{{ route('survey.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-3">
                <div class="col-8">
                    <input class="form-control" type="file" name="file">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->usia }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $data->links() }}
            </div>
        </div>
    </div>

@endsection
