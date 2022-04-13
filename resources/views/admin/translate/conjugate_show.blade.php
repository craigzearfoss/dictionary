@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Conjugate Verb</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.translate.index', $language->code) }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    Present
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>

@endsection
