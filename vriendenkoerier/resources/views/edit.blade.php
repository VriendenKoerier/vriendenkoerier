@extends('layouts.app')

@section('content')

<section class="hero is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-family-primary text-color-gray">
                {{$package->title}}
            </h1>
            <h2 class="subtitle is-family-secondary">
                U kunt hier uw pakket bewerken en of verwijderen
            </h2>
        </div>
    </div>
</section>

<section class="section background-primary">
    <div class="container">
        <div class="box max-width">
            <form action="/package/{{$package->id}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <input type="hidden" name="hidden" value="{{$package->show_hash}}">
                <div class="field">
                    <label class="label font-primary">*Titel:</label>
                    <div class="control">
                        <input class="input" type="text" name="title" value="{{$package->title}}"required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Naam:</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input font-secondary" type="text" name="name" value="{{$package->name}}" required>
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
                        <textarea class="textarea font-secondary" name="description" required>{{$package->description}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Afmetingen in cm:</label>
                    <div class="control">
                        <input class="input font-secondary" type="number" name="height" value="{{$package->height}}" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input font-secondary" type="number" name="width" value="{{$package->width}}" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input font-secondary" type="number" name="length" value="{{$package->length}}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Gewicht in kilogram</label>
                    <div class="control">
                        <input class="input font-secondary" type="number" name="weight" value="{{$package->weight}}" required>
                    </div>
                </div>

                <div class="field file has-name">
                    <label class="label font-primary">*Foto</label>
                    <label class="file-label">

                            <br>U kunt helaas uw foto nog niet bewerken.

                    </label>
                </div>


                <div class="field">
                    <label class="label font-primary">*Email:</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input font-secondary" type="email" name="email" value="{{$package->email}}" required>
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
                                <input class="input font-secondary" type="tel" name="phone_number" value="{{$package->phone_number}}">
                            </p>
                        </div>
                        <p class="help">Vul de eerste nul niet in</p>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Postcode locatie A:</label>
                    <div class="control">
                        <input class="input" type="text" name="postcode_a" value="{{$package->postcode_a}}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label font-primary">*Postcode locatie B:</label>
                    <div class="control">
                        <input class="input" type="text" name="postcode_b" value="{{$package->postcode_b}}" required>
                    </div>
                </div>

                <button class="button is-link background-primary-dark text-color-white font-primary"
                    type="submit">Bewerken</button>

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
        <br>
        <form method="POST" action="/package/{{$package->id}}">
            @method('DELETE')
            @csrf
                <input type="hidden" name="hidden" value="{{$package->show_hash}}">
                <button class="button is-danger text-color-white font-primary"
                type="submit">Verwijderen</button>
        </form>
    </div>
    </div>
</section>

@endsection
