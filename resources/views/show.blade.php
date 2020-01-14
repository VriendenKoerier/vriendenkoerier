@extends('layouts.app')

@section('content')

<section class="hero is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-family-primary text-color-gray">
                Hi!
            </h1>
            <h2 class="subtitle is-family-secondary">
                Zou u mij kunnen helpen met het verzenden van dit pakket?
            </h2>
        </div>
    </div>
</section>

<section class="section background-primary">
    <div class="container">
        <div class="notification is-warning max-width">
            <strong> Vergeet jou pakket niet te delen op social media! </strong> <br>
            Gebruik de kracht van social media en laat jou pakket <strong>gratis</strong> en milieuvriendelijk
            bezorgen. Onderaan de pagina staan share links waarop je kunt klikken om jou pakket te delen! <br>
            Als jij graag een andere sociale media wilt gebruiken om je pakket te delen, gebruik dan de link van
            <strong>dit</strong> pakket boven in de url.
        </div>
        <div class="box max-width">
            {{-- <section class="section"> --}}
            <h2 class="font-primary text-color-primary is-size-3">{{$package->title}}</h2>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark title is-6">Naam:</h5>
                <h5 class="font-primary text-color-gray-dark subtitle is-4">{{$package->name}}</h5>
            </div>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Beschrijving:</h5>
                <p class="font-secondary text-color-gray-dark">{{$package->description}}</p>
            </div>
            <div class="field">
                <div class="list">
                    <div class="list-item">Hoogte in cm: <strong>{{$package->height}}</strong></div>
                    <div class="list-item">Breette in cm: <strong>{{$package->width}}</strong></div>
                    <div class="list-item">Lengte in cm: <strong>{{$package->length}}</strong></div>
                    <div class="list-item">Gewicht in kg: <strong>{{$package->weight}}</strong></div>
                </div>
                {{-- <table class="table is-bordered">
                    <thead>
                        <tr>
                            <th title="hoogte">Hoogte:</th>
                            <th title="breedte">Breedte:</th>
                            <th title="lengte">Lengte:</th>
                            <th title="lengte">Gewicht:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th title="hoogte">{{$package->height}}</th>
                <th title="breedte">{{$package->width}}</th>
                <th title="lente">{{$package->length}}</th>
                <th title="lente">{{$package->weight}}</th>
                </tr>
                </tbody>
                </table> --}}
            </div>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Afbeelding:</h5>
                <figure class="image is-square">
                    <img src="/images/{{$package->photo}}">
                </figure>
            </div>

            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Email:</h5>
                <p>{{$package->email}}</p>
            </div>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Telefoon nummer:</h5>
                <p>0{{$package->phone_number}}</p>
            </div>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Email:</h5>
                <p>{{$package->email}}</p>
            </div>
            <div class="field">
                <h5 class="font-primary text-color-gray-dark">Email:</h5>
                <p>{{$package->email}}</p>
            </div>
            {{-- </section> --}}
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
