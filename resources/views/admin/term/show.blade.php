@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 40rem;">

            <table class="table table-sm table-striped table-bordered">
                <tr>
                    <th style="width: 10rem;">Term:</th>
                    <td>{{ $term->term }}</td>
                </tr>
                <tr>
                    <th>Definition:</th>
                    <td>{{ $term->definition }}</td>
                </tr>
                <tr>
                    <th>Sentence:</th>
                    <td>{{ $term->sentance }}</td>
                </tr>
                <tr>
                    <th>American English:</th>
                    <td>{{ $term->en_us }}</td>
                </tr>
                <tr>
                    <th>British English:</th>
                    <td>{{ $term->en_uk }}</td>
                </tr>
            </table>

        </div>
    </div>

@endsection
