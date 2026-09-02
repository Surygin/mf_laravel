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

                            <form action="{{ route('admin.kids.update', $kid->id) }}" class="form mb-5" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'name',
                                    'label' => 'Имя',
                                    'value' => old('name', $kid->name ?? ''),
                                    'placeholder' => 'Введите имя ребенка'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'last_name',
                                    'label' => 'Фамилия',
                                    'value' => old('last_name', $kid->last_name ?? ''),
                                    'placeholder' => 'Введите фамилию ребенка'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'name_declension',
                                    'label' => 'Имя в склонении (родительный падеж)',
                                    'value' => old('name_declension', $kid->name_declension ?? ''),
                                    'placeholder' => 'Например: Прохора'
                                    ]
                                )

                                @include(
                                    'admin.components.form.textarea',
                                    [
                                    'id' => 'content',
                                    'name' => 'history',
                                    'label' => 'История ребенка',
                                    'value' => old('history', $kid->history ?? ''),
                                    'placeholder' => 'Введите историю ребенка',
                                    'rows' => 6
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'current_amount',
                                    'label' => 'Текущая сумма (₽)',
                                    'type' => 'number',
                                    'value' => old('target_amount', $kid->fundraisings->first()->current_amount ?? ''),
                                    'placeholder' => 'Введите сумму сбора'
                                    ]
                                )

                                @include(
                                    'admin.components.form.input',
                                    [
                                    'name' => 'target_amount',
                                    'label' => 'Требуемая сумма (₽)',
                                    'type' => 'number',
                                    'value' => old('target_amount', $kid->fundraisings->first()->target_amount ?? ''),
                                    'placeholder' => 'Введите сумму сбора'
                                    ]
                                )

                                {{-- Поле для загрузки изображения --}}
                                <div class="form-group mb-3">
                                    <label for="avatar" class="form-label">Аватар ребенка</label>

                                    @if(isset($kid) && $kid->avatar)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $kid->avatar) }}"
                                                 alt="{{ $kid->full_name ?? '' }}"
                                                 class="img-thumbnail"
                                                 style="max-width: 150px; max-height: 150px;">
                                            <p class="text-muted small">Текущий аватар</p>
                                        </div>
                                    @endif

                                    <input
                                        id="avatar"
                                        name="avatar"
                                        type="file"
                                        class="form-control @error('avatar') is-invalid @enderror"
                                        accept="image/*"
                                    >
                                    <small class="text-muted">
                                        Рекомендуемый размер: 200x200px
                                        @if(isset($kid) && $kid->avatar)
                                            . Оставьте пустым, чтобы сохранить текущий аватар
                                        @endif
                                    </small>
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
                                    'checked' => old('is_active', isset($kid) ? $kid->is_active : true)
                                    ]
                                )

                                <div class="d-flex gap-2">
                                    <button class="btn btn-more">
                                        {{ $submit ?? 'Сохранить' }}
                                    </button>
                                    <a href="{{ route('admin.kids') }}" class="btn btn-more">
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
