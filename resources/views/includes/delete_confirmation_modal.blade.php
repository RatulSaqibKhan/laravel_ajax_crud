<div class="modal fade" id="delete-confirmation-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => '', 'method' => 'delete', 'id' => 'delete-item-form']) !!}
            <div class="modal-body">
                <p>Are you sure to delete?</p>
                {!! Form::hidden('id', null) !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>