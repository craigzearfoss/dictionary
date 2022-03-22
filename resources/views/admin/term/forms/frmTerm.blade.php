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
                    <a class="btn btn-sm btn-secondary btn-spanishdict"      target="_blank" href="https://www.spanishdict.com/translate/{{ urlencode($term->term) }}">SpanishDict</a>
                    <a class="btn btn-sm btn-secondary btn-google"           target="_blank" href="https://translate.google.com/?sl=en&tl=es&text={{ urlencode($term->term) }}&op=translate">Google</a>
                    <a class="btn btn-sm btn-secondary btn-cambridge"        target="_blank" href="https://dictionary.cambridge.org/dictionary/english/{{ urlencode($term->term) }}">Cambridge</a>
                    <a class="btn btn-sm btn-secondary btn-dictionarydotcom" target="_blank" href="https://www.dictionary.com/browse/{{ urlencode($term->term) }}">Dictionary</a>
                    <a class="btn btn-sm btn-secondary btn-collins"          target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ urlencode($term->en_uk) }}">Collins</a>
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
                    <button type="button" class="reset-translations btn-thword btn btn-sm btn-primary" title="Reset all translations" style="width: 4rem;">
                        Reset
                    </button>
                    <button type="button" class="fill-translations btn-thword btn btn-sm btn-primary" title="Fill / validate all translations" style="width: 4rem;">
                        Fill
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <h4>Translations</h4>
                </div>
                <div class="tab-content">

                    <ul class="nav nav-tabs" id="myTab">
                        @php
                            $i =0;
                        @endphp
                        @foreach ($languagesByRegion as $region=>$language)
                            <li class="nav-item">
                                <a id="{{ str_replace(' ', '-', strtolower($region)) }}"
                                   href="#content-{{ str_replace(' ', '-', strtolower($region)) }}"
                                   class="nav-link {{ 0 == $i++ ? 'active' : '' }}"
                                   data-bs-toggle="tab"
                                >{{ $region }}</a>
                            </li>
                        @endforeach
                    </ul>

                    @php
                        $i =0;
                    @endphp
                    @foreach (array_unique(array_keys($languagesByRegion)) as $region)

                        <div id="content-{{ str_replace(' ', '-', strtolower($region)) }}" class="tab-pane pt-2 fade {{ 0 == $i++ ? 'active show' : '' }}">
                            <div class="row double-col-form">
                                <div class="col">

                                    @foreach ($languagesByRegion[$region] as $language)
                                        <div id="{{ $language->code }}-container" class="translation-container pt-1" style="display: inline-block; width: 18rem; padding-right: 1rem; border-bottom: 1px solid #cccccc; vertical-align: top;">
                                            <label for="es" class="col-sm-3 pb-0 pt-0 col-form-label" title="{{ $language->full }}" style="width: 100%; margin-bottom:-4px;">
                                                <span style="float: left; {{ in_array($language->abbrev, ['en-uk', 'en-us']) ? ' margin-top: 0.7rem;' : '' }}">
                                                    {{ $language->short }}
                                                    <button
                                                        type="button"
                                                        class="add-translation btn-micro btn-add-translation"
                                                        data-language-code="{{ $language->code }}"
                                                        title="Add a translation"
                                                    >+</button>
                                                </span>
                                                <span style="float: right; {{ in_array($language->abbrev, ['en-uk', 'en-us']) ? 'margin-top: .5rem;' : '' }}">
                                                    @if (in_array(strtolower($language->short), [
                                                        'chinese', 'french', 'german', 'hindi', 'italian', 'japanese', 'korean', 'portuguese', 'spanish'
                                                    ]))
                                                        <a
                                                            class="btn-micro btn-collins"
                                                            target="collins-translate-{{ $language->code }}"
                                                            href="https://www.collinsdictionary.com/dictionary/english-{{ strtolower($language->short) }}/{{ urldecode($term->term) }}"
                                                            style="width: 1rem;"
                                                            title="Open {{ $language->short }} translation in collinsdictionary.com"
                                                        >C</a>
                                                    @endif
                                                    <a
                                                        class="btn-micro btn-google"
                                                        target="google-translate-{{ $language->code }}"
                                                        href="https://translate.google.com/?sl=en&tl={{ $language->code }}&text={{ urldecode($term->term) }}&op=translate"
                                                        style="width: 1rem;"
                                                        title="Open {{ $language->short }} translation in Google Translate"
                                                    >G</a>
                                                </span>
                                            </label>
                                            <div id="{{ $language->code }}-translation-inputs" class="col translation-inputs" style="min-height: 2rem;">

                                                @if (count($term->{$language->code}) == 0)

                                                    <div class="row" id="{{ $language->code }}-0-input-container">
                                                        <div class="col">
                                                            <input
                                                                type="text"
                                                                class="form-control language-translation"
                                                                name="{{ $language->code }}[]"
                                                                id="{{ $language->code }}_0"
                                                                data-language-code="{{ $language->code }}"
                                                                value=""
                                                            >
                                                            <button
                                                                type="button"
                                                                class="btn-micro btn-fill-translation"
                                                                onclick="fillTranslation('{{ $language->code }}_0');"
                                                                title="Fill / validate translation"
                                                            >F</button>
                                                        </div>
                                                    </div>

                                                @else

                                                    @foreach($term->{$language->code} as $index=>$translation)

                                                        <div class="row" id="{{ $language->code }}-{{ $translation->id }}-input-container">
                                                            <div class="col">
                                                                <input
                                                                    type="text"
                                                                    class="form-control language-translation"
                                                                    name="{{ $language->code }}[{{ $translation->id }}]"
                                                                    id="{{ $language->code }}_{{ $translation->id }}"
                                                                    data-language-code="{{ $language->code }}"
                                                                    value="{{ $translation->word }}"
                                                                >
                                                                <button
                                                                    type="button"
                                                                    class="btn-micro btn-fill-translation"
                                                                    onclick="fillTranslation('{{ $language->code }}_{{ $translation->id }}');"
                                                                    title="Fill / validate translation"
                                                                >F</button>
                                                                @if ($index > 0)
                                                                    <button
                                                                        type="button"
                                                                        class="btn-micro btn-micro btn-delete-translation"
                                                                        onclick="$('#{{ $language->code }}-{{ $translation->id }}-input-container').remove();"
                                                                        title="Remove translation"
                                                                    >x</button>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    @endforeach

                                                @endif

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
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
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.import') }}">Import Another Term</a>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create Another Term</a>
        </div>
    </div>

</form>
