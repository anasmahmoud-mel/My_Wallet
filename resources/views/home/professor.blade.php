@extends('layouts.app-master')

@section('content')

    @auth
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <title>Card Profile</title>
        </head>
        <style>
            body {
                background-color: #89ABE3FF
            }

            .profile-card {
                transition: 0.3s;
            }

            .profile-card:hover {
                transform: scale(1.3);
                transition: 0.5s;
            }

            .profile-photo {
                width: 100px;
                height: 100px;
                margin: 0 auto;
                border-radius: 100%;
                overflow: hidden;
            }

            .social-links ul {
                padding: 0px;
                margin: 0px;
            }

            .social-links ul li {
                list-style: none;
                display: inline-block;
                margin: 2px 0px;
                font-size: 20px;
            }

            .social-links ul li a {
                color: rgb(112, 3, 3);
                padding: 2px 6px;
                border-radius: 5px;
                transition: 0.5s;
            }

            .btn1 {
                height: 40px;
                width: 150px;
                margin: 2%;
                border: none;
                background-color: #000;
                color: #aeaeae;
                font-size: 20px
            }

            }

        </style>

        <body>




            <div class="row row-cols-1 row-cols-md-2 g-4 p-5">
                @foreach ($professor as $professor)
                <div class="col-sm-6">
                    <div class="profile-card text-center shadow bg-light p-4 my-5 rounded-3">
                        <div class="profile-photo shadow">
                            <img src="{{ url('img/laith.jpg') }}" alt="profile Photo" class="img-fluid">
                        </div>
                        <h3 class="pt-3 text-dark">
                            <li>{{ $professor->username }}</li>
                        </h3>
                        <p class="text-secondary ">
                            <li>{{ $professor->email }}</li>
                        </p>

                        <a href="{{ url('/profile/professor', $professor->id) }}">
                        <div class="text-secondary p-2"> <button class="btn1 btn-dark ">View Profile</button> </div>
                        </a>
                        <div class="social-links">
                            <ul>
                                <div class="flex-center">
                                    <li><a href="1"> <i class="fa fa-github fa-4x icon-3d"></i></a></li>
                                    <li><a href="2"> <i class="fa fa-twitter fa-4x icon-3d"></i></a></li>
                                    <li><a href="3"> <i class="fa fa-facebook fa-4x icon-3d"></i></a></li>
                                    <li><a href="4"> <i class="fa fa-instagram fa-4x icon-3d"></i></a></li>
                                    <li><a href="5"> <i class="fa fa-whatsapp fa-4x icon-3d"></i></a></li>
                                </div>



                            </ul>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>






        @endauth

        @guest
            <h1>welcome</h1>
            <p class="lead">Please login to view the professor page.</p>



        @endguest

    </body>

    </html>
@endsection
