<!-- Post Delete-->
<div class="modal fade" id="post-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <div class="d-flex flex-column">
                    <p>Sicuro di voler eliminare il post?</p>
                    <div class="d-flex flex-row justify-content-around">
                        <form id="post-delete-form" method="POST" >
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="btn btn-primary mr-3">Si</button>
                        </form>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Post Delete End -->