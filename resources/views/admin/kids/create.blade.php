@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h3 class="mb-5">Добавление ребенка</h3>
                            <form action="{{ route('admin.kids.store') }}" class="form mb-5" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'name',
                                    'label' => 'Имя',
                                    'value' => old('name'),
                                    'placeholder' => 'Введите имя ребенка'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'last_name',
                                    'label' => 'Фамилия',
                                    'value' => old('last_name'),
                                    'placeholder' => 'Введите фамилию ребенка'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'name_declension',
                                    'label' => 'Имя в склонении (родительный падеж)',
                                    'value' => old('name_declension'),
                                    'placeholder' => 'Например: Прохора'
                                    ]
                                )

                                @include(
                                    'admin.components.form.textarea',
                                    [
                                    'id' => 'content',
                                    'name' => 'history',
                                    'label' => 'История ребенка',
                                    'value' => old('history'),
                                    'placeholder' => 'Введите историю ребенка',
                                    'rows' => 6
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'target_amount',
                                    'label' => 'Требуемая сумма (₽)',
                                    'type' => 'number',
                                    'value' => old('target_amount'),
                                    'placeholder' => 'Введите сумму сбора'
                                    ]
                                )

                                {{-- Поле для загрузки изображения --}}
                                <div class="form-group mb-3">
                                    <label for="avatar" class="form-label">Аватар ребенка</label>
                                    <input
                                        id="avatar"
                                        name="avatar"
                                        type="file"
                                        class="form-control @error('avatar') is-invalid @enderror"
                                        accept="image/*"
                                    >
                                    <small class="text-muted">Рекомендуемый размер: 200x200px</small>
                                    @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Чекбокс активности --}}
                                @include(
                                    'admin.components.form.checkbox',
                                    [
                                    'name' => 'is_active',
                                    'label' => 'Активен',
                                    'checked' => old('is_active', true)
                                    ]
                                )

                                <button class="btn btn-more">
                                    Сохранить
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
