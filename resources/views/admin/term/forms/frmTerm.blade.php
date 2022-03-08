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
                    <button type="button" id="reset-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Reset translations" style="width: 6rem;">
                        Reset
                    </button>
                    <button type="button" id="clear-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Clear all translations" style="width: 6rem;">
                        Clear
                    </button>
                    <button type="button" id="validate-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Validate translations" style="width: 6rem;">
                        Validate
                    </button>
                    <button type="button" id="fill-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Fill empty translations" style="width: 6rem;">
                        Fill
                    </button>
                    <button type="button" id="validate-and-fill-translations-btn" class="btn-thword btn btn-sm btn-primary" title="Validate & fill translations" style="width: 6rem;">
                        Validate & Fill
                    </button>
                </div>
            </div>

            <div class="row double-col-form">
                <div class="col-6">
                    <div class="row">
                        <label for="en_us" class="col-sm-3 col-form-label" title="American English">English-US</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="en_us" id="en_us" value="{{ $term->en_us }}">
                            <div class="row">
                                <label for="en_us" class="col-sm-3 col-form-label" title="American English pronunciation">Pron.</label>
                                <div class="col-sm-9 mt-1 mb-1">
                                    <input type="text" class="form-control float-right" name="pron_en_us" id="pron_en_us" value="{{ $term->pron_en_us }}" style="width: 8rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="en_uk" class="col-sm-3 col-form-label" title="British English">English-UK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="en_uk" id="en_uk" value="{{ $term->en_uk }}">
                            <div class="row">
                                <label for="en_us" class="col-sm-3 col-form-label" title="British English pronunciation">Pron.</label>
                                <div class="col-sm-9 mt-1 mb-1">
                                    <input type="text" class="form-control float-right" name="pron_en_uk" id="pron_en_uk" value="{{ $term->pron_en_uk }}" style="width: 8rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="ar" class="col-sm-3 col-form-label" title="Arabic">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'ar'])
                            Arabic
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ar" id="ar" value="{{ $term->ar }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="zh" class="col-sm-3 col-form-label" title="Chinese">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'zh'])
                            Chinese
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="zh" id="zh" value="{{ $term->zh }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="hr" class="col-sm-3 col-form-label" title="Croatian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'hr'])
                            Croatian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hr" id="hr" value="{{ $term->hr }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="cs" class="col-sm-3 col-form-label" title="Czech">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'cs'])
                            Czech
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="cs" id="cs" value="{{ $term->cs }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="da" class="col-sm-3 col-form-label" title="Danish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'da'])
                            Danish
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="da" id="da" value="{{ $term->da }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nl" class="col-sm-3 col-form-label" title="Dutch">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'nl'])
                            Dutch
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nl" id="nl" value="{{ $term->nl }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="fi" class="col-sm-3 col-form-label" title="Finnish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'fi'])
                            Finnish
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fi" id="fi" value="{{ $term->fi }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="fr" class="col-sm-3 col-form-label" title="French">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'fr'])
                            French
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fr" id="fr" value="{{ $term->fr }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="de" class="col-sm-3 col-form-label" title="German">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'de'])
                            German
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="de" id="de" value="{{ $term->de }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="el" class="col-sm-3 col-form-label" title="Greek">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'el'])
                            Greek
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="el" id="el" value="{{ $term->el }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="it" class="col-sm-3 col-form-label" title="Italian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'it'])
                            Italian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="it" id="it" value="{{ $term->it }}">
                        </div>
                    </div>

                </div>
                <div class="col-6">

                    <div class="row">
                        <label for="ja" class="col-sm-3 col-form-label" title="Japanese">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'ja'])
                            Japanese
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ja" id="ja" value="{{ $term->ja }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="ko" class="col-sm-3 col-form-label" title="Korean">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'ko'])
                            Korean
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ko" id="ko" value="{{ $term->ko }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="no" class="col-sm-3 col-form-label" title="Norwegian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'no'])
                            Norwegian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="no" id="no" value="{{ $term->no }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="pl" class="col-sm-3 col-form-label" title="Polish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'pl'])
                            Polish
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pl" id="pl" value="{{ $term->pl }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="pt_br" class="col-sm-3 col-form-label" title="Brazilian Portuguese">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'pt'])
                            Port-BR
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pt_br" id="pt_br" value="{{ $term->pt_br }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="pt_pt" class="col-sm-3 col-form-label" title="European Portuguese">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'pt'])
                            Port-PT
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pt_pt" id="pt_pt" value="{{ $term->pt_pt }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="ro" class="col-sm-3 col-form-label" title="Romanian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'ro'])
                            Romanian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ro" id="ro" value="{{ $term->ro }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="ru" class="col-sm-3 col-form-label" title="Russian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'ru'])
                            Russian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ru" id="ru" value="{{ $term->ru }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="es_es" class="col-sm-3 col-form-label" title="European Spanish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'es'])
                            Span-ES
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="es_es" id="es_es" value="{{ $term->es_es }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="es_la" class="col-sm-3 col-form-label" title="Latin American Spanish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'es'])
                            Span-LA
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="es_la" id="es_la" value="{{ $term->es_la }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="sv" class="col-sm-3 col-form-label" title="Swedish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'sv'])
                            Swedish
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sv" id="sv" value="{{ $term->sv }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="th" class="col-sm-3 col-form-label" title="Thai">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'th'])
                            Thai
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="th" id="th" value="{{ $term->th }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="tr" class="col-sm-3 col-form-label" title="Turkish">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'tr'])
                            Turkish
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tr" id="tr" value="{{ $term->tr }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="uk" class="col-sm-3 col-form-label" title="Ukrainian">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'uk'])
                            Ukrainian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="uk" id="uk" value="{{ $term->uk }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="vi" class="col-sm-3 col-form-label" title="Vietnamese">
                            @include('admin._partials.translation_micro_buttons', ['term' => $term->term, 'lang' => 'vi'])
                            Vietnamese
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="vi" id="vi" value="{{ $term->vi }}">
                        </div>
                    </div>

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
