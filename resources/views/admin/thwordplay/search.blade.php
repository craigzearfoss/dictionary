@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Search</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.thwordplay.create') }}">Create a New Thwordplay</a>
        </div>
    </div>

    <div class="row m-2">
        <div class="container">

            <form id="frmSearch" class="admin-form search-form pt-1 pb-2" action="{{ route('api.v1.thwordplay.search') }}" method="post">

                <div class="row">

                    <div class="col-auto pb-2">
                        <label for="query" class="col-sm-2 col-form-label">Search Text</label>
                        <input type="text" class="form-control" name="query" id="query" value="{{ $query }}" placeholder="Search Text" style="width: 10rem;">
                    </div>

                    <div class="col-auto pb-2">
                        <label for="field" class="col-sm-2 col-form-label">Field</label>
                        <select class="form-control" name="field" id="field" style="width: 7rem;">
                            @foreach ($searchFields as $key => $value)
                                <option value="{{ $key }}" {{ ($field == $value) ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-auto">
                        <div class="card">
                            <div class="card-header p-1" style="font-weight: 700; background-color: #fff;">
                                Columns to Display
                            </div>
                            <div class="card-body p-2 pl-3">
                                <div class="row">

                                    <div class="col-auto">
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_subject" name="dfield[]" value="subject" {{ in_array('subject', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_subject" class="form-check-label">Subject</label>
                                        </div>
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_title" name="dfield[title]" value="title" {{ in_array('title', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_title"" class="form-check-label">Title</label>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_prompt" name="dfield[]" value="prompt" {{ in_array('prompt', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_prompt" class="form-check-label">Prompt</label>
                                        </div>
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_prompt2" name="dfield[]" value="prompt2" {{ in_array('prompt2', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_prompt2" class="form-check-label">Prompt 2</label>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_description" name="dfield[" value="description" {{ in_array('description', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_description" class="form-check-label">Description</label>
                                        </div>
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_synonyms" name="dfield[]" value="synonyms" {{ in_array('synonyms', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_synonyms" class="form-check-label">Synonyms</label>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_terms" name="dfield[]" value="terms" {{ in_array('terms', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_terms" class="form-check-label">Terms</label>
                                        </div>
                                        <div class="form-check inline">
                                            <input class="display-field form-check-input" type="checkbox" id="dspfld_bonuses" name="dfield[]" value="bonuses" {{ in_array('bonuses', $dfields) ? 'checked' : '' }}>
                                            <label for=dspfld_bonuses" class="form-check-label">Bonuses</label>
                                        </div>
                                    </div>

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
                cells[cells.length] = `<a class="btn btn-sm btn-primary" href="/admin/thwordplay/${data[i]['id']}">Show</a>
                                <a class="btn btn-sm btn-primary" href="/admin/thwordplay/${data[i]['id']}/edit">Edit</a>`;
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
