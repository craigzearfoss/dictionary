@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Articles</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.collins_tag.create') }}">Create an Article</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <table id="article-table" class="admin-table table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th>Language</th>
                            <th>Definite</th>
                            <th>Indefinite</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value['id'] }}">
                                <td class="align-middle text-end mr-4">{{ $value['id'] }}</td>
                                <td class="align-middle">{{ $value['name'] }}</td>
                                <td class="text-nowrap">
                                    @if (!empty($value['definite']))
                                        <ul style="list-style: none; padding-left: 0;">
                                            @foreach ($value['definite'] as $article)
                                                <li>
                                                    {{ $article['name'] }}
                                                    @if (!empty($article['gender_name']))
                                                        <i>({{ $article['gender_name'] }})</i></li>
                                                    @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if (!empty($value['indefinite']))
                                        <ul style="list-style: none; padding-left: 0;">
                                            @foreach ($value['indefinite'] as $article)
                                                <li>
                                                    {{ $article['name'] }}
                                                    @if (!empty($article['gender_name']))
                                                        <i>({{ $article['gender_name'] }})</i></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection
