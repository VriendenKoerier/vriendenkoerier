@extends('layouts.app')

@section('content')
<div class="panorama">
    <div class="containing-desktop">

        {{-- <figure class="panorama-image"> --}}
        <svg class="panorama-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 407">
            <g id="Layer_2" data-name="Layer 2" transform="translate(-81.425 -77.285)">
                <g id="Layer_1" data-name="Layer 1" transform="translate(81.425 77.285)">
                    <path id="Path_1" data-name="Path 1"
                        d="M431.088,414.216a9.39,9.39,0,0,1,1.648-18.59A103.976,103.976,0,0,0,519.73,238.1a9.39,9.39,0,0,1,8.841-14.2,39.1,39.1,0,1,0-35.424-33.8,9.385,9.385,0,0,1-13.769,9.487,103.979,103.979,0,0,0-153.319,94.218,9.387,9.387,0,0,1-18.77.431,122.742,122.742,0,0,1,167.289-117.51,57.875,57.875,0,1,1,68.178,65.077A122.778,122.778,0,0,1,433.151,414.4a9.637,9.637,0,0,1-2.064-.18Z"
                        transform="translate(-218.257 -127.094)" fill="#fff" />
                    <path id="Path_2" data-name="Path 2"
                        d="M193.921,508.934a75.075,75.075,0,0,1,5.113-147.975A163.5,163.5,0,0,1,342.707,128a9.387,9.387,0,0,1,.436,18.77,144.148,144.148,0,0,0-120.6,218.351,9.39,9.39,0,0,1-8.835,14.2,56.278,56.278,0,1,0,50.959,48.654,9.39,9.39,0,0,1,13.774-9.487A144.634,144.634,0,0,0,490.99,287.909a9.387,9.387,0,0,1,18.77-.431c1.027,43.33-15.1,84.648-45.358,116.34A161.919,161.919,0,0,1,283.693,441.8a75.114,75.114,0,0,1-89.772,67.136Z"
                        transform="translate(-133.902 -127.532)" fill="#fff" />
                    <path id="Path_3" data-name="Path 3"
                        d="M464.2,294.138l-59.153,34.156a12.917,12.917,0,0,0-6.464,11.192v68.281A12.917,12.917,0,0,0,405.044,419L464.2,453.161a12.922,12.922,0,0,0,12.927,0L536.282,419a12.922,12.922,0,0,0,6.458-11.192V339.532a12.923,12.923,0,0,0-6.461-11.193l-59.156-34.2A12.922,12.922,0,0,0,464.2,294.138Zm50.384,43.3L470.67,362.8,426.75,337.442l43.921-25.356ZM417.355,353.7l43.921,25.356v50.728L417.355,404.43Zm62.69,76.085V379.058L523.966,353.7v50.713Z"
                        transform="translate(-262.696 -207.536)" fill="#fff" />
                </g>
            </g>
        </svg>
        {{-- </figure> --}}
        <div class="contain">
            <div class="panorama-heading">
                <h1 class="font-primary text-color-white">Vrienden <br> Koerier</h1>
                <p class="font-secondary text-color-white">
                    Verzend pakketen gratis en milieu- vriendelijk bla bla bla
                </p>
            </div>
        </div>
        <div class="header-atc">
            <div class="white-circle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 120" class="">
                    <title>Combined Shape Copy 5</title>
                    <path
                        d="M1280 94.705V0H0v94.791C186.553 110.79 405.425 120 639.5 120c234.494 0 453.73-9.243 640.5-25.295z"
                        fill="#FFF"></path>
                </svg>
            </div>
            <div class="contain">
                <h4 class="atc-header font-primary text-color-primary">
                    Nieuw pakket verzenden
                </h4>
                <p class="font-secondary text-color-primary">
                    Vul hier alle gegevens in van het pakket dat u wilt verzenden.
                </p>
                <a class="button-primary font-primary text-color-white" href="/create">Nieuw pakket</a>
            </div>
        </div>
    </div>
</div>
@endsection
