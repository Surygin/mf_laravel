@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">Редактирование контактов</h3>
                            <form action="{{ route('contacts.update') }}" class="form mb-5" method="POST">
                                @csrf

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'phone',
                                    'label' => 'Телефон',
                                    'value' => $contact->phone ?? '',
                                    'placeholder' => 'Введите телефон'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'email',
                                    'label' => 'Еmail',
                                    'value' => $contact->email ?? '',
                                    'placeholder' => 'Введите email'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'address',
                                    'label' => 'Адрес',
                                    'value' => $contact->address ?? '',
                                    'placeholder' => 'Введите адрес'
                                    ]
                                )

                                <button class="btn btn-more">
                                    Обновить
                                </button>
                                <!-- /.btn btn-more -->
                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.article__box -->

                    </div>
                    <!-- /.article -->
                </div>
                <!-- /.col-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.hero -->

    @include('admin.partials.toast')

@endsection
