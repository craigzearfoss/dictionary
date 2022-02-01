@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Terms</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create a New Term</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-nowrap">Term</th>
                    <th>Definition</th>
                    <th class="text-nowrap">English - US</th>
                    <th class="text-nowrap">English - UL</th>
                    <th class="text-nowrap">Spanish - LA</th>
                    <th class="text-center">French</th>
                    <th class="text-center">German</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value->term }}</td>
                        <td>{{ $value->definition }}</td>
                        <td>{{ $value->en_us }}</td>
                        <td>{{ $value->en_uk }}</td>
                        <td>{{ $value->es_la }}</td>
                        <td>{{ $value->fr }}</td>
                        <td>{{ $value->de }}</td>
                        <td class="text-end text-nowrap" style="width: 12rem;">
                            <form action="{{ route('admin.term.destroy', $value->id) }}" method="post">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.show',$value->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.edit',$value->id) }}">Edit</a>
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
