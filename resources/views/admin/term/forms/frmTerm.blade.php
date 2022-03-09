<form id="frmTerm" class="admin-form pt-1" action="{{ $action }}" method="{{ $method }}">
    @csrf
    @if ($method == 'put')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            @include('_partials.message-container')
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            <div class="row mb-1">
                <div class="col text-end m-0 p-0">
                    <a class="btn btn-sm btn-secondary btn-spanishdict"      target="_blank" href="https://www.spanishdict.com/translate/{{ $term->term }}">SpanishDict</a>
                    <a class="btn btn-sm btn-secondary btn-google"           target="_blank" href="https://translate.google.com/?sl=en&tl=es&text={{ $term->term }}&op=translate">Google</a>
                    <a class="btn btn-sm btn-secondary btn-cambridge"        target="_blank" href="https://dictionary.cambridge.org/dictionary/english/{{ $term->term }}">Cambridge</a>
                    <a class="btn btn-sm btn-secondary btn-dictionarydotcom" target="_blank" href="https://www.dictionary.com/browse/{{ $term->term }}">Dictionary</a>
                    <a class="btn btn-sm btn-secondary btn-collins"          target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $term->en_uk }}">Collins</a>
                </div>
            </div>

            <div class="row">
                <label for="term" class="col-sm-2 col-form-label">Term</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="term" id="term" value="{{ $term->term }}">
                </div>
            </div>
            <div class="row">
                <label for="definition" class="col-sm-2 col-form-label">Definition</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="definition" id="definition" rows="2">{{ $term->definition }}</textarea>
                </div>
            </div>
            <div class="row mb-2">
                <label for="sentence" class="col-sm-2 col-form-label">Sentence</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="sentence" id="sentence" rows="2">{{ $term->sentence }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="pos_id" class="col-sm-2 col-form-label">Part of Speech</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pos_id" id="pos_id" style="width: 7rem;">
                            @foreach ($partsOfSpeech as $key => $partOfSpeech)
                                <option value="{{ $key }}" {{ ( $method == 'put' && $key == $term->pos->id) ? 'selected' : '' }}>
                                    {{ $partOfSpeech }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_id" id="category_id" style="width: 7rem;">
                            @foreach ($categories as $key => $category)
                                <option value="{{ $key }}" {{ ( $method == 'put' && $key == $term->category->id) ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <label for="grade_id" class="col-sm-2 col-form-label">Grade</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="grade_id" id="grade_id" style="width: 7rem;">
                            @foreach ($grades as $key => $grade)
                                <option value="{{ $key }}" {{ ( $method == 'put' && $key == $term->grade->id) ? 'selected' : '' }}>
                                    {{ $grade }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col text-end">
                    <button type="button" id="reset-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Reset translations" style="width: 4rem;">
                        Reset
                    </button>
                    <button type="button" id="clear-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Clear all translations" style="width: 4rem;">
                        Clear
                    </button>
                    <button type="button" id="validate-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Validate translations" style="width: 4rem;">
                        Validate
                    </button>
                    <button type="button" id="fill-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Fill empty translations" style="width: 4rem;">
                        Fill
                    </button>
                    <button type="button" id="validate-and-fill-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Validate & fill translations" style="width: 6rem;">
                        Validate & Fill
                    </button>
                </div>
            </div>

            <div class="row double-col-form">
                <div class="col">
                    @foreach ($langs as $lang)
                        <div class="pt-1" style="display: inline-block; max-width: 18rem; padding-right: 2rem;">
                            <label for="{{ str_replace('-', '_', $lang->abbrev) }}" class="col-sm-3 pb-0 pt-0 col-form-label" title="{{ $lang->full }}" style="width: 100%; margin-bottom:-4px;">
                                <span style="float: left; {{ in_array($lang->abbrev, ['en-uk', 'en-us']) ? ' margin-top: 0.7rem;' : '' }}">
                                    {{ $lang->short }}
                                </span>
                                <span style="float: right; {{ in_array($lang->abbrev, ['en-uk', 'en-us']) ? 'margin-top: .5rem;' : '' }}">
                                    @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => $lang->code])
                                </span>
                                @if (in_array($lang->abbrev, ['en-uk', 'en-us']))
                                    <span style="float: right;">
                                        <input type="text" class="form-control float-right" name="pron_{{ str_replace('-', '_', $lang->abbrev) }}" id="pron_{{ str_replace('-', '_', $lang->abbrev) }}" value="{{ $term->pron_en_us }}" style="width: 8rem;">
                                    </span>
                                @endif
                            </label>
                            <div class="col-sm-9">
                                @php
                                    $collinsTag = str_replace('-', '_', $lang->abbrev);
                                @endphp
                                <input type="text" class="form-control" name="{{ $collinsTag }}" id="{{ $collinsTag }}" value="{{ $term->{$collinsTag} }}" style="width: 16rem;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row p-2">
                <div class="form-check form-switch">
                    <input type="hidden" role="switch" name="active" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" name="active" id="active" value="1"
                        {{ $method === 'post' || $term->active ? 'checked' : '' }}
                    >
                    <label class="form-check-label form-label" for="active">Active</label>
                </div>
            </div>

            <hr class="m-0 mb-2">

            <div class="row mb-2">
                <label for="collins_tag" class="col-sm-2 col-form-label">Collins Tag</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="collins_tag" id="collins_tag" value="{{ $term->collins_tag }}" style="width: 12rem;">
                </div>
            </div>

            <div class="row mb-2">
                <label for="collins_def" class="col-sm-2 col-form-label">Collins Def.</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="collins_def" id="collins_def" rows="2">{{ $term->collins_def }}</textarea>
                </div>
            </div>

            <hr class="m-0 mb-2">

            <div class="row mb-2">
                <label for="pos_text" class="col-sm-2 col-form-label">pos_text</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pos_text" id="pos_text" value="{{ $term->pos_text }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}" style="width: 5rem;">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
            @if ($method == 'put')
                <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.term.edit', $term->id) }}">Re-Edit</a>
            @else
                <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.term.edit', '##') }}">Re-Edit</a>
            @endif
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create Another Term</a>
        </div>
    </div>

</form>
