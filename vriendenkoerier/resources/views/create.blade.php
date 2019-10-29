@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="create-heading">
        <div class="contain">

            <h4 class="font-primary text-color-gray-dark">Niew pakket verzenden</h4>
            <p class="font-secondary text-color-gray-dark">Vul hier alle gegevens in van het pakket dat u wilt
                verzenden.
            </p>

        </div>
        <svg class="white-circle upsidedown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 120" class="">
            <title>Combined Shape Copy 5</title>
            <path d="M1280 94.705V0H0v94.791C186.553 110.79 405.425 120 639.5 120c234.494 0 453.73-9.243 640.5-25.295z"
                fill="#FFF"></path>
        </svg>

    </div>
    <div class="modal-form">
        <form class="font-secondary" action="" method="post">
            <fieldset>
                <label class="font-primary" for="">Naam</label>
                <input type="text">
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Afmetingen</label>
                <input type="number" name="height" placeholder="hoogte">
                <input type="number" name="width" placeholder="breette">
                <input type="number" name="lenght" placeholder="lengte">
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Gewicht</label>
                <input type="number">
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Foto's van het pakket</label>
                <input type="file">
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Beschrijving</label>
                <textarea name="description" id=""></textarea>
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Email</label>
                <input type="text">
            </fieldset>
            <fieldset>
                <label class="font-primary" for="">Nummer</label>
                <input type="text">
            </fieldset>
            <button class="button-primary button-form font-primary text-color-white" type="submit">Nieuw pakket</button>
        </form>
    </div>
</div>

@endsection
