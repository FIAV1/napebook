<!-- Post Edit -->
<div class="modal fade" id="post-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row justify-content-start">

                        <!-- User image, name and post timestamp -->
                        <div class="col-2 col-md-2 col-lg-1 px-0">
                            <img id="post-author-image" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                        </div>
                        
                        <div class="col-auto d-flex flex-column justify-content-center">
                            <a id="post-author"></a>
                            <small><i class="far fa-clock mr-2"></i><span id="post-time"></span></small>
                        </div>

                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Post image -->
                        <div id="post-image" class="col-12 mb-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form id="post-update-form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="sr-only" for="post-text">Post text</label>
                                        <textarea id="post-text" class="form-control" name="post-text" rows="5" required></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label class="btn btn-light" for="post-image-update">Carica un'immagine<i class="fas fa-image ml-2"></i></label>
                                        <input type="file" id="post-image-update" name="post-image" class="form-control" data-id="post-update-form" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div id="post-image-manage"></div>
                                </div>

                                <input id="post-image-remove-input" type="hidden" name="remove" value="">
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="d-flex justify-content-end">
                                <button id="post-update-button" class="btn btn-success mr-3">Salva <i class="far fa-save ml-2"></i></button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla <i class="fas fa-times ml-2"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Post Edit End -->