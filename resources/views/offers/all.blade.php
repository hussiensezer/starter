<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{__('home.home')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item">
                    <a class="nav-link" reflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{url('offers/create')}}" tabindex="-1" aria-disabled="true">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('offers/all')}}" tabindex="-1" aria-disabled="true">Show Offers</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="{{__('home.search')}}" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('home.search')}}</button>
            </form>
        </div>
    </nav>
   <div class="table mt-5">
       <div class="container">
           <div class="row">
               <table class="table">
                   <thead>
                   <tr>
                       <th scope="col">#</th>
                       <th scope="col">{{__('home.name')}}</th>
                       <th scope="col">{{__('home.price')}}</th>
                       <th scope="col">{{__('home.details')}}</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       @php
                        //$prefix = LaravelLocalization::getCurrentLocale();
                       // $name = 'name_' . $prefix;
                       // $price = 'price_' . $prefix;
                        //$details = 'details_' . $prefix;
                       @endphp
                       @foreach($offers as $offer)
                       <th scope="row">{{$offer->id}}</th>
                       <td>{{$offer->name}}</td>
                       <td>{{$offer->price}}</td>
                       <td>
                           @if(empty($offer->details))
                               {{'.....'}}
                           @else
                               {{$offer->details}}
                           @endif
                       </td>
                   </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

    </body>
</html>
