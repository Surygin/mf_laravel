@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">{{ $title ?? 'Изменить документ' }}</h3>

                            <form action="{{ route('admin.promo-codes.update', $promoCode->id) }}" class="form mb-5" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'title',
                                    'label' => 'Название документа',
                                    'value' => old('title', $promoCode->title ?? ''),
                                    'placeholder' => 'Введите название документа'
                                    ]
                                )

                                @include(
                                    'admin.components.form.file',
                                    [
                                    'name' => 'url',
                                    'label' => 'Файл документа',
                                    'value' => old('title', $promoCode->url ?? ''),
                                    ]
                                )

                                @include(
                                    'admin.components.form.date',
                                    [
                                    'name' => 'date',
                                    'label' => 'Дата документа',
                                    'value' => old('title', $promoCode->date ?? ''),
                                    ]
                                )

                                <div class="d-flex gap-2">
                                    <button class="btn btn-more">
                                        {{ $submit ?? 'Сохранить' }}
                                    </button>
                                    <a href="{{ route('admin.promo-codes') }}" class="btn btn-more">
                                        Отмена
                                    </a>
                                </div>
                                <!-- /.d-flex -->
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
