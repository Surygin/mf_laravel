<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/person.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Meta Description с значением по умолчанию -->
    <meta name="description" content="@yield('description', 'Благотворительный фонд помощи детям с генетическими заболеваниями')">

    <title>@yield('title', config('app.name', 'Мой сайт'))</title>

    {{-- Подключаем стили --}}
    @stack('styles')
</head>
<body>

{{-- !!! ПОДКЛЮЧАЕМ ХЕДЕР ИЗ PARTIALS !!! --}}
@include('partials.header')

{{-- Основное содержимое --}}
<main class="main">
    @yield('content')
</main>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const menu = document.querySelector('#header__menu');
        const menuBody = document.querySelector('.header__menu-body');
        const menuClose = document.querySelector('.header__menu-close');

        const helpLinks = document.querySelectorAll('.help__link');
        const modal = document.querySelector('.modal');
        const modalClose = document.querySelector('.modal__btn-close');


        // Открытие меню
        menu.addEventListener('click', function () {

            menuBody.classList.add('active');
            document.body.classList.add('fixed');

        });


        // Закрытие меню
        menuClose.addEventListener('click', function () {

            menuBody.classList.remove('active');
            document.body.classList.remove('fixed');

        });


        // Открытие модального окна
        helpLinks.forEach(function (link) {

            link.addEventListener('click', function () {

                modal.classList.add('active');

            });

        });


        // Закрытие модального окна
        modalClose.addEventListener('click', function () {

            modal.classList.remove('active');

        });

    });

</script>

{{-- !!! ПОДКЛЮЧАЕМ ФУТЕР ИЗ PARTIALS !!! --}}
@include('partials.footer')

{{-- Подключаем скрипты --}}
@stack('scripts')

</body>

</html>
