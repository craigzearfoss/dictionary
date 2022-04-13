@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Tenses</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            {{--
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.tense.create') }}">Create a Tense</a>
            --}}
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 60rem;">

            <div class="row">
                <div class="col">

                    <table id="tense-table" class="admin-table table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th>Name</th>
                            <th>Tense</th>
                            <th>Structure</th>
                            <th>Sample</th>
                            <th class="text-center" style="width: 10rem;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                <td class="align-middle">{{ $value->name }}</td>
                                <td class="align-middle">{{ $value->tense }}</td>
                                <td class="align-middle">{!! str_replace(';', '<br>', $value->structure) !!}</td>
                                <td class="align-middle">{{ $value->sample }}</td>
                                <td class="actions-cell">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.show', $value->id) }}">Show</a>
                                    {{--
                                    <form id="frmDelete" action="{{ route('api.v1.tense.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.edit', $value->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete-btn btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    --}}
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
