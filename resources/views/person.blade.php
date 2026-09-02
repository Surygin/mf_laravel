@extends('main')

@section('content')
    <section class="person">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2 class="person__title">{{ $kid->full_name }}</h2>
                </div>
            </div>

            <div class="row person__content">

                <div class="col-lg-6 col-12">
                    <div class="person__img">
                        <img src="{{ $kid->avatar }}" alt="{{ $kid->full_name }}">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="person__descr">

                        {!! $kid->history !!}

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
