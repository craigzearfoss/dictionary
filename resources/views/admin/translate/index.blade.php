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

                <ul class="list-group mt-2">
                    <li class="list-group-item hdr-primary">Languages</li>
                    <li class="list-group-item hdr-secondary">
                        <div class="list-group">

                            @foreach ($languages as $language)
                                <a class="list-group-item list-group-item-action hdr-tertiary" href="{{ route('admin.translate.lang_index', $language->code) }}">{{ $language->short }}</a>
                            @endforeach

                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </div>

@endsection
