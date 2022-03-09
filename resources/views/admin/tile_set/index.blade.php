@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Tile Sets</h1>
        </div>
        <div class="title-buttons col-4 text-end">
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

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.tile_set.index') }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="{{ $filter }}">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>
                    <span class="result-count {{ !$data->total() ? 'no-results-found' : '' }}">
                        {{ $data->total() == 1 ? '1 result found.' : number_format($data->total())  . ' results found.' }}
                    </span>

                    @if ($data->count() > 0)

                        <table id="tile-set-table" class="admin-table table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th class="text-center">Official</th>
                                <th class="text-center">Num Tiles</th>
                                <th class="text-center">Language</th>
                                <th class="text-center">Active</th>
                                <th class="text-center" style="width: 4rem;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $value)
                                <tr data-id="{{ $value->id }}" class="{{ !$value->active ? 'inactive-row' : '' }}">
                                    <td class="align-middle mr-4">{{ $value->id }}</td>
                                    <td class="align-middle mr-4">{{ $value->name }}</td>
                                    <td class="align-middle text-center">{{ $value->official ? 'Yes' : 'No' }}</td>
                                    <td class="align-middle text-center">{{ $value->num_tiles }}</td>
                                    <td class="align-middle">{{ $value->lang_id ? $value->lang->name : '' }}</td>
                                    <td class="align-middle text-center">{{ $value->active ? 'Yes' : 'No' }}</td>
                                    <td class="actions-cell text-end">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tile_set.show', $value->id) }}">Show</a>
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
