@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">Редактирование реквизитов</h3>
                            <form action="{{ route('requisites.update') }}" class="form mb-5" method="POST">
                                @csrf
                                @method('PUT')

                                @include('admin.components.form.input', [
    'name' => 'inn',
    'label' => 'ИНН',
    'value' => $requisite->inn ?? '',
    'placeholder' => 'Введите ИНН'
])

                                @include('admin.components.form.input', [
                                    'name' => 'rs_number',
                                    'label' => 'Расчётный счёт',
                                    'value' => $requisite->rs_number ?? '',
                                    'placeholder' => 'Введите расчётный счёт'
                                ])

                                @include('admin.components.form.input', [
                                    'name' => 'cs_number',
                                    'label' => 'Корреспондентский счёт',
                                    'value' => $requisite->cs_number ?? '',
                                    'placeholder' => 'Введите корреспондентский счёт'
                                ])

                                @include('admin.components.form.input', [
                                    'name' => 'kpp',
                                    'label' => 'КПП',
                                    'value' => $requisite->kpp ?? '',
                                    'placeholder' => 'Введите КПП'
                                ])

                                @include('admin.components.form.input', [
                                    'name' => 'bik',
                                    'label' => 'БИК',
                                    'value' => $requisite->bik ?? '',
                                    'placeholder' => 'Введите БИК'
                                ])

                                @include('admin.components.form.input', [
                                    'name' => 'ogrn',
                                    'label' => 'ОГРН',
                                    'value' => $requisite->ogrn ?? '',
                                    'placeholder' => 'Введите ОГРН'
                                ])

                                @include('admin.components.form.input', [
                                    'name' => 'bank',
                                    'label' => 'Банк',
                                    'value' => $requisite->bank ?? '',
                                    'placeholder' => 'Введите название банка'
                                ])

                                <button type="submit" class="btn btn-more">
                                    Обновить
                                </button>
                            </form>
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
