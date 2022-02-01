@extends('admin.partials.layout')

@php
    $directionalities = \App\Models\Lang::DIRECTIONALITIES;
@endphp

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Create a New Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    <form id="frmLang" class="admin-form" action="{{ route('api.v1.lang.store') }}" method="post">
        @csrf

        <div class="row">
            <div id="msg-container" class="container message-container alert alert-danger p-2 mb-2 hidden" style="max-width: 40rem; ">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0">
                    <li>This is test message 1.</li>
                    <li>This is test message 2.</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="container form-container" style="max-width: 40rem;">

                <div class="mb-3">
                    <label for="abbrev" class="form-label">Abbreviation</label>
                    <input type="text" class="form-control" name="abbrev" id="abbrev" placeholder="example: fr, de, en-us, etc.">
                </div>
                <div class="mb-3">
                    <label for="short" class="form-label">Short Name</label>
                    <input type="text" class="form-control" name="short" id="short" placeholder="example: English - US, German, French, etc.">
                </div>
                <div class="mb-3">
                    <label for="full" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full" id="full" placeholder="example: French, German, American English, etc">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="example: fr, de, us, etc.">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">English Language Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="example: French, German, English, etc.">
                </div>
                <div class="mb-3">
                    <label for="directionality" class="form-label">Directionality</label>
                    <select class="form-select" name="directionality" id="directionality">
                        @foreach ($directionalities as $directionality)
                            <option value="{{ $directionality }}" {{ $directionality === 'ltr' ? 'selected="selected"' : '' }}>{{ $directionality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="local" class="form-label">Local Language Name</label>
                    <input type="text" class="form-control" name="local" id="local" placeholder="example: Français, Deutsch, English, etc.">
                </div>
                <div class="mb-3">
                    <label for="wiki" class="form-label">Wikipedia Article</label>
                    <input type="text" class="form-control" name="wiki" id="wiki" placeholder="example: fr:Français, de:Deutsche Sprache, en:English language, etc.">
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary ajax-save-btn">Save</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
            </div>
        </div>

    </form>


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
            }
        };

        const validationMessages = {
            abbrev: {
                required: "Please enter the abbreviation,",
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

