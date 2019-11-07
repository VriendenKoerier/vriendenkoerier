@extends('layouts.app')

@section('content')

<section class="hero is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-family-primary text-color-gray">
                {{$package->title}}
            </h1>
            <h2 class="subtitle is-family-secondary">
                Wilt u dit pakket verzenden?
            </h2>
        </div>
    </div>
</section>

<section class="section background-primary">
    <div class="container">
        <div class="box max-width">
            <section class="section">
                <h2 class="font-primary text-color-primary">{{$package->title}}</h2>
                <h5 class="font-primary text-color-gray-dark">{{$package->name}}</h5>
                <h5 class="font-primary text-color-gray-dark">Beschrijving</h5>
                <p class="font-secondary text-color-gray-dark">{{$package->description}}</p>
                <table class="table is-bordered">
                    <thead>
                        <tr>
                            <th title="hoogte">Hoogte</th>
                            <th title="breedte">Breedte</th>
                            <th title="lengte">Lengte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th title="hoogte">{{$package->height}}</th>
                            <th title="breedte">{{$package->width}}</th>
                            <th title="lente">{{$package->length}}</th>
                        </tr>
                    </tbody>
                </table>
                <figure class="image is-squear">
                    <img src="{{public_path('images').'/'.$package->photo}}">
                </figure>
                <h5 class="font-primary text-color-gray-dark">Gewicht in KG</h5>
                <p>{{$package->weight}}</p>
                <h5 class="font-primary text-color-gray-dark">Email</h5>
                <p>{{$package->email}}</p>
                <h5 class="font-primary text-color-gray-dark">Telefoon nummer</h5>
                <p>{{$package->phone_number}}</p>
            </section>
            <div class="buttons has-addons is-centered">
                {{-- <p class="control"> --}}
                <a target="_blank"
                    href="https://www.facebook.com/sharer/sharer.php?u=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="fab fa-facebook-f"></i></span>
                    <span>facebook</span>
                </a>
                {{-- </p> --}}
                {{-- <p class="control"> --}}
                <a target="_blank"
                    href="https://twitter.com/home?status=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="fab fa-twitter"></i></span>
                    <span>twitter</span>
                </a>
                {{-- </p> --}}
                {{-- <p class="control"> --}}
                <a target="_blank"
                    href="mailto:info@example.com?&subject=&body=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="far fa-envelope"></i></span>
                    <span>email</span>
                </a>
                {{-- </p> --}}
            </div>

        </div>
    </div>
    </div>
</section>

@endsection
