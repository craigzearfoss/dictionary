@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Thword</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.thword.index') }}">Back</a>
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
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.edit', $thword->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $thword->id }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td colspan="6">{{ $thword->subject }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $thword->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $thword->description }}</td>
                </tr>
                <tr>
                    <th>Language</th>
                    <td>{{ $thword->language->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $thword->category->name }}</td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td>{{ $thword->grade->name }}</td>
                </tr>
                <tr>
                    <th>Synonyms</th>
                    <td>{{ implode(', ', $thword->getSynonyms()) }}</td>
                </tr>
                <tr>
                    <th>Antonyms</th>
                    <td>
                        {{ implode(', ', $thword->getAntonyms()) }}
                    </td>
                </tr>
                <tr>
                    <th>Terms</th>
                    <td>
                        <div class="row">
                            @foreach (json_decode($thword->terms) as $i=>$term)
                                <div class="col-1">
                                    <strong>{{ $i  }}</strong>
                                </div>
                                <div class="col-11">
                                    <ul>
                                        @foreach ($term as $key=>$value)
                                            <li>{{ $key }}: {{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{ $thword->active ? 'Yes' : 'No '}}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $thword->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $thword->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
