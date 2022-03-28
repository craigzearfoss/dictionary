@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show {{ $language->name }} Translation</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.translate.index', $language->code) }}">Back</a>
        </div>
    </div>


    <div class="row">
        <div class="container" style="max-width: 40rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="translate-table" class="admin-table table table-bordered table-hover">
                <tbody>
                <thead>
                <th colspan="2" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.translate.edit', [$language->code, $translation->id]) }}">Edit</a>
                </th>
                </thead>
                <tr>
                    <th style="width: 6rem;">ID</th>
                    <td>{{ $translation->id }}</td>
                </tr>
                <tr>
                    <th>Word</th>
                    <td>{{ $translation->word }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="p-0">

                        <div class="card">
                            <div class="card-body p-2 pb-0">
                                <table id="translate-table" class="admin-table table table-bordered table-hover mb-2">
                                    <tbody>
                                    <tr>
                                        <th>Term</th>
                                        <td>
                                            <a href="{{ route('admin.term.show', $translation->term->id) }}">
                                                {{ $translation->term->term }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Definition</th>
                                        <td>{{ $translation->term->definition }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pos</th>
                                        <td>{{ $translation->term->pos->name }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $translation->gender->name }}</td>
                </tr>
                <tr>
                    <th>Plurality</th>
                    <td>{{ $translation->plurality->name }}</td>
                </tr>
                <tr class="row" {!! $translation->term->pos->name != 'verb' ? 'style="display: none;"' : '' !!}>
                    <th>Tense</th>
                    <td>{{ $translation->tense->name }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $translation->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $translation->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
