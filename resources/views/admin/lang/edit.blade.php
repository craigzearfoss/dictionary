@extends('admin._layouts.main')

@php
    $directionalities = \App\Models\Lang::DIRECTIONALITIES;
@endphp

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 30rem;">

            <form id="frmLang" class="admin-form" action="{{ $action }}" method="{{ $method }}">
                @csrf
                @if ($method == 'put')
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col">
                        @include('_partials.message-container')
                    </div>
                </div>

                <div class="mb-3">
                    <label for="abbrev" class="form-label">Abbreviation</label>
                    <input type="text" class="form-control" name="abbrev" id="abbrev" value="{{ $lang->abbrev }}" placeholder="example: fr, de, en-us, etc.">
                </div>
                <div class="mb-3">
                    <label for="short" class="form-label">Short Name</label>
                    <input type="text" class="form-control" name="short" id="short" value="{{ $lang->short }}" placeholder="example: English - US, German, French, etc.">
                </div>
                <div class="mb-3">
                    <label for="full" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full" id="full" value="{{ $lang->full }}" placeholder="example: French, German, American English, etc">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" name="code" id="code" value="{{ $lang->code }}" placeholder="example: fr, de, us, etc.">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">English Language Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $lang->name }}" placeholder="example: French, German, English, etc.">
                </div>
                <div class="mb-3">
                    <label for="directionality" class="form-label">Directionality</label>
                    <select class="form-select" name="directionality" id="directionality">
                        @foreach ($directionalities as $directionality)
                            <option value="{{ $directionality }}" {{ $directionality === $lang->directionality ? 'selected="selected"' : '' }}>{{ $directionality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="local" class="form-label">Local Language Name</label>
                    <input type="text" class="form-control" name="local" id="local" value="{{ $lang->local }}" placeholder="example: Français, Deutsch, English, etc.">
                </div>
                <div class="mb-3">
                    <label for="wiki" class="form-label">Wikipedia Article</label>
                    <input type="text" class="form-control" name="wiki" id="wiki" value="{{ $lang->wiki }}" placeholder="example: fr:Français, de:Deutsche Sprache, en:English language, etc.">
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="active" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="active" id="active" value="1"
                            {{ $method === 'post' || $lang->active ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="active">Active</label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}" style="width: 5rem;">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
                        @if ($method == 'put')
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.lang.edit', $lang->id) }}">Re-Edit</a>
                        @else
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.lang.edit', '##') }}">Re-Edit</a>
                        @endif
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.create') }}">Create Another Language</a>
                    </div>
                </div>

            </form>

        </div>
    </div>


    <script type="text/javascript">

        const validationRules = {
            abbrev: {
                required: true,
                maxlength: 10,
                minlength: 2
            },
            short: {
                required: true,
                maxlength: 50
            },
            full: {
                required: false,
                maxlength: 100
            },
            code: {
                required: true,
                maxlength: 10,
                minlength: 2
            },
            name: {
                required: true,
                maxlength: 50
            },
            directionality: {
                required: true
            },
            local: {
                required: true,
                maxlength: 100
            },
            wiki: {
                required: false,
                maxlength: 100
            },
        };

        const validationMessages = {
            abbrev: {
                required: "Please enter the abbreviation.",
                maxlength: "Abbreviation can be no longer than 10 characters.",
                minlength: "Abbreviation has to be at least 2 characters long."
            },
            short: {
                required: "Please enter the short name.",
                maxLength: "Short name can be no longer than 50 characters."
            },
            full: {
                required: "Please enter the full name.",
                maxLength: "Full name can be no longer than 100 characters."
            },
            code: {
                required: "Please enter the code.",
                maxlength: "Code can be no longer than 10 characters.",
                minLength: "Code has to be at least 2 characters long."
            },
            name: {
                required: "Please enter the English language name.",
                maxLength: "English language name can be no longer than 50 characters."
            },
            directionality: {
                required: "Please select the directionality."
            },
            name: {
                required: "Please enter the local language name.",
                maxLength: "Local language name can be no longer than 100 characters."
            },
            wiki: {
                required: "Please enter the Wikipedia article.",
                maxLength: "Wikipedia article language name can be no longer than 100 characters."
            }
        };

    </script>

@endsection
