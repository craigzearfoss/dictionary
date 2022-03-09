@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="lang-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-tertiary" href="{{ route('admin.lang.edit', $lang->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $lang->id }}</td>
                </tr>
                <tr>
                    <td colspan="2">

                        <table class="admin-table table table-bordered table-hover">
                            <tr>
                                <th>Abbreviation</th>
                                <th>Code</th>
                                <th>Collins</th>
                                <th>Google</th>
                            </tr>
                            <tr>
                                <td>{{ $lang->abbrev }}</td>
                                <td>{{ $lang->code }}</td>
                                <td>{{ $lang->collins }}</td>
                                <td>{{ $lang->google }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Primary</th>
                    <td>{{ $lang->primary ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $lang->full }}</td>
                </tr>
                <tr>
                    <th>Short Name</th>
                    <td>{{ $lang->short }}</td>
                </tr>
                <tr>
                    <th>English Language Name</th>
                    <td>{{ $lang->name }}</td>
                </tr>
                <tr>
                    <th>Directionality</th>
                    <td>{{ $lang->directionality }}</td>
                </tr>
                <tr>
                    <th>Local Language Name</th>
                    <td>{{ $lang->local }}</td>
                </tr>
                <tr>
                    <th>Wikipedia Article</th>
                    <td>{{ $lang->wiki }}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{ $lang->active ? 'Yes' : 'No '}}</td>
                </tr>
                <tr>
                    <th>Speakers</th>
                    <td>{{ number_format($lang->speakers) }}</td>
                </tr>
                <tr>
                    <th>Region</th>
                    <td>{{ $lang->region }}</td>
                </tr>
                <tr>
                    <th>Family</th>
                    <td>{{ $lang->family }}</td>
                </tr>
                <tr>
                    <td colspan="2">

                        <table class="admin-table table table-bordered table-hover">
                            <tr>
                                <th>ISO 639-1</th>
                                <th>ISO 639-2/T</th>
                                <th>ISO 639-2/B</th>
                                <th>ISO 639-3</th>
                            </tr>
                            <tr>
                                <td>{{ $lang->iso6391 }}</td>
                                <td>{{ $lang->iso6392t }}</td>
                                <td>{{ $lang->iso6392b }}</td>
                                <td>{{ $lang->iso6393 }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $lang->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $lang->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
