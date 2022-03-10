@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Search</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.create') }}">Create a New Term</a>
        </div>
    </div>

    <div class="row m-2">
        <div class="container">

            <form id="frmSearch" class="admin-form search-form pt-1 pb-2" action="{{ route('api.v1.search.index') }}" method="post">

                <div class="row">

                    <div class="col-8">

                        <div class="row">

                            <div class="col-auto">
                                <label for="field_0_value" class="col-sm-2 col-form-label">Search Text</label>
                                <input type="text" class="form-control" name="field[0][value]" id="field_0_value" value="{{ $searchText}}" placeholder="Search Text" style="width: 10rem;">
                            </div>

                            <div class="col-auto">
                                <label for="field_0_name" class="col-sm-2 col-form-label">Field</label>
                                <select class="form-control" name="field[0][name]" id="field_0_name" style="width: 7rem;">
                                    @foreach ($searchFields as $key => $value)
                                        <option value="{{ $key }}" {{ ($searchField == $value) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="pos_id" class="col-sm-2 col-form-label">Part of Speech</label>
                                <select class="form-control" name="pos_id" id="pos_id" style="width: 7rem;">
                                    @foreach ($partsOfSpeech as $key => $value)
                                        <option value="{{ $key }}" {{ ($posId == $value) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <select class="form-control" name="category_id" id="category_id" style="width: 7rem;">
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}" {{ ($value == $categoryId) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="grade_id" class="col-sm-2 col-form-label">Grade</label>
                                <select class="form-control" name="grade_id" id="grade_id" style="width: 7rem;">
                                    @foreach ($grades as $key => $value)
                                        <option value="{{ $key }}" {{ ($key == $gradeId) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="col-4">

                        <div class="row">
                            <div class="col-auto">
                                <label for="sort_field" class="col-sm-2 col-form-label">Sort by</label>
                                <select class="form-control" name="sort[field]" id="sort_field">
                                    <option value="term">Term</option>
                                    <option value="definition">Definition</option>
                                    <option value="pos_id">Part of Speech</option>
                                    <option value="category_id">Category</option>
                                    <option value="grade_id">Grade</option>
                                    @foreach ($langsByAbbrev as $abbrev => $short)
                                        <option value="{{ $abbrev }}">{{ $short }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto">
                                <label for="sort_dir" class="col-sm-2 col-form-label">Direction </label>
                                <select class="form-control" name="sort[dir]" id="sort_dir">
                                    <option value="asc">ascending</option>
                                    <option value="desc">descending</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">

                    <div class="card mt-2 ml-0 p-0">
                        <div class="card-body p-2">
                            <strong>Fields to Display</strong>
                            <hr class="m-0">
                            <div class="row mt-1">

                                <div class="col-auto">

                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_term" name="dfield[]" value="term" {{ in_array('term', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_term" class="form-check-label">Term</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_definition" name="dfield[]" value="definition" {{ in_array('definition', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_definition" class="form-check-label">Definition</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_sentence" name="dfield[]" value="sentence" {{ in_array('sentence', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_sentence" class="form-check-label">Sentence</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_pos_id" name="dfield[]" value="pos_id" {{ in_array('pos', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_pos_id" class="form-check-label">Part of Speech</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_category_id" name="dfield[]" value="category_id" {{ in_array('category', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_category_id" class="form-check-label">Category</label>
                                    </div>
                                    <div class="form-check inline" style="width: 8rem;">
                                        <input class="display-field form-check-input" type="checkbox" id="dspfld_grade_id" name="dfield[]" value="grade_id" {{ in_array('grade', $dfields) ? 'checked' : '' }}>
                                        <label for=dspfld_grade_id" class="form-check-label">Grade</label>
                                    </div>

                                </div>
                                <div class="col-auto">
                                    @php
                                        $i = -1
                                    @endphp
                                    @foreach ($langsByAbbrev as $abbrev => $short)
                                        @php
                                            $i++
                                        @endphp

                                        @if ( $i % 5 == 0 && $i !== 0)
                                            </div>
                                            <div class="col-auto">
                                        @endif

                                        <div class="form-check inline" style="width: 8rem;">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_collins_{{ Str::replace('-','_', $abbrev) }}" name="dfield[]" value="collins_{{ Str::replace('-','_', $abbrev) }}" {{ in_array($abbrev, $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_collins_{{ Str::replace('-','_', $abbrev) }}" class="form-check-label">{{ $short }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col text-end">

                        <button class="action-search-btn btn btn-sm btn-primary" type="submit" style="width: 6rem;">Search</button>

                    </div>
                </div>

            </form>

        </div>
    </div>

    <div class="row">
        <div class="col">

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

        </div>
    </div>

    <div class="row">
        <div class="col">
            <div id="search-result-message"></div>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="row">
                <div id="search-results-container" class="col">

                    <table id="search-results-table" class="search-results admin-table table table-striped table-bordered table-hover">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="pagination col-12 text-center">

                </div>
            </div>

        </div>
    </div>

@endsection

<script type="text/javascript">

    const searchResultScroller = {

        formId: null,

        objectInitialized: false,
        searchInitialized: false,
        busy: false,

        currentPage: 0,
        paginator: {},
        limit: 25,
        total: 0,
        to: 0,

        displayFields: [],

        initiallzeSearch: (formId) => {
            searchResultScroller.formId = formId;
            searchResultScroller.searchInitialized = false;
            searchResultScroller.busy = false;
            searchResultScroller.paginator = {};
            searchResultScroller.currentPage = 0;
            searchResultScroller.total = 0;
            searchResultScroller.to = 0;
            $("#search-results-table").find("tbody").html("");
            searchResultScroller.getDisplayFields();
            searchResultScroller.drawColumnHeaders();
            searchResultScroller.getNextPage();
        },
        getDisplayFields: () => {
            searchResultScroller.displayFields = [];
            $(`#${searchResultScroller.formId} input.display-field[type=checkbox]`).each(function () {
                if ($(this).prop("checked") == true) {
                    searchResultScroller.displayFields[searchResultScroller.displayFields.length] = $(this).val()
                }
            });
        },
        drawColumnHeaders: () => {
            let cells = [];
            $(`#${searchResultScroller.formId} input.display-field[type=checkbox]`).each(function () {
                if ($(this).prop("checked") == true) {
                    let field = $(this).val();
                    if ($.inArray(field, ["pos_id", "category_id", "grade_id"])) {
                        field = field.replace("_", "-");
                    }
                    cells[cells.length] = `<th class="col-header" data-field="${field}">`
                        + $(this).next("label").text()
                        + "</th>";
                }
            });
            cells[cells.length] = `<th style="width: 7rem;">Actions</th>`;
            $("#search-results-table").find("thead").html("<tr>" + cells.join() + "</tr>");

            $("#search-results-table .col-header").click((event) => {
                let field = $(event.currentTarget).attr("data-field");
                if (field == $("#sort_field").val()) {
                    // same field so just change direction
                    if ("asc" == $("#sort_dir").val()) {
                        $("#sort_dir").val("desc");
                    } else {
                        $("#sort_dir").val("asc");
                    }
                } else {
                    // change field
                    $("#sort_field").val(field);
                }
                adminFn.doSearchAjax("frmSearch");
            });
        },
        getNextPage: () => {
            if (searchResultScroller.loadMoreCheck()) {
                searchResultScroller.currentPage++;
                searchResultScroller.fetchPage();
            }
        },
        fetchPage: () => {

            let action = $(`#${searchResultScroller.formId}`).attr("action")
            if (searchResultScroller.currentPage > 1) {
                action = action + `?page=${searchResultScroller.currentPage}`
            }

            if (!searchResultScroller.searchInitialized) {
                $(`#${searchResultScroller.formId}`).find(".action-search-btn").text("Searching ...").prop("disabled", true);
                searchResultScroller.searchInitialized = true;
            } else if ($(`#${searchResultScroller.formId} tbody tr`).length >= searchResultScroller.total) {
                // we are at the end of the results
                return;
            }

            searchResultScroller.busy = true;
            fetch(action, {
                    body: new FormData(document.getElementById(searchResultScroller.formId)),
                    method: "post"
                })
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    console.log('page:', json);

                    searchResultScroller.busy = false;
                    $(`#${searchResultScroller.formId}`).find(".action-search-btn").text("Search").prop("disabled", false);

                    searchResultScroller.total = json.total;
                    searchResultScroller.to = json.to;
                    searchResultScroller.paginator = json;
                    searchResultScroller.processPage(json.data);
                })
                .catch((err) => {
                    console.log('ERROR:', err);
                    if (err instanceof Array) {
                        adminFn.showMessage("error", err.message, []);
                    } else {
                        adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                    }
                    $(`#${searchResultScroller.formId}`).find(".action-search-btn").text("Search").prop("disabled", false);
                });
            ;
        },
        processPage: (data) => {
            if (typeof searchResultScroller.paginator.total != "undefined") {
                $("#search-result-message").text(
                    searchResultScroller.paginator.total + ((parseInt(searchResultScroller.paginator.total) == 1)
                        ? "result"
                        : " results")
                    + " found."
                );
            } else {
                $("#search-result-message").text("fff");
            }
            for (let i = 0; i < data.length; i++) {
                cells = [];
                for (let j = 0; j < searchResultScroller.displayFields.length; j++) {
                    if (data[i].hasOwnProperty(searchResultScroller.displayFields[j].toLowerCase())) {
                        // is this a foreign key and is there a select list on the page with the values for the keys
                        if (("_id" === searchResultScroller.displayFields[j].substring(searchResultScroller.displayFields[j].length - 3))
                            && $(`#${searchResultScroller.displayFields[j]}`).length
                        ) {
                            cells[cells.length] = $(`#${searchResultScroller.displayFields[j]} option[value=${data[i][searchResultScroller.displayFields[j]]}]`).text().trim();
                        } else {
                            cells[cells.length] = data[i][searchResultScroller.displayFields[j].toLowerCase()];
                        }
                    } else {
                        cells[cells.length] = "";
                    }
                }
                cells[cells.length] = `<a class="btn btn-sm btn-primary" href="/admin/term/${data[i]['id']}">Show</a>
                                <a class="btn btn-sm btn-primary" href="/admin/term/${data[i]['id']}/edit">Edit</a>`;
                $("#search-results-table tbody").append("<tr><td>" + cells.join("</td><td>") + "</td></tr>");
            }
        },
        loadMoreCheck: () => {
            if (searchResultScroller.busy) {
                return false;
            }
            if (searchResultScroller.to > searchResultScroller.total) {
                return false;
            }

            const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
            const rect = document.getElementById("main-container").getBoundingClientRect();
            //console.log(`scrollTop: ${scrollTop}, scrollHeight: ${scrollHeight}, clientHeight: ${clientHeight}`)
            console.log('CLIENT: ' + (scrollTop + clientHeight) + ', UL: ' + (rect.height + rect.y), `scrollTop: ${scrollTop}, scrollHeight: ${scrollHeight}, clientHeight: ${clientHeight}`)
            if ((scrollTop + clientHeight) >= (rect.height + rect.y + 100)) {
                return true;
            } else {
                return false;
            }
        },
        doSearch: (formId) => {

            if (!searchResultScroller.objectInitialized) {

                window.addEventListener("scroll", () => {
                    searchResultScroller.getNextPage();
                }, {
                    passive: true
                });

                window.addEventListener("resize", () => {
                    searchResultScroller.getNextPage();
                }, {
                    passive: true
                });

                searchResultScroller.objectInitialized = true;
            }

            searchResultScroller.initiallzeSearch(formId);
        }
    };

</script>
