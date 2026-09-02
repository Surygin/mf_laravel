@extends('main')

@section('content')
    <section class="person">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12"> <a class="main__btn" href="/">На главную</a> </div>
            </div>
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-12">
                    <div class="person__descr">
                        <h2 class="mb-5">Отчёты</h2>
                        <ul class="docs">
                            <li> <a href="/docs_file/reports/otchet_fonda_v_minust_za_2021.PDF" download> Отчет фонда в
                                    Минюст за 2021 год </a> </li>
                            <li> <a href="/docs_file/reports/otchet_o_celah_i_rashodah_2020.PDF" download> Отчет о целях
                                    расходования денежных средств </a> </li>
                            <li> <a href="/docs_file/reports/buh_otchet_za_2021.pdf" download> Бухгалтерская отчетность
                                    за 2021 год </a> </li>
                            <li> <a href="/docs_file/reports/prod_deet.PDF" download> Сообщение о продолжении
                                    деятельности </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
