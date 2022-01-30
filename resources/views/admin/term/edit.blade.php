@extends('admin.partials.layout')

@php
    $directionalities = \App\Models\Lang::DIRECTIONALITIES;
@endphp

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Edit a Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="frmTerm" action="{ { route('admin.lang.update', $lang->id) } }" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="container" style="max-width: 40rem;">

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
                    <label for="local" class="form-label">local Language Name</label>
                    <input type="text" class="form-control" name="local" id="local" value="{{ $lang->local }}" placeholder="example: Français, Deutsch, English, etc.">
                </div>
                <div class="mb-3">
                    <label for="wiki" class="form-label">Wikipedia Article</label>
                    <input type="text" class="form-control" name="wiki" id="wiki" value="{{ $lang->wiki }}" placeholder="example: fr:Français, de:Deutsche Sprache, en:English language, etc.">
                </div>

                <button type="button" class="btn btn-sm btn-primary ajax-save-btn">Submit</button>

            </div>
        </div>

    </form>
@endsection
