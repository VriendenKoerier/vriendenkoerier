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
            <form action="/package" method="post" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label class="label font-primary">*Titel:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Titel" name="title" value="{{old('title')}}"
                            autocomplete="title" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Naam:</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input font-secondary" type="text" placeholder="Naam" name="name"
                            value="{{old('name')}}" autocomplete="name" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Beschrijving:</label>
                    <div class="control">
                        <textarea class="textarea font-secondary" placeholder="Beschrijving" name="description"
                            autocomplete="description" required>{{old('description')}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Afmetingen in cm:</label>
                    <div class="control">
                        <input class="input font-secondary" type="number" placeholder="Hoogte" name="height"
                            value="{{old('height')}}" autocomplete="height" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input font-secondary" type="number" placeholder="Breedte" name="width"
                            value="{{old('width')}}" autocomplete="width" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input font-secondary" type="number" placeholder="Lengte" name="length"
                            value="{{old('length')}}" autocomplete="length" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Gewicht in kilogram</label>
                    <div class="control">
                        <input class="input font-secondary" type="number" placeholder="Gewicht" name="weight"
                            value="{{old('weight')}}" autocomplete="weight" required>
                    </div>
                </div>

                <div class="field file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="photo" autocomplete="photo" required>
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label font-primary">
                                *Kies een bestand…
                            </span>
                        </span>
                        <span class="file-name font-secondary">
                            Foto van het product
                        </span>
                    </label>
                </div>


                <div class="field">
                    <label class="label font-primary">*Email:</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input font-secondary" type="email" placeholder="Email" name="email"
                            value="{{old('email')}}" autocomplete="email" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                        <label class="label font-primary">Telefoonnummer:</label>
                    <div class="field is-expanded">
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-static">
                                    +31
                                </a>
                            </p>
                            <p class="control is-expanded">
                                <input class="input font-secondary" type="tel" placeholder="Jouw telefoon nummer"
                                    name="phone_number" value="{{old('phone_number')}}" autocomplete="phone_number">
                            </p>
                        </div>
                        <p class="help">Vul de eerste nul niet in</p>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Postcode locatie A:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Poscode A" name="postcode_a"
                            value="{{old('postcode_a')}}" autocomplete="postcode_a" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Postcode locatie B:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Postcode B" name="postcode_b"
                            value="{{old('postcode_b')}}" autocomplete="postcode_b" required>
                    </div>
                </div>


                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input name="avg_confirmed" type="checkbox" value="true">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>


                <button class=" button-primary background-primary-dark button-form text-color-white font-primary"
                    type="submit">Submit</button>

        @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </form>
    </div>
    </div>
</section>

@endsection
