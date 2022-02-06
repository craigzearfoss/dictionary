@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Parts of Speech</h1>
        </div>
        <div class="title-buttons col-4 text-end">
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <h4>Flash Message</h4>
            @include('_partials.flash-message')
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <table class="admin-table table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle">{{ $value->name }}</td>
                                <td class="action-cell text-end" style="width: 12rem;">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.pos.show', $value->id) }}">Show</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {!! $data->links() !!}
                </div>
            </div>

        </div>
    </div>

@endsection