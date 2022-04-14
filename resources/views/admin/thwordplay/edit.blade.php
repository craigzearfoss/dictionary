@extends('admin._layouts.main')

@section('content')

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content p-2 pt-0" style="max-width: 30rem;">

            <form name="frmMyModal" id="frmMyModal" action="" method="post">

                <div class="row">
                    <div class="col-10 align-bottom">
                        <p class="m-0 mt-4" style="font-size: 0.8rem;">One set of Answers per line</p>
                    </div>
                    <div class="col-2 text-end">
                        <span class="close-x-btn close-modal">&times;</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="cut_and_paste_input" class="form-label mb-0" style="width: 100%;">
                                <div class="row">
                                    <div class="col-8">

                                        <p class="m-0" style="font-size: 0.7rem;">Separate answers within a line by a tilde, ~.</p>
                                        <p class="m-0" style="font-size: 0.7rem;">Maximum of three answers per row.</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <button type="button" name="clear_cut_and_paste_input" class="clear_cut_and_paste_input btn-thword btn btn-sm btn-primary">Clear</button>
                                    </div>
                                </div>
                            </label>
                            <textarea class="form-control" name="cut_and_paste_input" id="cut_and_paste_input" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="button" class="close-modal btn-thword btn btn-sm btn-primary">Cancel</button>
                        <button type="button" class="append-answer-rows btn-thword btn btn-sm btn-primary">Append to Answers</button>
                        <button type="button" class="replace-answer-rows btn-thword btn btn-sm btn-primary">Replace Answers</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} Thword Play</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.thwordplay.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            <form id="frmThwordplay" class="admin-form" action="{{ $action }}" method="{{ $method }}">
                @csrf
                @if ($method == 'put')
                    @method('PUT')
                @endif
                <input type="hidden" name="antonymns" value="">

                <div class="row">
                    <div class="col">
                        @include('_partials.message-container')
                    </div>
                </div>

                <div class="row">
                    <div class="container form-container" style="max-width: 40rem;">

                        <div class="row">
                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" value="{{ $thwordplay->subject }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="subject" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" value="{{ $thwordplay->title }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" rows="2">{{ $thwordplay->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label for="language_id" class="col-sm-2 col-form-label">Language</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="language_id" id="language_id" style="width: 12rem;">
                                    @foreach ($languages as $key => $language)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thwordplay->language->id) ? 'selected' : '' }}>
                                            {{ $language }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="category_id" style="width: 12rem;">
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thwordplay->category->id) ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="grade_id" class="col-sm-2 col-form-label">Grade</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="grade_id" id="grade_id" style="width: 12rem;">
                                    @foreach ($grades as $key => $grade)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thwordplay->grade->id) ? 'selected' : '' }}>
                                            {{ $grade }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="answers" class="col-sm-2 col-form-label">
                                Answers
                                <br>
                                <button type="button" class="open-modal-btn btn btn-micro btn-primary p-1 mt-2">Import Answers</button>
                                <br>
                                <button type="button" class="clear-answers-table btn btn-micro btn-primary p-1 mt-2">Clear Answers</button>
                            </label>
                            <div class="col-sm-10">
                                <div class="text-end" style="width: 100%;">
                                    <button type="button" class="add-answer-row-btn btn btn-micro btn-primary p-1 m-0">Add Answer</button>
                                </div>
                                <table id="answers-table" class="mb-3" style="width: 100%; margin-top: -1rem;">
                                    <thead>
                                    <tr>
                                        <th style="width: 40%;">Thword</th>
                                        <th style="width: 30%;">Bonus 1</th>
                                        <th style="width: 30%;">Bonus 2</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <label for="bonus_matches" class="col-sm-2 col-form-label">Bonuses</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <label for="bonus1" class="col-sm-2 col-form-label">Question 1</label>
                                    <div class="col-sm-10">
                                        @if ($method == 'put')
                                            <input type="text" class="form-control" name="bonus_question1" id="bonus_question1" value="{{ $thwordplay->getBonusQuestions()[0] }}">
                                        @else
                                            <input type="text" class="form-control" name="bonus_question1" id="bonus_question1" value="">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="bonus2" class="col-sm-2 col-form-label">Question 2</label>
                                    <div class="col-sm-10">
                                        @if ($method == 'put')
                                            <input type="text" class="form-control" name="bonus_question2" id="bonus_question2" value="{{ $thwordplay->getBonusQuestions()[1] }}">
                                        @else
                                            <input type="text" class="form-control" name="bonus_question2" id="bonus_question2" value="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.index') }}" style="width: 5rem;">Cancel</a>
                                <button type="button" class="btn btn-sm btn-primary ajax-verify-before-save-btn" style="width: 5rem;">Save</button>
                                <button type="submit" id="save-thword-play" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem; display: none;">Final Save</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.index') }}">Back</a>
                        @if ($method == 'put')
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.edit', $thwordplay->id) }}">Re-Edit</a>
                        @else
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.edit', '##') }}">Re-Edit</a>
                        @endif
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thwordplay.create') }}">Create Another Thwordplay Play</a>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script type="text/javascript">

        const validationRules = {
            subject: {
                required: true,
                maxlength: 100
            },
            title: {
                required: false,
                maxlength: 255
            },
            description: {
                required: false,
                maxlength: 255
            },
            language_id: {
            },
            category_id: {
            },
            grade_id: {
                required: true
            },
            terms: {
            },
            active: {
            }
        };

        const validationMessages = {
            term: {
                required: "Please enter the subject.",
                maxlength: "Subject can be no longer than 50 characters."
            },
            title: {
                maxlength: "Title can be no longer than 255 characters."
            },
            description: {
                maxlength: "Description can be no longer than 255 characters."
            },
            language_id: {
            },
            category_id: {
            },
            grade_id: {
            },
            terms: {
            },
            active: {
            }
        };

        @if ($method == 'put')
            const thwords = {!! json_encode($thwordplay->getThwords(), true) !!};
        @else
            const thwords = [];
        @endif

        function clearAnswerRows() {
            $("#answers-table tbody").html("");
        }

        function appendAnswerRow(thword, bonus1, bonus2) {
            $("#answers-table tbody").append(createAnswerRow([thword, bonus1, bonus2]));
        }

        function createAnswerRow(data) {

            return `
<tr>
    <td>
        <input type="text" class="thword" name="term[]" value="${data[0]}" style="width: 10rem;">
    </td>
    <td>
        <input type="text" class="bonus1" name="bonus1[]" value="${data[1]}" style="width: 8rem;">
    </td>
    <td>
        <input type="text" class="bonus2" name="bonus2[]" value="${data[2]}" style="width: 8rem;">
    </td>
    <td>
        <button type="button" name="delete-row-btn" class="btn btn-micro btn-primary" onclick="$(this).closest('tr').remove();">Delete</button>
    </td>
</tr>
`;
        }

        document.addEventListener("DOMContentLoaded", function(event) {

            $(".clear_cut_and_paste_input").click((event) => {
                $("#frmMyModal textarea[name=cut_and_paste_input]").val("");
            });

            $(".append-answer-rows").click((event) => {
                let lines = $("#frmMyModal textarea[name=cut_and_paste_input]").val().split('\n');

                for (let i = 0; i < lines.length; i++) {
                    lines[i] = lines[i].trim();
                    if (lines[i].length) {
                        let lineParts = lines[i].split("~");
                        appendAnswerRow(
                            lineParts[0],
                            lineParts[1] ?? "",
                            lineParts[2] ?? ""
                        );
                    }
                }

                $("#myModal").css("display", "none");
            });

            $(".replace-answer-rows").click((event) => {

                clearAnswerRows();

                let lines = $("#frmMyModal textarea[name=cut_and_paste_input]").val().split('\n');
                for (let i = 0; i < lines.length; i++) {
                    lines[i] = lines[i].trim();
                    if (lines[i].length) {
                        let lineParts = lines[i].split("~");
                        appendAnswerRow(
                            lineParts[0],
                            lineParts[1] ?? "",
                            lineParts[2] ?? ""
                        );
                    }
                }

                $("#myModal").css("display", "none");
            });

            $(".clear-answers-table").click((event) => {
                clearAnswerRows();
            });

            $(".add-answer-row-btn").click((event) => {
                appendAnswerRow("", "", "");
            });

            $(".ajax-verify-before-save-btn").click((event) => {
                let allAnswersOk = true;
                $("#answers-table tbody tr").each(function() {
                    if (!$.trim($(this).find(".thword").val()).length) {
                        allAnswersOk = false;
                    }
                });
                if (!allAnswersOk) {
                    alert("Not all of the Thword answers have values.");
                } else {
                    $("#save-thword-play").click();
                }
            });

            for (let i=0; i < thwords.length; i++) {
                appendAnswerRow(
                    thwords[i][0] ?? "",
                    thwords[i][1] ?? "",
                    thwords[i][2] ?? ""
                );
            }

        });

    </script>

@endsection
