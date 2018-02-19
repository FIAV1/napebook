<footer id="footer">
    <div class="container">
        <div class="row my-2">
            <div class="col-6 col-md-4"><a id="team-anchor" data-toggle="modal" data-target="#teamModal">Team <i class="far fa-futbol"></i></a></div>
            <div class="col-md-4 d-none d-md-block"><p class="text-center">Copyright © Napebook {{ date('Y') }}</p></div>
            <div class="col-6 col-md-4"><p class="text-right">Made with <i class="far fa-heart"></i> </p></div>
        </div>
        <div class="row my-2 d-sm-block d-md-none">
            <div class="col-12"><p class="text-center">Copyright © Napebook {{ date('Y') }}</p></div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row my-3">
                        <div class="col-4"><img src="https://api.adorable.io/avatars/285/niccolò@adorable.png" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md"></div>
                        <div class="col-8 d-flex flex-column justify-content-center">
                            <p class="bold">Niccolò Fontana</p>
                            <p class="font-weight-light font-italic">Chief Technology Officer</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4"><img src="https://api.adorable.io/avatars/285/federico@adorable.png" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md"></div>
                        <div class="col-8 d-flex flex-column justify-content-center">
                            <p>Federico Frigo</p>
                            <p class="font-weight-light font-italic">Human Interface SVP</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4"><img src="https://api.adorable.io/avatars/285/giovanni@adorable.png" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md"></div>
                        <div class="col-8 d-flex flex-column justify-content-center">
                            <p class="bold">Giovanni Fiorini</p>
                            <p class="font-weight-light font-italic">Head of Software Engineering</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4"><img src="https://api.adorable.io/avatars/285/marco@adorable.png" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md"></div>
                        <div class="col-8 d-flex flex-column justify-content-center">
                            <p class="bold">Marco Rambaldi</p>
                            <p class="font-weight-light font-italic">Majority Investor</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>