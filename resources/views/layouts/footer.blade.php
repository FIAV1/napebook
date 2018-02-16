<footer id="footer">
    <div class="container">
        <div class="row my-4">
            <div class="col-4"><a id="team-anchor" data-toggle="modal" data-target="#teamModal">Team</a></div>
            <div class="col-4"><p class="text-center">Copyright © Napebook {{ date('Y') }}</p></div>
            <div class="col-4"><p class="text-right">Made with <i class="fas fa-heart"></i> </p></div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content align-items-center">
                        <img src="{{ URL::asset('img/nico.svg') }}" alt="user image" class="img-fluid rounded-circle author-image-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="bold">Niccolò Fontana</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="font-weight-light font-italic">Chief Technology Officer</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <img src="{{ URL::asset('img/fede.svg') }}" alt="user image" class="img-fluid rounded-circle author-image-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p>Federico Frigo</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="font-weight-light font-italic">Human Interface SVP</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle author-image-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="bold">Giovanni Fiorini</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="font-weight-light font-italic">Head of Software Engineering</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <img src="{{ URL::asset('img/marco.svg') }}" alt="user image" class="img-fluid rounded-circle author-image-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="bold">Marco Rambaldi</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="font-weight-light font-italic">Majority Investor</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>