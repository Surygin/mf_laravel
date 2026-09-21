@extends('admin.main')

@section('content')

    <div class="container" style="height: 90vh;">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="article__box mb-5">
                    <form action="{{ route('login.auth') }}" class="form" method="POST" enctype="multipart/form-data">
                        <h3 class="mb-5 text-center">Авторизация</h3>
                        <input type="text" class="form-control mb-2" name="email" placeholder="Введите название">
                        <input type="password" class="form-control mb-2" name="password" placeholder="Введите пароль">
                        <div class="text-center">
                            <button class="btn btn-more">
                                Отправить
                            </button>
                            <!-- /.btn btn-more -->
                        </div>
                        <!-- /.text-center -->
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.article__box -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

@endsection()
