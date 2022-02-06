@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Terms</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create a New Term</a>
        </div>
    </div>

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

    <div class="row">
        <div class="col-12">

            <table class="admin-table table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-nowrap">Term</th>
                    <th>POS</th>
                    <th>Definition</th>
                    <th>Category</th>
                    <th>Sentence</th>
                    <th class="text-nowrap">English - US</th>
                    <th class="text-nowrap">English - UK</th>
                    <th class="text-nowrap">Spanish - LA</th>
                    <th>French</th>
                    <th>German</th>
                    <th>Italian</th>
                    <th class="text-nowrap">Portuguese - BR</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value->term }}</td>
                        <td>{{ $value->pos_text }}</td>
                        <td style="max-width: 15rem;">{{ $value->definition }}</td>
                        <td>{{ $value->category_text }}</td>
                        <td style="max-width: 15rem;">{{ $value->sentence }}</td>
                        <td>{{ $value->en_us }}</td>
                        <td>{{ $value->en_uk }}</td>
                        <td>{{ $value->es_la }}</td>
                        <td>{{ $value->fr }}</td>
                        <td>{{ $value->de }}</td>
                        <td>{{ $value->it }}</td>
                        <td>{{ $value->pt_br }}</td>
                        <td class="text-end text-nowrap" style="width: 12rem;">
                            <form action="{{ route('admin.term.destroy', $value->id) }}" method="post">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.show', $value->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.edit', $value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </form>
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

@endsection
