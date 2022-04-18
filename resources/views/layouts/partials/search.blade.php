@extends('layouts.app-master')

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <style>
        body {
            background-color: #89ABE3FF
        }

    </style>

    <body>


            @auth

                <div class="row row-cols-1 row-cols-md-2 g-4  p-5">
                    @foreach ($file as $file)
                        <div class="col-sm-6">
                            <div class="card border-dark mb-6">
                                <div class="card bg-light mb-6" style="max-width: 31rem;">
                                    <div class="card-header">{{ $file->name }}</div>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">
                                        </p>
                                        <div class="d-grid gap-2">
                                            <a href="{{ url('/view', $file->id) }}" type="button"
                                                class=" w-100 btn btn-outline-dark btn-lg btn-block">View</a>


                                            <a href="{{ url('/download', $file->file) }}" type="button"
                                                class=" w-100 btn btn-outline-dark btn-lg btn-block">Dawnload</a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            @endauth

            @guest
                <h1>Search Page</h1>
                <p class="lead">Your viewing the search page. Please login to view the restricted data.</p>
            @endguest



    </body>

    </html>
@endsection
