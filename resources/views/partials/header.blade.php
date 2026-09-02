<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-4">
                <div class="header__menu">
                    <div class="header__menu-link">

                        <p id="header__menu">
                            <span class="header__menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </p>

                        <ul class="header__menu-body">
                            <li><img class="header__menu-close" src="{{ asset('img/header/close_btn.svg') }}" alt="Закрыть меню"></li>
                            <li><a href="/">Главная</a></li>
                            <li><a href="/#help">Кому нужна помощь?</a></li>
                            <li><a href="{{ route('documents') }}">Документы</a></li>
                            <li><a href="{{ route('reports') }}">Отчеты</a></li>
                            <li><a href="{{ route('history') }}">История фонда</a></li>
                            <li><a href="https://cloud.mail.ruxXTt/F6cFe6AvU">Активный гражданин</a></li>
                            <li><a href="{{ route('sms') }}">СМС - помощь</a></li>
                            <li><a href="/#contacts">Контакты</a></li>
                        </ul>

                    </div> <!-- /.header__menu-link -->
                </div> <!-- /.header__menu -->
            </div> <!-- /.col-md-2 col-4 -->

            <div class="col-md-7 col-8">

                <div class="header__menu-social text-right text-lg-center">
                    <a class="header__menu-moscow"
                       href="https://www.mos.ru/city/projects/blago/fond/blagotvoritelnyy-fond-marii-leontyevoy/"
                       target="_blank" rel="noopener noreferrer">
                        Мы на сайте Мэра Москвы
                    </a>
                </div>
                <!-- /.header__menu-social -->

            </div>
            <!-- /.col-md-7 -->

            <div class="col-md-3 col-12">

                <div class="header__menu-contacts">

                    <p>
                        <a href="tel:{{ $contacts->phone }}">
                            {{ $contacts->phone }}
                        </a>
                    </p>

                    <p>
                        <a class="header__menu-contacts-mail" href="mailto:{{ $contacts->email }}">
                            {{ $contacts->email }}
                        </a>
                    </p>

                </div>
                <!-- /.header__menu-contacts -->

            </div>
            <!-- /.col-md-3 -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</header> <!-- /.header -->
