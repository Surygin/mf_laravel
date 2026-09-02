@extends('main')

@section('content')
    <section class="main">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-12">

                    <div class="main__text">

                        <div class="main__text-title">

                            <img id="heart_1" class="img__fly" src="{{ asset('img/main/Heart1.png') }}" alt="heart1">

                            <h1>
                                Благотворительный фонд Марии Леонтьевой

                                <img id="heart_2" class="img__fly" src="{{ asset('img/main/Heart2.png') }}" alt="heart2">
                            </h1>

                        </div>
                        <!-- /.main__text-title -->


                        <div class="main__text-subtitle">
                            <p>Быть рядом!</p>
                        </div>
                        <!-- /.main__text-subtitle -->


                        <a class="btn main__btn"
                           style="color: #fff;"
                           href="#donations">
                            Пожертвовать средства
                        </a>

                        <a href="https://t.me/+1l86gq5zIsE0OTAy" class="btn  main__btn main__btn-reverse">
                            Стать&nbsp;волонтером
                        </a>

                        <a href="{{ route('qr-sber') }}" class="btn main__btn main__btn-reverse">
                            Помочь&nbsp;QR
                        </a>

                    </div>
                    <!-- /.main-text -->

                </div>
                <!-- /.col-md-8 -->


                <div class="offset-md-0 col-md-4 offset-3 col-6 d-none d-md-block">

                    <div class="main__bg">

                        <img class="img__fly" src="img/main/rocket.png" alt="rocket">

                        <img class="main__img-bg" src="img/main/Fond_ML.png" alt="фон">

                        <img class="main__img-fly img__fly" src="img/main/lego.png" alt="lego">

                        <img class="main__img-fly2 img__fly" src="img/main/cubes.png" alt="cubes">

                    </div>
                    <!-- /.main__bg -->

                </div>
                <!-- /.col-md-4 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </section>
    <!-- /.main -->


    <!-- ========================================================= -->
    <!-- НУЖНА ПОМОЩЬ -->
    <!-- ========================================================= -->

    <section class="help" id="help">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="help__header" id="whu">
                        Кому нужна наша помощь
                    </h2>
                </div>
            </div>

            @foreach($activeKids as $index => $kid)
                <!-- Ребёнок №1 -->
                <div class="row @if(($index + 1) % 2 == 0) flex-row-reverse @endif">
                    <div class="col-md-6 col-12 text-center">

                        <div class="help__item text-left">

                            <img class="help_photo" src="storage/{{ $kid->avatar }}" alt="{{ $kid->full_name }}">

                            <div class="help__info">

                                <p class="help__name">
                                    {{ $kid->full_name }}
                                </p>

                                <p class="help__money d-flex flex-column">

                                <span>
                                    Внесено пожертвований
                                </span>

                                    <span>
                                    {{ number_format($kid->activeFundraising->current_amount, 0, ',', ' ') }} рублей из
                                </span>

                                    <span>
                                    {{ number_format($kid->activeFundraising->target_amount, 0, ',', ' ') }} рублей
                                </span>

                                </p>

                                <p>
                                    <a class="help__link" href="{{ route('person', $kid->id) }}">
                                        История {{ $kid->declension }}
                                    </a>
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6 col-12">

                        <div class="help__btn d-flex flex-column">

                            <a class="main__btn" href="/?page=person&id=1">
                                Сделать пожертвование
                            </a>

                            <a class="main__btn main__btn-reverse" href="https://t.me/+1l86gq5zIsE0OTAy">
                                Помочь другим способом
                            </a>

                            <a class="main__btn main__btn-reverse" href="#">
                                Счёт для юридических лиц
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach



        </div>

    </section>
    <!-- /.help -->


    <!-- ========================================================= -->
    <!-- УЖЕ ПОМОГЛИ -->
    <!-- ========================================================= -->

    <section class="help mb-5">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center">

                    <h2 class="help__header">
                        Уже помогли
                    </h2>

                </div>

            </div>


            @foreach($closedKids as $index => $kid)
                <!-- Ребёнок №1 -->
                <div class="row @if(($index + 1) % 2 == 0) flex-row-reverse @endif">

                    <div class="col-md-6 col-12 text-center">

                        <div class="help__item text-left">

                            <img class="help_photo" src="{{ asset($kid->avatar) }}" alt="{{ $kid->full_name }}">

                            <div class="help__info">

                                <p class="help__name">
                                    {{ $kid->full_name }}
                                </p>

                                <p style="color: #006600; font-weight: bold;">
                                    Сбор закрыт
                                </p>

                                <p class="help__money d-flex flex-column">

                                <span>
                                    Всего собрано
                                </span>

                                <span>
                                    {{ number_format($kid->total_amounts, 0, ',', ' ') }} рублей
                                </span>

                                </p>

                                <p>
                                    <a class="help__link" href="{{ route('person', $kid->id)  }}">
                                        История {{ $kid->declension }}
                                    </a>
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6 col-12">

                        <div class="help__btn d-flex flex-column">

                            <a class="main__btn main__btn-reverse" href="https://t.me/+1l86gq5zIsE0OTAy">
                                Помочь другим детям
                            </a>

                            <a class="main__btn main__btn-reverse" href="https://t.me/+1l86gq5zIsE0OTAy">
                                Стать волонтёром
                            </a>

                            <a class="main__btn main__btn-reverse" href="#">
                                Счёт для юрлиц
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach


        </div>

    </section>
    <!-- /.help -->


    <!-- ========================================================= -->
    <!-- ВАЖНО -->
    <!-- ========================================================= -->

    <section class="important">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="important__bg">

                        <img src="img/important/important.png" alt="картинка">

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="important__msg">

                        <div class="important__msg-text text-center">

                            <p class="important__msg-title">
                                Делимся важным
                            </p>

                            <p>
                                Фонд Марии Леонтьевой рассматривает разные
                                варианты помощи больным детям. Мы всегда
                                готовы предоставить любые правоустанавливающие
                                документы фонда, счета и акты, чтобы сделать
                                вашу помощь «юридически легкой» для вас.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.important -->


    <!-- ========================================================= -->
    <!-- О ФОНДЕ -->
    <!-- ========================================================= -->

    <section class="about">

        <div class="container">

            <div class="row">

                <div class="col-md-7 col-12">

                    <div class="about__text">

                        <div class="about__text-title">
                            Благотворительный фонд
                            с открытым сердцем
                        </div>

                        <div class="about__text-text">

                            Фонд Марии Леонтьевой зарегистрирован
                            в министерстве юстиции под учетным номером
                            7714017510.

                            Инициативная группа фонда — это волонтеры,
                            которые в разное время пришли на помощь
                            Марии Леонтьевой и её родителям.

                        </div>

                    </div>

                </div>


                <div class="col-md-5 col-12">

                    <div class="about__link text-center">

                        <div class="about__link-wrap">

                            <a class="reg_number" href="http://unro.minjust.ru/NKOs.aspx">
                                Ссылка на регистрационный номер

                                <img src="img/about/Arrow.svg" alt="arrow">

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.about -->


    <!-- ========================================================= -->
    <!-- ОТКРЫТАЯ КНИГА -->
    <!-- ========================================================= -->

    <section class="openBook" id="openBook">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-12">

                    <div class="openBook__img">

                        <img src="img/openBook/openBook.png" alt="background">

                    </div>

                </div>


                <div class="col-lg-6 col-12">

                    <div class="openBook__text">

                        <div class="openBook__text-title">
                            Открытая книга
                        </div>

                        <div class="openBook__text-subtitle">
                            Мы покажем каждый рубль,
                            поступивший к нам
                        </div>

                        <div class="openBook__text-body">

                            Целью нашей работы является не только
                            сбор средств больным детям, но и открытость
                            каждого вашего взноса.

                            Мы не скрываем расходы фонда на рекламу
                            и АХО, а также полученные фондом деньги
                            от юридических лиц.

                            <span>
                                Давайте сделаем Благотворительность
                                прозрачнее.
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.openBook -->


    <!-- ========================================================= -->
    <!-- ЕЖЕМЕСЯЧНЫЕ ПОЖЕРТВОВАНИЯ -->
    <!-- ========================================================= -->

    <section class="donations">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-12">

                    <div class="donations__text">

                        <div class="donations__text-title">
                            Ежемесячная подписка
                            на пожертвования
                        </div>

                        <div class="donations__text-subtitle">
                            Действительно важно
                        </div>

                        <div class="donations__text-body">

                            Ежемесячные перечисления в указанную дату
                            дают нам невероятно важную вещь —
                            возможность планировать!

                            Иногда такой план может спасти жизнь ребенку.

                        </div>

                    </div>

                </div>


                <div class="col-lg-6 col-12">

                    <div class="donations__img">

                        <img src="img/donations/donations.png" alt="картинка">

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.donations -->


    <!-- ========================================================= -->
    <!-- ВОЛОНТЁРСТВО -->
    <!-- ========================================================= -->

    <section class="offer" id="kid_wizard">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center">

                    <div class="offer__header">
                        Стань детским волшебником
                    </div>

                    <div class="offer__subtitle">
                        Чтобы фонд работал эффективнее
                        нам очень нужны волонтеры
                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-lg-3">

                    <div class="offert__heart">

                        <img src="img/donations/heart__1.png" alt="heart">

                        <img class="offer__heart-absolute" src="img/donations/heart__2.png" alt="heart">

                    </div>

                </div>


                <div class="col-lg-6">

                    <form class="offer__form" action="#">

                        <input class="btn main__btn main__btn-reverse" type="text" placeholder="Ваше имя">

                        <input class="btn main__btn main__btn-reverse" type="text" placeholder="Ваш телефон">

                        <button class="btn main__btn">
                            Стань частью нашей Команды
                        </button>

                    </form>

                </div>


                <div class="col-lg-3">

                    <div class="offer__img">

                        <img src="img/donations/magic.png" alt="magic">

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.offer -->


    <!-- ========================================================= -->
    <!-- ПОЖЕРТВОВАНИЕ -->
    <!-- ========================================================= -->

    <section class="donations2" id="donations">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center">

                    <div class="donations2__form">

                        <form action="#">

                            <div class="donations2__form-header">
                                Сделать пожертвование
                            </div>

                            <input class="btn main__btn main__btn-reverse" type="text" name="sum"
                                   placeholder="Введите сумму" value="100">

                            <button class="btn main__btn">
                                Пожертвовать
                            </button>

                            <br>

                            <a href="#" style="margin-top: 20px; color: #F82A04; border-bottom: 1px solid #F82A04;">
                                Оферта
                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /.donations2 -->
@endsection

{{--@push('scripts')--}}
{{-- Пример как пушить скрипты   --}}
{{--@endpush--}}
