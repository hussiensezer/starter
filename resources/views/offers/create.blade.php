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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{__('home.create_offers')}}
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="POST" action="{{route('offers.store')}}">
                    <div class="form-row">
                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" >--}}
                        @csrf
                        <div class="form-group col-md-8">
                            <label for="Name"> {{__('home.name')}}</label>
                            <input type="text" name="name_en" class="form-control" id="Name">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Name"> {{__('home.name_ar')}}</label>
                            <input type="text" name="name_ar" class="form-control" id="Name">
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Price">{{__('home.price')}}</label>
                            <input type="text" name="price_en" class="form-control" id="Price">
                            @error('price_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Price">{{__('home.price_ar')}}</label>
                            <input type="text" name="price_ar" class="form-control" id="Price">
                            @error('price_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Details">{{__('home.details')}}</label>
                            <input type="text" name="details_en" class="form-control" id="Details">
                            @error('details_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Details">{{__('home.details_ar')}}</label>
                            <input type="text" name="details_ar" class="form-control" id="Details">
                            @error('details_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">{{__('home.add_offer')}}</button>
                </form>
            </div>
        </div>

    </body>
</html>
