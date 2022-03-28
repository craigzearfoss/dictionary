@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Articles</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.article.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <h4>{{ $language->short }}</h4>

            @if (in_array($language->code, ['cs', 'hr', 'ja', 'ko']))
                <p style="font-size: .8rem;">{{ $language->short }} has no articles.</p>
            @else

                @if (!empty($language->article_group))
                    @include("admin.article._partials.{$language->article_group}")
                @else
                    <p style="font-size: .8rem;">No articles defined for {{ $language->short }}.</p>
                @endif

            @endif

        </div>
    </div>

@endsection
