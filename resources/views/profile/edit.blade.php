<!-- Profile Edit -->
<div class="modal fade" id="profile-edit" tabindex="-1" role="dialog" aria-labelledby="profile-edit-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-edit-title">Modifica informazioni</h5>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name-edit">Nome</label>
                            <input type="text" class="form-control" id="name-edit" placeholder="Nome" required>
                        </div>
                        <div class="form-group col-12 col-md-6 pt-3 pt-md-0">
                            <label for="surname-edit">Cognome</label>
                            <input type="text" class="form-control" id="surname-edit" placeholder="Cognome" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password-edit">Nuova Password</label>
                            <input type="password" class="form-control" id="password-edit" placeholder="Nuova Password" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password-edit_confirmation">Conferma Nuova Password</label>
                            <input type="password" class="form-control" id="password-edit_confirmation" placeholder="Conferma Password" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="phone-edit">Telefono</label>
                            <input type="tel" class="form-control" id="phone-edit" placeholder="Telefono">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="birthday-edit">Data di nascita</label>
                            <input type="date" class="form-control" id="birthday-edit" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <legend class="col-form-label pt-md-0 pt-3">Sesso</legend>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="M" required>
                                <label class="form-check-label" for="male">Uomo</label>
                            </div>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="F">
                                <label class="form-check-label" for="female">Donna</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio-edit" rows="5" placeholder="Scrivi qualcosa su di te"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 d-flex">
                            <button type="submit" id="profile-update-button" class="btn btn-secondary mr-auto" data-id="{{ $user->id }}">Salva <i class="fas fa-save ml-2"></i></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla <i class="fas fa-times ml-2"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Profile Edit End -->