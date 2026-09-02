@extends('admin.main')

@section('content')
    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-8 col-12">
                    <div class="article">

                        <div class="article__box mb-5">
{{--                            <a href="{{ route('admin.kids.create') }}" class="btn btn-more mb-5">Добавить</a>--}}
                            <!-- /.btn btn-more -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <th scope="row">#</th>
                                        <td>
                                            {{ $page->title }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-more" rel="noopener noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                </svg>
                                            </a>
{{--                                            <a href="{{ route('admin.kids.delete', $page->id) }}" class="btn btn-danger" onclick="confirm('Вы точно хотите удалить?')" rel="noopener noreferrer">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">--}}
{{--                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>--}}
{{--                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{-- Пагинация --}}
                            <style>
                                /* Пагинация */
                                .pagination .page-link {
                                    color: #5a5050;
                                    background-color: #E5EECE;
                                    border: 1px solid #5a5050;
                                    font-family: inherit;
                                    font-size: 16px;
                                    transition: all 0.3s ease;
                                }

                                .pagination .page-link:hover {
                                    color: #5a5050;
                                    background-color: #d4ddb5;
                                    border-color: #5a5050;
                                }

                                .pagination .page-item.active .page-link {
                                    color: #ffffff;
                                    background-color: #5a5050;
                                    border-color: #5a5050;
                                }

                                .pagination .page-item.disabled .page-link {
                                    color: #8a8080;
                                    background-color: #E5EECE;
                                    border-color: #5a5050;
                                    opacity: 0.7;
                                }

                                .pagination .page-link:focus {
                                    box-shadow: 0 0 0 3px rgba(90, 80, 80, 0.25);
                                    outline: none;
                                }

                                /* Дополнительно: стили для круглой пагинации */
                                .pagination .page-item:first-child .page-link {
                                    border-radius: 0.375rem 0 0 0.375rem;
                                }

                                .pagination .page-item:last-child .page-link {
                                    border-radius: 0 0.375rem 0.375rem 0;
                                }
                            </style>
                            {{-- Bootstrap 5 --}}
                            <nav>
                                {{ $pages->links('pagination::bootstrap-5') }}
                            </nav>

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
@endsection
