@extends('layouts.app-master')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>

        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    </head>

    <body>

        <div class="container mt-5">
            <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
                <h3 class="text-center mb-5">Upload File</h3>
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="file">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>

                </div>





                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Article Name"
                        aria-label="default input example">
                </div>

                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="description" placeholder="Article description"
                        aria-label="default input example">
                </div>

                {{-- <div class="input-group mb-3">
                    <input class="form-control" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div> --}}

                <div class="input-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                        Upload Files
                    </button>

                </div>
            </form>
        </div>
    </body>

    </html>

@endsection
