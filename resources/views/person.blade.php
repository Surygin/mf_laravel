@extends('main')

@section('content')
    <section class="person">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2 class="person__title">Имя Фамилия</h2>
                </div>
            </div>

            <div class="row person__content">

                <div class="col-lg-6 col-12">
                    <div class="person__img">
                        <img src="/img/avatars/default.jpg" alt="Фото Имя Фамилия">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="person__descr">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Sed euismod, nunc ut laoreet consectetur, nisi nisl aliquam
                            nunc, eget aliquam nisl nunc euismod nunc.
                        </p>

                        <div class="person__btn">
                            <a class="btn main__btn docs__btn" style="color: #fff;" href="#">
                                Фото и документы
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
