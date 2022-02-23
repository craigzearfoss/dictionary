<!DOCTYPE html>
<html>
<head>
    <title>Thwords Dictionary</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/thwords_admin.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg pt-0">
    <div class="container-fluid hdr-primary">
        <a class="navbar-brand" href="/admin">Thwords</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{--
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dictionary
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/admin/search">Search</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.term.index') }}">Terms</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.term_todo.index') }}">Term To-dos</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.lang.index') }}">Languages</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.tag.index') }}">Tags</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.category.index') }}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.pos.index') }}">Parts of Speech</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.grade.index') }}">Grades</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.collins_tag.index') }}">Collins tags</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thwords
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.thword.index') }}">Thwords</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.tile_set.index') }}">Tile Sets</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Anti-Thwords
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thword Play
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Extras
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Scrambled Thwords</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.user.index') }}" id="navbarDropdown" role="button">
                        Users
                    </a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2 nav-search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn-secondary nav-search-btn" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>

<main id="main-container" class="container-fluid main">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const adminFn = {
            msgContainerId: "message-container",
            msgTypes: ["primary", "secondary", "success", "danger", "warning", "info", "light", "dark"],
            generateResponseMessage: (msg, errors) => {
                errors = errors || [];
                let errorArray = [];
                if (Array.isArray(errors)) {
                    errorArray = errors;
                } else {
                    let formElement = null;
                    $.each(errors, function(field, msg) {
                        console.log('field='+field, 'msg='+msg);
                        formElement = $(".admin-form").find(`input[name=${field}]`);
                        console.log(formElement);
                        if (formElement.length) {
                            formElement.after(`<label id="short-error" class="error" for="${field}">${msg}</label>`);
                        }
                    });
                }
                return msg
                    + (errors.length
                        ? "<ul><li>" + errorArray.join("</li><li>") + "</li></ul>"
                        : "");
            },
            showSuccessContainer: () => {
                if ($(".admin-form .success-container").length) {
                    $(".admin-form").find(".form-container").addClass("hidden");
                    $(".admin-form").find(".success-container").removeClass("hidden");
                }
            },
            showMessage: (type, msg, errors, scrollToMessage) => {
                if (type === "error") {
                    type = "danger";
                }
                //adminFn.clearMessages();
                let msgText = adminFn.generateResponseMessage(msg, errors);
                $("#"+adminFn.msgContainerId).prepend(`
<div class="container message-container alert alert-${type} alert-dismissible fade show p-2 mb-2" style="max-width: 60rem;">
    <div class="message-text">${msgText}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
`);
                if ((typeof scrollToMessage !== "undefined") && (parseInt(scrollToMessage) > 0)) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#"+adminFn.msgContainerId).offset().top
                    }, 100);
                }
            },
            clearMessages: () => {
                $("#"+adminFn.msgContainerId).html("");
            },
            generateSearchSortByOptions: () => {
                let currentSelectedValue = $(".search-form select[name=sort_by]").val();
                let options = "";
                $(".search-form .display-field:checked").each(function(index) {
                    let key = $(this).val()
                    let label = $(this).next("label").text();
                    let selected = (key == currentSelectedValue) ? "selected" : "";
                    options += `<option value="${key}" ${selected}>${label}</option>`
                });
                $(".search-form select[name=sort_by]").html(options);
            },
            doSearchAjax: (formId) => {
                let form = $(`#${formId}`);
                let searchButton = $(form).find(".action-search-btn");

                $(searchButton).text("Searching ...").prop("disabled", true);

                if (typeof searchResultScroller != "undefined") {

                    searchResultScroller.doSearch(formId);

                } else {

                    fetch($(form).attr("action"), {
                        body: new FormData(document.getElementById(formId)),
                        method: "post"
                    })
                        .then(response => response.json())
                        .then(json => {
                            console.log("Search response", json);
                            if ((typeof json.data !== "undefined") && (typeof json.current_page !== "undefined")) {

                                // get display fields
                                let displayFields = [];
                                $(`#${formId} input.display-field[type=checkbox]`).each(function () {
                                    if ($(this).prop("checked") == true) {
                                        displayFields[displayFields.length] = $(this).val()
                                    }
                                });

                                // create column headings
                                let cells = [];
                                $(`#${formId} input.display-field[type=checkbox]`).each(function () {
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

                                console.log('RESPONSE', json);

                                $("#search-results-table").find("tbody").html("");
                                if (typeof json.total != "undefined") {
                                    $("#search-result-message").text(json.total + ((parseInt(json.total) == 1) ? "result" : " results") + " found.")
                                } else {
                                    $("#search-result-message").text("fff");
                                }
                                for (let i = 0; i < json.data.length; i++) {
                                    cells = [];
                                    for (let j = 0; j < displayFields.length; j++) {
                                        if (json.data[i].hasOwnProperty(displayFields[j].toLowerCase())) {
                                            // is this a foreign key and is there a select list on the page with the values for the keys
                                            if (("_id" === displayFields[j].substring(displayFields[j].length - 3)) && $(`#${displayFields[j]}`).length) {
                                                cells[cells.length] = $(`#${displayFields[j]} option[value=${json.data[i][displayFields[j]]}]`).text().trim();
                                            } else {
                                                cells[cells.length] = json.data[i][displayFields[j].toLowerCase()];
                                            }
                                        } else {
                                            cells[cells.length] = "";
                                        }
                                    }
                                    cells[cells.length] = `<a class="btn btn-sm btn-primary" href="/admin/term/${json.data[i]['id']}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="/admin/term/${json.data[i]['id']}/edit">Edit</a>`;
                                    $("#search-results-table").find("tbody").append("<tr><td>" + cells.join("</td><td>") + "</td></tr>");
                                }

                            } else {
                                adminFn.showMessage(
                                    "danger",
                                    json.message || "Error occurred while performing search.",
                                    json.errors || []
                                )
                            }
                            $(searchButton).text("Search").prop("disabled", false);
                        })
                        .catch((err) => {
                            console.log('ERROR:', err);
                            if (err instanceof Array) {
                                adminFn.showMessage("error", err.message, []);
                            } else {
                                adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                            }
                            $(searchButton).text("Search").prop("disabled", false);
                        });
                }
            }
        };

        $(".nav-search-input").keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                let searchTerm = $(event.currentTarget).val().trim();
                window.location.href = "{{ route('admin.search.index') }}?field=term&text=" + encodeURIComponent(searchTerm);
            }
        });

        $(".nav-search-btn").click((event) => {
            let searchInput = $(event.currentTarget).siblings(".nav-search-input")[0];
            let searchTerm = $(searchInput).val().trim();
            window.location.href = "{{ route('admin.search.index') }}?field=term&text=" + encodeURIComponent(searchTerm);
        });

        $(".action-search-btn").click((event) => {
            event.preventDefault();
            adminFn.doSearchAjax("frmSearch");
        });

        $(".search-form .display-field").click((event) => {
            adminFn.generateSearchSortByOptions();
        });

        $(".admin-form").validate({
            rules: typeof validationRules !== "undefined" ? validationRules : {},
            messages: typeof validationMessages !== "undefined" ? validationMessages : {},
            submitHandler: function(form, event) {

                event.preventDefault();

                let button = $(form).find(".ajax-save-btn");
                let buttonLabel = button.text();

                $("#"+adminFn.msgContainerId).removeClass("show");
                let msgHtml = "";
                button.text("Saving ...").prop("disabled", true);

                fetch(form.getAttribute("action"), {
                    body: new FormData(form),
                    method: "post"
                })
                    .then(response => response.json())
                    .then(json => {
                        console.log("Save response", json)
                        if (parseInt(json.success) > 0) {
                            adminFn.showMessage("success", json.message || "Successfully saved.", json.errors);
                            adminFn.showSuccessContainer();
                        } else {
                            if ((typeof json.duplicates == "object") && (json.duplicates.length > 0)) {
                                let dupes = [];
                                for (const key in json.duplicates) {
                                    if (json.duplicates.hasOwnProperty(key)) {
                                        const editUrl = form.getAttribute("action").replace("/api/v1/", "/admin/") + "/edit";
                                        dupes[dupes.length] = `<a href="${editUrl}" target="_blank">Show Dupe</a>`;
                                    }
                                }
                                adminFn.showMessage("error", "Duplicate " + ((json.duplicates > 1) ? "records" : "record")
                                    + " found.", dupes);
                            } else {
                                adminFn.showMessage("error", json.message || "Error occurred while saving.", json.errors);
                            }
                        }
                        button.text(buttonLabel).prop("disabled", false);
                    })
                    .catch((err) => {
                        console.log('ERROR:', err);
                        if (err instanceof Array) {
                            adminFn.showMessage("error", err.message, []);
                        } else {
                            adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                        }
                        button.text(buttonLabel).prop("disabled", false);
                    });
            }
        });

        $(".action-delete-btn").click((event) => {
            event.preventDefault();

            $("#"+adminFn.msgContainerId).removeClass("show");

            if (!confirm("Are you sure you want to delete this record?")) {
                return false;
            }

            let button = event.currentTarget;
            let form = $(button).parents("form:first");

            $(button).text("Delete").prop("disabled", true);
            fetch($(form).attr("action"), {
                body: new FormData(document.getElementById($(form).attr("id"))),
                method: "post"
            })
                .then(response => response.json())
                .then(json => {
                    console.log("Save response", json)
                    if (parseInt(json.success) > 0) {
                        adminFn.showMessage("success", json.message || "Successfully deleted.", json.errors, true);
                        $(button).closest("tr").remove();
                    } else {
                        adminFn.showMessage("error", json.message || "Error occurred while deleting.", json.errors, true);
                    }
                    $(button).text("Delete").prop("disabled", false);
                })
                .catch((err) => {
                    console.log('ERROR:', err);
                    if (err instanceof Array) {
                        adminFn.showMessage("error", err.message, []);
                    } else {
                        adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                    }
                    $(button).text("Delete").prop("disabled", false);
                });
        });

        $(".form-activate").click((event) => {
            let form = event.currentTarget;
            fetch($(form).attr("action"), {
                body: new FormData(document.getElementById($(form).attr("id"))),
                method: "post"
            })
                .then(response => response.json())
                .then(json => {
                    console.log("Save response", json)
                    if (parseInt(json.success) > 0) {
                        adminFn.showMessage("success", json.message || "Successfully deleted.", json.errors, true);
                    } else {
                        adminFn.showMessage("error", json.message || "Error occurred while deleting.", json.errors, true);
                    }
                })
                .catch((err) => {
                    console.log('ERROR:', err);
                    if (err instanceof Array) {
                        adminFn.showMessage("error", err.message, []);
                    } else {
                        adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                    }
                });
        });

        if ($("#frmSearch").length) {
            if ($("#frmSearch").find("#field_0_value").val().trim().length > 0) {
                adminFn.doSearchAjax("frmSearch");
            }
        }

        adminFn.generateSearchSortByOptions();

    });

</script>


</body>
</html>
