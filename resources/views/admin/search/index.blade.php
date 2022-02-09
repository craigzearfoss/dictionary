@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Search</h1>
        </div>
    </div>

    <div class="row m-2">
        <div class="container">

            <form id="frmSearch" class="admin-form pt-1 pb-2" action="{{ route('api.v1.search.index') }}" method="post">

                <div class="row">
                    <div class="col-11">

                        <div class="row">

                            <div class="col-auto">
                                <label for="field_0_value" class="col-sm-2 col-form-label">Search Text</label>
                                <input type="text" class="form-control" name="field[0][value]" id="field_0_value" value="{{ $searchText}}" placeholder="Search Text" style="width: 10rem;">
                            </div>

                            <div class="col-auto">
                                <label for="field_0_name" class="col-sm-2 col-form-label">Field</label>
                                <select class="form-control" name="field[0][name]" id="field_0_name" style="width: 7rem;">
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
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_term" name="dfield[]" value="term" {{ in_array('term', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_term" class="form-check-label">Term</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_definition" name="dfield[]" value="definition" {{ in_array('definition', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_definition" class="form-check-label">Definition</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_pos_id" name="dfield[]" value="pos_id" {{ in_array('pos', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_pos_id" class="form-check-label">Part of Speech</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_category" name="dfield[]" value="category" {{ in_array('category', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_category" class="form-check-label">Category</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_grade" name="dfield[]" value="grade" {{ in_array('grade', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_grade" class="form-check-label">Grade</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-enabled form-check-input" type="checkbox" id="dspfld_enabled" name="dfield[]" value="enabled" {{ in_array('enabled', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_enabled" class="form-check-label">Grade</label>
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
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_{{ Str::replace('-','_', $abbrev) }}" name="dfield[]" value="{{ Str::replace('-','_', $abbrev) }}" {{ in_array($abbrev, $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_{{ Str::replace('-','_', $abbrev) }}" class="form-check-label">{{ $short }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col text-end">
                        <button class="action-search-btn btn btn-sm btn-primary" type="submit">Search</button>
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

                    <table id="searchResults" class="search-results admin-table table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th class="text-nowrap">Term</th>
                            <th>Definition</th>
                            <th>Part of Speech</th>
                            <th>Definition</th>
                            <th>Category</th>
                            <th>Grade</th>
                            <th>French</th>
                            <th>German</th>
                            <th class="text-nowrap">Spanish - LA</th>
                        </tr>
                        </thead>
                        <tbody>
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
