@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $language->name }}</h1>
        </div>
        <div class="title-buttons col-4 text-end">
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 60rem;">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <h4>Flash Message</h4>
            @include('_partials.flash-message')
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.translate.lang_index', $language->code) }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="{{ $filter }}">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>
                    <span class="result-count {{ !$data->total() ? 'no-results-found' : '' }}">
                        {{ $data->total() == 1 ? '1 result found.' : number_format($data->total())  . ' results found.' }}
                    </span>

                    @if ($data->count() > 0)

                        <table id="grade-table" class="admin-table table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="text-end mr-4" style="width: 3rem;">ID</th>
                                <th>Word</th>
                                <th>Pos</th>
                                <th>Gender</th>
                                <th>Plurality</th>
                                <th>Tense</th>
                                <th>Definition</th>
                                <th class="text-center" style="width: 4rem;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $value)
                                <tr data-id="{{ $value->id }}">
                                    <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                    <td class="align-middle">{{ $value->word }}</td>
                                    <td class="align-middle">{{ $value->term->pos->name }}</td>
                                    <td class="align-middle">{{ $value->gender->name }}</td>
                                    <td class="align-middle">{{ $value->plurality->name }}</td>
                                    <td class="align-middle">{{ $value->tense->name }}</td>
                                    <td class="align-middle">{{ $value->term->definition }}</td>
                                    <td class="actions-cell text-end">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.grade.show', $value->id) }}">Show</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {!! $data->links() !!}
                </div>
            </div>

        </div>
    </div>

@endsection
