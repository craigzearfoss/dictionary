@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.language.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="language-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.language.edit', $language->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $language->id }}</td>
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
                                <td>{{ $language->abbrev }}</td>
                                <td>{{ $language->code }}</td>
                                <td>{{ $language->collins }}</td>
                                <td>{{ $language->google }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Primary</th>
                    <td>{{ $language->primary ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $language->full }}</td>
                </tr>
                <tr>
                    <th>Short Name</th>
                    <td>{{ $language->short }}</td>
                </tr>
                <tr>
                    <th>English Language Name</th>
                    <td>{{ $language->name }}</td>
                </tr>
                <tr>
                    <th>Directionality</th>
                    <td>{{ $language->directionality }}</td>
                </tr>
                <tr>
                    <th>Local Language Name</th>
                    <td>{{ $language->local }}</td>
                </tr>
                <tr>
                    <th>Wikipedia Article</th>
                    <td>{{ $language->wiki }}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{ $language->active ? 'Yes' : 'No '}}</td>
                </tr>
                <tr>
                    <th>Speakers</th>
                    <td>{{ number_format($language->speakers) }}</td>
                </tr>
                <tr>
                    <th>Region</th>
                    <td>{{ $language->region }}</td>
                </tr>
                <tr>
                    <th>Family</th>
                    <td>{{ $language->family }}</td>
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
                                <td>{{ $language->iso6391 }}</td>
                                <td>{{ $language->iso6392t }}</td>
                                <td>{{ $language->iso6392b }}</td>
                                <td>{{ $language->iso6393 }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $language->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $language->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
