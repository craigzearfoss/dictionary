@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Terms</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create a New Term</a>
        </div>
    </div>

    <div class="row">
        <div class="container">

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

                    <table class="admin-table table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th class="text-nowrap">Term</th>
                            <th>POS</th>
                            <th>Definition</th>
                            <th>Pron.</th>
                            <th>Collins Tag</th>
                            <th>Sentence</th>
                            <th class="text-nowrap">English - US</th>
                            <th class="text-nowrap">English - UK</th>
                            <th class="text-nowrap">Spanish - LA</th>
                            <th>Enabled</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                <td class="align-middle">{{ $value->term }}</td>
                                <td class="align-middle">{{ $value->pos->name }}</td>
                                <td class="align-middle" style="max-width: 15rem;">{{ $value->definition }}</td>
                                <td class="align-middle">{{ $value->pron_en_us }}</td>
                                <td class="align-middle">{{ $value->collins_tag }}</td>
                                <td class="align-middle" style="max-width: 15rem;">{{ $value->sentence }}</td>
                                <td class="align-middle">{{ $value->en_us }}</td>
                                <td class="align-middle">{{ $value->en_uk }}</td>
                                <td class="align-middle">{{ $value->es_la }}</td>
                                <td class="switch-cell" style="padding-left: 1.5rem;">
                                    <form id="frmEnable" class="form-enable" action="{{ route('api.v1.term.enable', $value->id) }}" method="post">
                                        <div class="form-check form-switch" >
                                            <input type="hidden" role="switch" name="enabled" value="0">
                                            <input class="form-check-input" type="checkbox" role="switch" name="enabled" id="enabled" value="1"
                                                {{ $value->enabled ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label form-label" for="enabled"></label>
                                        </div>
                                    </form>
                                </td>
                                <td class="actions-cell" style="width: 10rem;">
                                    <form id="frmDelete" action="{{ route('api.v1.term.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term.edit', $value->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete-btn btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

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
