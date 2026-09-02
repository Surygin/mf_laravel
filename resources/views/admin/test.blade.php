@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
                            <h2>Для чего я сделал этот сайт?</h2>
                            <a href="#" class="article__mark">блог</a>
                            <p class="article__mark">17 сент 2020</p>
                            <p class="article__anons">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolor quia aliquam cum id nemo quam voluptatibus consectetur tempore veritatis exercitationem, molestias est dolorum praesentium provident, quaerat rerum necessitatibus ullam illo eos ratione esse odio molestiae? Amet, quisquam. Fugiat qui iste minus temporibus labore praesentium asperiores, reiciendis ipsa ratione placeat.</p>
                            <a class="article__link btn btn-more" href="article.html">Читать далее...</a>
                        </div>
                        <hr>
                        <!-- /.article__box -->

                        <div class="article__box mb-5">
                            <h2>Как сделать загрузочную флешку?</h2>
                            <a href="#" class="article__mark">для дома</a>
                            <p class="article__mark">17 сент 2020</p>
                            <p class="article__anons">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolor quia aliquam cum id nemo quam voluptatibus consectetur tempore veritatis exercitationem, molestias est dolorum praesentium provident, quaerat rerum necessitatibus ullam illo eos ratione esse odio molestiae? Amet, quisquam. Fugiat qui iste minus temporibus labore praesentium asperiores, reiciendis ipsa ratione placeat.</p>
                            <a class="article__link btn btn-more" href="article.html">Читать далее...</a>
                        </div>
                        <hr>
                        <!-- /.article__box -->

                        <div class="article__box mb-5">
                            <h2>Как сделать сетевой принтер?</h2>
                            <a href="#" class="article__mark">для офиса</a>
                            <p class="article__mark">17 сент 2020</p>
                            <p class="article__anons">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolor quia aliquam cum id nemo quam voluptatibus consectetur tempore veritatis exercitationem, molestias est dolorum praesentium provident, quaerat rerum necessitatibus ullam illo eos ratione esse odio molestiae? Amet, quisquam. Fugiat qui iste minus temporibus labore praesentium asperiores, reiciendis ipsa ratione placeat.</p>
                            <a class="article__link btn btn-more" href="article.html">Читать далее...</a>
                        </div>
                        <hr>
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
@endsection
