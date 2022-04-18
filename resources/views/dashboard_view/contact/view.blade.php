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
                    name:    {{ $contact->name }}
                        <br>
                     Message   {{ $contact->message }}


                    </div>

                  <strong>  during 48 h we will retrive all the date thats related to the users</strong>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
