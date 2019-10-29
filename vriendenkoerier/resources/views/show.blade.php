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
        <h4 class="font-primary text-color-primary">Title is a long line with a lot of text</h4>
        <h5 class="font-primary text-color-gray-dark">Description</h5>
        <p class="font-secondary text-color-gray-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum,
            sit harum nobis animi suscipit modi natus sed vero mollitia ex unde minus quas, molestiae fuga quidem
            voluptatibus architecto expedita quia!</p>
        <ul>
            <li>
                <h5 class="font-primary text-color-gray-dark">Hoogte</h6>
                    <p class="font-primary text-color-gray-dark">cm</p>
            </li>
            <li>
                <h5 class="font-primary text-color-gray-dark">Breette</h5>
                <p class="font-primary text-color-gray-dark">cm</p>
            </li>
            <li>
                <h5 class="font-primary text-color-gray-dark">Lengte</h5>
                <p class="font-primary text-color-gray-dark">cm</p>
            </li>
        </ul>
        <img src="" alt="foto-van-product">
        <p class="gewicht">gewicht</p>
        <p class="email">emial</p>
        <p class="nummer">nummers</p>
    </div>
</div>
@endsection
