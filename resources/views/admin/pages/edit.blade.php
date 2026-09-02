@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">{{ $title ?? 'Добавление ребенка' }}</h3>

                            <form action="{{ route('admin.pages.update', $page->id) }}" class="form mb-5" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'title',
                                    'label' => 'Название страницы',
                                    'value' => old('title', $page->title ?? ''),
                                    'placeholder' => 'Введите имя ребенка'
                                    ]
                                )

                                @include(
                                    'admin.components.form.textarea',
                                    [
                                    'name' => 'description',
                                    'label' => 'Текст на странице',
                                    'value' => old('description', $page->description ?? ''),
                                    'placeholder' => 'Введите описание для страницы',
                                    'rows' => 5
                                    ]
                                )

                                @include(
                                    'admin.components.form.textarea',
                                    [
                                    'id' => 'content',
                                    'type' =>'hidden',
                                    'name' => 'content',
                                    'label' => 'Текст на странице',
                                    'class' => 'form-control',
                                    'value' => old('content', $page->content ?? ''),
                                    'placeholder' => 'Введите текст для страницы',
                                    'rows' => 10
                                    ]
                                )

                                <!-- Поле для редактора -->
{{--                                <div id="editor-container" class="form-control"></div>--}}

                                <div class="d-flex gap-2">
                                    <button class="btn btn-more">
                                        {{ $submit ?? 'Сохранить' }}
                                    </button>
                                    <a href="{{ route('admin.pages') }}" class="btn btn-more">
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
