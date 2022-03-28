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
                            <th ></th>
                            <th></th>
                            <th colspan="2">Definite</th>
                            <th colspan="2">Indefinite</th>
                        </tr>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th>Language</th>
                            <th>Singular</th>
                            <th>Plural</th>
                            <th>Singular</th>
                            <th>Plural</th>
                            <th class="text-center" style="width: 10rem;">Actions</th>
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
                                                @if (($article['plurality_name'] == 'singular') && in_array($article['case_id'], [1, 2]))
                                                    <li>
                                                        {{ $article['name'] }}
                                                        @if (!empty($article['gender_name']))
                                                            <i>({{ $article['gender_name'] }})</i>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if (!empty($value['definite']))
                                        <ul style="list-style: none; padding-left: 0;">
                                            @foreach ($value['definite'] as $article)
                                                @if (($article['plurality_name'] == 'plural') && in_array($article['case_id'], [1, 2]))
                                                    <li>
                                                        {{ $article['name'] }}
                                                        @if (!empty($article['gender_name']))
                                                            <i>({{ $article['gender_name'] }})</i>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if (!empty($value['indefinite']))
                                        <ul style="list-style: none; padding-left: 0;">
                                            @foreach ($value['indefinite'] as $article)
                                                @if (($article['plurality_name'] == 'plural') && in_array($article['case_id'], [1, 2]))
                                                    <li>
                                                        {{ $article['name'] }}
                                                        @if (!empty($article['gender_name']))
                                                            <i>({{ $article['gender_name'] }})</i>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if (!empty($value['indefinite']))
                                        <ul style="list-style: none; padding-left: 0;">
                                            @foreach ($value['indefinite'] as $article)
                                                @if (($article['plurality_name'] == 'singular') && in_array($article['case_id'], [1, 2]))
                                                    <li>
                                                        {{ $article['name'] }}
                                                        @if (!empty($article['gender_name']))
                                                            <i>({{ $article['gender_name'] }})</i>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="actions-cell">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.article.show', $article->id) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection
