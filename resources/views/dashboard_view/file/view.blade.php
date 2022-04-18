@extends('dashboard_layouts.index')

@section('content')
    <html>

    <head>
        <title></title>
    </head>

    <body>

        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        {{ $data->name }}
                        {{ $data->description }}

                        <iframe height="600px" width="100%" src="/assets/{{ $data->file }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
