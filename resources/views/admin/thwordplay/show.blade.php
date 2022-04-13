@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Thwordplay</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.thwordplay.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @include('_partials.message-container')
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 50rem;">

            <table id="term-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="2" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.edit', $thwordplay->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $thwordplay->id }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td colspan="6">{{ $thwordplay->subject }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $thwordplay->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $thwordplay->description }}</td>
                </tr>
                <tr>
                    <th>Language</th>
                    <td>{{ $thwordplay->language->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $thwordplay->category->name }}</td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td>{{ $thwordplay->grade->name }}</td>
                </tr>
                <tr>
                    <th>Thwords</th>
                    <td>{{ implode(', ', $thwordplay->getSynonyms()) }}</td>
                </tr>
                <tr>
                    <th>Bonus Questions</th>
                    <td>
                        <ol class="mb-0" style="padding-inline-start: 1rem;">
                            @foreach ($thwordplay->getBonusQuestions() as $question)
                                <li>{{ $question }}</li>
                            @endforeach
                        </ol>
                    </td>
                </tr>
                <tr>
                    <th>Anwers</th>
                    <td>
                        <div class="row">
                            <div class="col">

                                <table class="admin-table table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Thword</th>
                                        <th>Bonus 1</th>
                                        <th>Bonus 2</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach (json_decode($thwordplay->terms) as $i=>$term)
                                        <tr>
                                            <td>{{ $term->thword ?? '' }}</td>
                                            <td>{{ $term->bonus1 ?? '' }}</td>
                                            <td>{{ $term->bonus2 ?? '' }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{!! $thwordplay->active ? '&#10004;' : '' !!}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $thwordplay->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $thwordplay->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
