<div id="#post-create" class="mt-5">
    <h4>Crea un post<i class="fas fa-pencil-alt fa-xs ml-3"></i></h4>

    <form id="post-create-form" method="POST" action="{{ route('post-store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-12">
                <label class="sr-only" for="post-text-create">Post textarea</label>
                <textarea id="post-text-create" class="form-control" name="post-text" rows="5" placeholder="A cosa stai pensando {{ auth()->user()->name }}?" required></textarea>
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group col-auto">
                <label class="btn btn-light" for="post-image-create">Carica un'immagine<i class="fas fa-image ml-2"></i></label>
                <input type="file" id="post-image-create" class="form-control" name="post-image" data-id="post-create-form" accept=".jpg, .jpeg, .png">
            </div>

            <div class="form-group col-auto ml-auto">
                <button type="submit" class="btn btn-primary">Pubblica<i class="fas fa-paper-plane ml-2"></i></button>

            </div>
        </div>
        
    </form>
</div>