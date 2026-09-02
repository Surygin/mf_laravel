@extends('main')

@section('description', $page->description)

@section('content')
    <section class="person">

        <div class="container">

            <!-- Заголовок -->
            <div class="row">

                <div class="col-12 text-center">

                    <h2 class="mb-5">
                        {{ $page->title }}
                    </h2>

                </div>

            </div>

            <!-- Текст -->
            <div class="row">

                <div class="offset-lg-3 col-lg-6 col-12">

                    <div class="person__descr">

                        {!!  $page->content !!}

                    </div>
                    <!-- /.person__descr -->

                </div>

            </div>

        </div>
        <!-- /.container -->

    </section>
    <!-- /.person -->
@endsection
