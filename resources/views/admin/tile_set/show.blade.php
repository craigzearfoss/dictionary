@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show a Tile Set</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.tile_set.index') }}">Back</a>
        </div>
    </div>


    <div class="row">
        <div class="container">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="tile-set-table" class="admin-table table table-bordered table-hover" style="max-width: 20rem;">
                <tbody>
                <tr>
                    <th style="width: 8rem;">ID</th>
                    <td>{{ $tileSet->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $tileSet->name }}</td>
                </tr>
                <tr>
                    <th>Official</th>
                    <td>{{ $tileSet->official ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Language</th>
                    <td>{{ $tileSet->lang->full }}</td>
                </tr>
                <tr>
                    <th>Num Tiles</th>
                    <td>{{ $tileSet->num_tiles }}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{ $tileSet->active ? 'Yes' : 'No' }}</td>
                </tr>
                </tbody>
            </table>

            <table id="tile-set-table" class="admin-table table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Seq</th>
                    <th>Symbol</th>
                    <th>Base Symbol</th>
                    <th>Case</th>
                    <th>Count</th>
                    <th>Value</th>
                    <th>Name</th>
                    <th>KRow</th>
                    <th>KCol</th>
                    <th>Dec</th>
                    <th>Oct</th>
                    <th>Hex</th>
                    <th>Bin</th>
                    <th>HTML Number</th>
                    <th>HTML Name</th>

                </tr>
                </thead>

                <tbody>

                @foreach($tileSet->tiles as $tile)

                    <tr>
                        <td class="text-center">{{ $tile->seq }}</td>
                        <td class="text-center">{{ $tile->symbol }}</td>
                        <td class="text-center">{{ $tile->base_symbol }}</td>
                        <td class="text-center" class="text-center">{{ $tile->char_case }}</td>
                        <td class="text-center">{{ $tile->cnt }}</td>
                        <td class="text-center">{{ $tile->value }}</td>
                        <td class="text-center">{{ $tile->name }}</td>
                        <td class="text-center">{{ $tile->krow }}</td>
                        <td class="text-center">{{ $tile->kcol }}</td>
                        <td class="text-center">{{ $tile->dec }}</td>
                        <td class="text-center">{{ $tile->oct }}</td>
                        <td class="text-center">{{ $tile->hex }}</td>
                        <td class="text-center">{{ $tile->bin }}</td>
                        <td class="text-center">{{ $tile->html_number }}</td>
                        <td class="text-center">{{ $tile->html_name }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
