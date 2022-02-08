@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Search Terms</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create a New Term</a>
        </div>
    </div>

    <div class="row m-2">
        <div class="container">

            <form class="admin-form pt-1 pb-2">

                <div class="row">
                    <div class="col-11">

                        <div class="row">

                            <div class="col-auto">
                                <label for="text" class="col-sm-2 col-form-label">Search Text</label>
                                <input type="text" class="form-control" name="text" id="text" value="{{ $searchText}}" placeholder="Search Text" style="width: 10rem;">
                            </div>

                            <div class="col-auto">
                                <label for="field" class="col-sm-2 col-form-label">Field</label>
                                <select class="form-control" name="field" id="field" style="width: 7rem;">
                                    @foreach ($searchFields as $key => $value)
                                        <option value="{{ $key }}" {{ ($searchField == $value) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="pos_id" class="col-sm-2 col-form-label">Part of Speech</label>
                                <select class="form-control" name="pos_id" id="pos_id" style="width: 7rem;">
                                    @foreach ($partsOfSpeech as $key => $value)
                                        <option value="{{ $key }}" {{ ($pos == $value) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="lang" class="col-sm-2 col-form-label">Language</label>
                                <select class="form-control" name="lang" id="lang" style="width: 7rem;">
                                    <option value=""></option>
                                    @foreach ($langs as $abbrev => $full)
                                        <option value="{{ $abbrev }}" {{ ($lang == $abbrev) ? 'selected' : '' }}>
                                            {{ $full }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <select class="form-control" name="category" id="category" style="width: 7rem;">
                                    <option value=""></option>
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $abbrev }}" {{ ($value == $category) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="category" class="col-sm-2 col-form-label">Grade</label>
                                <select class="form-control" name="grade" id="grade" style="width: 7rem;">
                                    <option value=""></option>
                                    @foreach ($grades as $key => $value)
                                        <option value="{{ $abbrev }}" {{ ($key == $grade) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="card mt-2 ml-0 p-0">
                        <div class="card-body p-2">
                            <strong>Fields to Display</strong>
                            <hr class="m-0">
                            <div class="row mt-1">

                                <div class="col-auto">

                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="form-check-input" type="checkbox" id="dspfld_term" name="dfield" value="term" {{ in_array('term', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_term" class="form-check-label">Term</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="form-check-input" type="checkbox" id="dspfld_definition" name="dfield" value="definition" {{ in_array('definition', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_definition" class="form-check-label">Definition</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="form-check-input" type="checkbox" id="dspfld_pos" name="dfield" value="pos" {{ in_array('pos', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_pos" class="form-check-label">Part of Speech</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="form-check-input" type="checkbox" id="dspfld_category" name="dfield" value="category" {{ in_array('category', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_category" class="form-check-label">Category</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="form-check-input" type="checkbox" id="dspfld_grade" name="dfield" value="grade" {{ in_array('grade', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_grade" class="form-check-label">Grade</label>
                                    </div>

                                </div>
                                <div class="col-auto">
                                    @php
                                        $i = -1
                                    @endphp
                                    @foreach ($langs as $abbrev => $short)
                                        @php
                                            $i++
                                        @endphp

                                        @if ( $i % 5 == 0 && $i !== 0)
                                            </div>
                                            <div class="col-auto">
                                        @endif

                                        <div class="form-check inline" style="width: 8rem;">
                                            <input class="form-check-input" type="checkbox" id="dspfld_{{ $abbrev }}" name="dfield" value="{{ $abbrev }}" {{ in_array($abbrev, $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld__{{ $abbrev }}" class="form-check-label">{{ $short }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col text-end">
                        <button class="btn btn-sm btn-primary" type="button">Search</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <div class="row">
        <div class="col">

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

        </div>
    </div>

    <div class="row">
        <div class="col">

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
{{--
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
--}}
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {--!! $data->links() !!--}
                </div>
            </div>

        </div>
    </div>

@endsection
