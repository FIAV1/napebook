@extends('layouts.master')

@section('content')
    <section id="posts">
        <div class="container">
            @if($post->user->id == auth()->id())
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto mt-3">
                    <div class="d-flex justify-content-start">
                        <button id="updateButton" class="btn btn-info mr-3">Salva <i class="far fa-save ml-2"></i></button>

                        <form method="GET" action="{{ route('post-show', $post->id) }}">
                            {{ csrf_field() }}
                            
                            <button type="submit" class="btn btn-danger mr-3">Annulla <i class="fas fa-times ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto mt-3">
                    <div class="card text-white bg-light mb-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                @if(auth()->user()->image)
                                    <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                                @else
                                    <img src="{{ URL::asset('/img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                                @endif
                                <div class="align-self-center"><span class="post-author"><a href="#">{{ $post->user->name }} {{ $post->user->surname }}</a></span></div>
                                <div class="align-self-center"><span class="post-time">{{ $post->updated_at->diffForHumans() }}</span></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($post->image)
                                <img id="postImage" class="card-img-top mb-4" src="/{{ $post->image }}" alt="post image">
                            @endif

                            <form id="updateForm" method="POST" action="{{ route('post-update', $post->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class="sr-only" for="post-text">Post text</label>
                                        <textarea class="form-control {{ $errors->getBag('post')->has('post-text') ? ' is-invalid' : '' }}" id="post-text" name="post-text" rows="5">{{ $post->text }}</textarea>
                                        @if ($errors->getBag('post')->has('post-text'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->getBag('post')->first('post-text') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <input id="imgRemoveInput" type="hidden" name="remove" value="">
                                <div id="imageForm" class="form-row">
                                    <div class="form-group col-6">
                                        <label class="btn btn-light" for="post-image">Carica un'immagine<i class="fas fa-image ml-2"></i></label>
                                        <input type="file" name="post-image" class="form-control {{ $errors->getBag('post')->has('post-image') ? ' is-invalid' : '' }}" id="post-image" accept=".jpg, .jpeg, .png">

                                        @if ($errors->getBag('post')->has('post-image'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->getBag('post')->first('post-image') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    @if($post->image)
                                    <div class="form-group col-6">
                                        <button type="button" id="imgRemoveButton" class="btn btn-danger">Rimuovi l'immagine</button>
                                    </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    (function($) {
        "use strict"; // use strict make writing js more secure

        var $updateButton = $('#updateButton');
        var $updateForm = $('#updateForm');
        var $imgRemoveButton = $('#imgRemoveButton');
        var $imgRemoveInput = $('#imgRemoveInput');
        var $postImage = $('#postImage')
        
        // Attaching a button to remove the unwanted file
        $imgRemoveButton.click(function() {
            if($imgRemoveInput.val() === ""){
                $imgRemoveInput.val("remove");
                $postImage.hide();
                $imgRemoveButton.text("Mantieni l'immagine");
            } else {
                $imgRemoveInput.val("");
                $postImage.show();
                $imgRemoveButton.text("Rimuovi l'immagine");
            }
        });

        $updateButton.click(function() {
            $updateForm.submit();
        });
        
        $("input[type='file']").change( function(){
            // Variables representing dom objects
            var $fileUpload = $("input[type='file']");
            var $errorModal = $("#errorModal");
            var $errorField = $("#errorField");
            var $imageForm = $("#imageForm");
            var $fileName = $("#fileName");
            
            // Validating file input, must be only one item
            if (parseInt($fileUpload.get(0).files.length)>1){
                $errorField.text("Puoi caricare al massimo un'immagine per post");
                $errorModal.modal('show');
            }

            // Removing, if it exist, old/wrong uploaded file
            if($fileName.length){
                $fileName.remove();
            }

            // Checking if there's at least one file ready to be uploaded
            if(parseInt($fileUpload.get(0).files.length)===1){
                $imageForm.append('<div id="fileName" class="col-12"><p><strong class="mr-2">Immagine:</strong>'+$fileUpload.val().split('\\').pop()+'<a href="#" id="imgClear"><i class="fas fa-trash-alt ml-2"></i></a></p></div>');

                // Attaching a button to remove the unwanted file
                $("#imgClear").click(function() {
                    var $fileUpload = $("input[type='file']");
                    $fileName = $("#fileName");

                    $fileUpload.val('');
                    $fileName.remove();
                });
            }
        });
    })(jQuery);
</script>
@endsection