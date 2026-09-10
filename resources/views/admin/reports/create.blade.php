@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">{{ $title ?? 'Добавить отчет' }}</h3>

                            <form action="{{ route('admin.reports.store') }}" class="form mb-5" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'title',
                                    'label' => 'Название документа',
                                    'placeholder' => 'Введите название документа'
                                    ]
                                )

                                @include(
                                    'admin.components.form.file',
                                    [
                                    'name' => 'url',
                                    'label' => 'Файл документа',
                                    ]
                                )

                                @include(
                                    'admin.components.form.date',
                                    [
                                    'name' => 'date',
                                    'label' => 'Дата документа',
                                    ]
                                )

                                <div class="d-flex gap-2">
                                    <button class="btn btn-more">
                                        {{ $submit ?? 'Сохранить' }}
                                    </button>
                                    <a href="{{ route('admin.reports') }}" class="btn btn-more">
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
