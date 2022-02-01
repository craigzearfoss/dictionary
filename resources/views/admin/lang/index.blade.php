@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Languages</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.create') }}">Create a New Language</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">

            <table class="table admin-table table-striped table-hover">
                <thead>
                <tr>
                    <th>Abbrev</th>
                    <th>Short</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Dir</th>
                    <th>Local</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value->abbrev }}</td>
                        <td>{{ $value->short }}</td>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->directionality }}</td>
                        <td>{{ $value->local }}</td>
                        <td class="text-end text-nowrap" style="width: 12rem;">
                            <form action="{{ route('admin.lang.destroy', $value->id) }}" method="post">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.show',$value->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.edit',$value->id) }}">Edit</a>
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