<form id="frmCutAndPaste" class="admin-form" action="{{ $action }}" method="post">

    <div class="row">
        <div class="col-8">
            <div class="card m-4">
                <div class="card-header pl-3 pt-1 pb-1">Source</div>
                <div class="card-body p-2 pb-0">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="source1" name="source" value="collins" checked>
                        <label class="form-check-label" for="radio1">Collins</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 text-end">
            <button type="button" class="btn btn-sm btn-primary" name="process-cut-and-paste-btn" id="process-cut-and-paste-btn">
                Process
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="container form-container" style="max-width: 60rem;">
                <div class="form-group">
                    <label for="content">Cut and paste the text into the box below.</label>
                    <textarea class="form-control" name="content" id="content" rows="25" cols="80"></textarea>
                </div>
            </div>

        </div>
    </div>

</form>
