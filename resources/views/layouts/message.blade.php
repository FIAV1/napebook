@if (session('message'))
<section class="session-message">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show text-center my-4" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endif