<footer class="footer" id="contacts">

    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-12">

                <p class="footer__title">
                    ФОНД<br>
                    МАРИИ<br>
                    ЛЕОНТЬЕВОЙ
                </p>

                <ul class="footer__social">

                    <a href="https://www.mos.ru/city/projects/blago/fond/blagotvoritelnyy-fond-marii-leontyevoy/"
                       style="color: #fff;">
                        Мы на сайте Мэра Москвы
                    </a>

                </ul>

            </div>
            <!-- /.col-lg-3 -->


            <div class="col-lg-3 col-12">

                <p class="footer__title">
                    юридический адрес
                </p>

                <p>
                    {{ $contacts->address }}
                </p>

                <p>
                    Телефон:
                    <span>{{ $contacts->phone }}</span>
                </p>

                <p>
                    E-mail:
                    <span>{{ $contacts->email }}</span>
                </p>

                <p>
                    <a href="{{ route('sms') }}" style="color: #fff">
                        СМС Помощь
                    </a>
                </p>

            </div>
            <!-- /.col-lg-3 -->


            <div class="col-lg-3 col-12">

                <p class="footer__title">
                    Реквизиты:
                </p>

                <p>
                    {{ $contacts->address }}<br>
                    ИНН {{ $requisites->inn }}
                </p>

            </div>
            <!-- /.col-lg-3 -->


            <div class="col-lg-3 col-12">

                <p class="footer__title">
                    банк:
                </p>

                <p>

                        <span class="w-100">
                            ИНН {{ $requisites->inn }}
                        </span>

                    <span class="w-100">
                            Р/С {{ $requisites->rs_number }}
                        </span>

                    <span class="w-100">
                            К/С {{ $requisites->cs_number }}
                        </span>

                    <span class="w-100">
                            КПП {{ $requisites->kpp }}
                        </span>

                    <span class="w-100">
                            БИК {{ $requisites->bik }}
                        </span>

                    <span class="w-100">
                            ОГРН {{ $requisites->ogrn }}
                        </span>

                    <span class="w-100">
                            Получатель платежа: Благотворительный фонд
                        </span>

                    <span class="w-100">
                            Наименование Банка:
                            {{ $requisites->bank }}
                        </span>

                </p>

            </div>
            <!-- /.col-lg-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

</footer>
<!-- /.footer -->
