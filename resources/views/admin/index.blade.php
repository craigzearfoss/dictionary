@extends('admin._layouts.main')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-12">

            <div class="container" style="max-width: 30rem;">

                <ul class="list-group">
                    <li class="list-group-item hdr-primary">
                        <a class="list-group-item list-group-item-action  hdr-secondary" href="{{ route('admin.search.index') }}">Search</a>
                    </li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Dictionary</li>
                    <li class="list-group-item hdr-secondary">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.term.index') }}">Terms</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.lang.index') }}">Languages</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.tag.index') }}">Tags</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.category.index') }}">Categories</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.pos.index') }}">Parts of Speech</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.grade.index') }}">Grades</a>
                            <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.collins_tag.index') }}">Collins Tags</a>
                        </div>
                    </li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Thwords</li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Anti-Thwords</li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Thword Play</li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Extra</li>
                    <li class="list-group-item">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action">Scrambled Thwords</a>
                        </div>
                    </li>
                </ul>

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">
                        <a class="list-group-item list-group-item-action  hdr-secondary" href="{{ route('admin.user.index') }}">Users</a>
                    </li>
                </ul>

            </div>

        </div>
    </div>

@endsection
