@extends('layouts.app')

@section('content')

<section class="hero is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-family-primary text-color-gray">
                Maak een nieuw pakket aan
            </h1>
            <h2 class="subtitle is-family-secondary">
                Vul hier alle gegevens in van het pakket dat u wilt verzenden
            </h2>
        </div>
    </div>
</section>

<section class="section background-primary">
    <div class="container">
        <div class="box max-width">
            <section class="section">
                <h2 class="font-primary text-color-primary">Title</h2>
                <h5 class="font-primary text-color-gray-dark">Naam</h5>
                <h5 class="font-primary text-color-gray-dark">Beschrijving</h5>
                <p class="font-secondary text-color-gray-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsum,
                    sit harum nobis animi suscipit modi natus sed vero mollitia ex unde minus quas, molestiae fuga
                    quidem
                    voluptatibus architecto expedita quia!</p>
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
                            <th title="hoogte">10</th>
                            <th title="breedte">10</th>
                            <th title="lente">10</th>
                        </tr>
                    </tbody>
                </table>
                <figure class="image is-squear">
                    <img src="https://bulma.io/images/placeholders/256x256.png">
                </figure>
                <h5 class="font-primary text-color-gray-dark">Gewicht in KG</h5>
                <p>10</p>
                <h5 class="font-primary text-color-gray-dark">Email</h5>
                <p>email@email.nl</p>
                <h5 class="font-primary text-color-gray-dark">Telefoon nummer</h5>
                <p>+31 6 12345678</p>
            </section>
            <div class="buttons has-addons is-centered">
                {{-- <p class="control"> --}}
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="fab fa-facebook-f"></i></span>
                    <span>facebook</span>
                </a>
                {{-- </p> --}}
                {{-- <p class="control"> --}}
                <a href="https://twitter.com/home?status=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="fab fa-twitter"></i></span>
                    <span>share</span>
                </a>
                {{-- </p> --}}
                {{-- <p class="control"> --}}
                <a href="mailto:info@example.com?&subject=&body=https://beta.vriendenkoerier.nl/package/{{$package->id}}"
                    class="button is-primary">
                    <span class="icon"><i class="far fa-envelope"></i></span>
                    <span>share</span>
                </a>
                {{-- </p> --}}
            </div>

        </div>
    </div>
    </div>
</section>

@endsection
