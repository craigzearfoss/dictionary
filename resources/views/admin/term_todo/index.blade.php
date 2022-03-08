@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Term To-dos</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term_todo.create') }}">Create a New Term To-do</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 50rem;">

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

            <div class="row admin-form p-0 mb-2" style="border-width: 0!important;">
                <div class="col pl-0">
                    <label for="filter" class="col-sm-2 col-form-label pb-0">Filter</label>
                    <select class="form-control" name="filter" id="filter" style="width: 12rem;">
                        @foreach ($filters as $key => $value)
                            <option value="{{ $key }}" {{ ($filter == $key) ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.term_todo.index') }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="{{ $filter }}">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>
                    <span class="result-count {{ !$data->total() ? 'no-results-found' : '' }}">
                        {{ $data->total() == 1 ? "{$data->total()} result found." : "{$data->total()} results found." }}
                    </span>

                    @if ($data->count() > 0)

                        <table id="term-todo-table" class="admin-table table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Term</th>
                                <th class="text-center">Processed</th>
                                <th class="text-center">Skipped</th>
                                <th class="text-center">Verified</th>
                                <th class="text-center">Mark As</th>
                                <th class="text-center" style="width: 10rem;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $value)
                                <tr data-id="{{ $value->id }}" {{ !$value->active ? 'class="inactive-row"' : '' }}>
                                    <td class="align-middle">{{ $value->term }}</td>
                                    <td class="align-middle text-center"><strong>{{ $value->processed ? 'X' :'' }}</strong></td>
                                    <td class="align-middle text-center"><strong>{{ $value->skipped ? 'X' :'' }}</strong></td>
                                    <td class="align-middle text-center"><strong>{{ $value->verified ? 'X' :'' }}</strong></td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="action-mark-as-processed-btn btn btn-sm btn-primary" title="Mark as processed" style="width: 3.6rem;">Process</button>
                                        <button type="button" class="action-mark-as-skipped-btn btn btn-sm btn-primary" title="Mark as skipped" style="width: 2.4rem;">Skip</button>
                                        <button type="button" class="action-mark-as-verified-btn btn btn-sm btn-primary" title="Mark as verified" style="width: 3.6rem;">Verify</button>
                                    </td>
                                    <td class="actions-cell">
                                        <form id="frmDelete" action="{{ route('api.v1.term_todo.destroy', $value->id) }}" method="post">
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.show', $value->id) }}">Show</a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.edit', $value->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-primary" target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $value->term }}">Collins</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-delete-btn btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {!! $data->links() !!}
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function(event) {

            $("#filter").change((event) => {
                const filter = $(event.currentTarget).val();
                window.location.href = `{{ route('admin.term_todo.index') }}?filter=${filter}`;
            });

            $(".action-mark-as-processed-btn ").click((event) => {
                const button = event.currentTarget;
                const row = $(button).closest("tr");
                const id = $(row).attr("data-id");
                $(button).text("...").prop("disabled", true);
                fetch(`/api/v1/term-todo/${id}process`, { method: "get"})
                    .then(response => response.json())
                    .then(json => {
                        console.log("Mark as processed response", json)
                        if (parseInt(json.success) > 0) {
                            adminFn.showMessage("success", json.message || "Successfully marked as processed.", json.errors, true);
                            if ([3, 4].include($("#filter").val())) {
                                $(row).remove();
                            } else {
                                $(row).find("td:nth-child(2)").html("<strong>X</strong>");
                            }
                        } else {
                            adminFn.showMessage("error", json.message || "Error occurred while marking as processed.", json.errors, true);
                        }
                        $(button).text("Process").prop("disabled", false);
                    })
                    .catch((err) => {
                        console.log('ERROR:', err);
                        if (err instanceof Array) {
                            adminFn.showMessage("error", err.message, []);
                        } else {
                            adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                        }
                        $(button).text("Process").prop("disabled", false);
                    });
            });

            $(".action-mark-as-skipped-btn ").click((event) => {
                const button = event.currentTarget;
                const row = $(button).closest("tr");
                const id = $(row).attr("data-id");
                $(button).text("...").prop("disabled", true);
                fetch(`/api/v1/term-todo/${id}/skip`, { method: "get"})
                    .then(response => response.json())
                    .then(json => {
                        console.log("Mark as skipped response", json)
                        if (parseInt(json.success) > 0) {
                            adminFn.showMessage("success", json.message || "Successfully marked as skipped.", json.errors, true);
                            if ([3, 4].include($("#filter").val())) {
                                $(row).remove();
                            } else {
                                $(row).find("td:nth-child(2)").html("<strong>X</strong>");
                            }
                        } else {
                            adminFn.showMessage("error", json.message || "Error occurred while marking as skipped.", json.errors, true);
                        }
                        $(button).text("Skip").prop("disabled", false);
                    })
                    .catch((err) => {
                        console.log('ERROR:', err);
                        if (err instanceof Array) {
                            adminFn.showMessage("error", err.message, []);
                        } else {
                            adminFn.showMessage("error", "Invalid HTTP Response.", [err]);
                        }
                        $(button).text("Skip").prop("disabled", false);
                    });
            });

            $("#action-mark-as-verified-btn ").click((event) => {

            });
        });
    </script>

@endsection
