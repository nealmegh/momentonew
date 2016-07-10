<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Parmanently</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure about this ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-small yellow" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn-small btn-danger" id="confirm">Delete</button>
            </div>
        </div>
    </div>
</div>

@section('footer')
    <script>
        tjq('#confirmDelete').on('show.bs.modal', function (e) {
            var message = tjq(e.relatedTarget).attr('data-message');
            tjq(this).find('.modal-body p').text(message);
            var title = tjq(e.relatedTarget).attr('data-title');
            tjq(this).find('.modal-title').text(title);

            // Pass form reference to modal for submission on yes/ok
            var form = tjq(e.relatedTarget).closest('form');
            tjq(this).find('.modal-footer #confirm').data('form', form);
        });

        <!-- Form confirm (yes/ok) handler, submits form -->
        tjq('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            tjq(this).data('form').submit();
        });
    </script>
@endsection