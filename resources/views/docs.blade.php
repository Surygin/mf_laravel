@extends('main')

@section('content')
    <section class="person">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-12">
                    <div class="person__descr">
                        <h2 class="mb-5">Документы</h2>
                        <ul class="docs">
                            @foreach($docs as $doc)
                                <li> <a href="{{ $doc->url }}" download> {{ $doc->title }} </a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
