<!-- Comment Edit -->
<div class="modal fade" id="comment-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row justify-content-start">

                        <!-- User image, name and comment timestamp -->
                        <div class="col-2 col-md-2 col-lg-1 px-0">
                            <img id="comment-author-image" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                        </div>

                        <div class="col-auto d-flex flex-column justify-content-center">
                            <a id="comment-author"></a>
                            <small><i class="far fa-clock mr-2"></i><span id="comment-time"></span></small>
                        </div>

                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="sr-only" for="comment-text">Comment text</label>
                                        <textarea id="comment-text" class="form-control" name="comment-text" rows="2" required></textarea>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="d-flex justify-content-end">
                                <button id="comment-update-button" class="btn btn-success mr-3">Salva <i class="far fa-save ml-2"></i></button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla <i class="fas fa-times ml-2"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Comment Edit End -->