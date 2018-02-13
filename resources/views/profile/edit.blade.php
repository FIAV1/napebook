<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-profile">Modifica informazioni</h5>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-12 col-md-6 pt-3 pt-md-0">
                            <label for="surname">Cognome</label>
                            <input type="text" class="form-control" id="surname" placeholder="Cognome" value="{{ $user->surname }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <label for="password">Nuova Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Nuova Password" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="password_confirmation">Conferma Nuova Password</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Conferma Password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="phone">Telefono</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Telefono" value="{{ $user->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <label for="birthday">Data di nascita</label>
                            <input type="date" class="form-control" id="birthday" value="{{ $user->birthday }}" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <legend class="col-form-label pt-md-0 pt-3">Sesso</legend>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="M" {{ $user->sex == ('M') ? 'checked' : ''}} required>
                                <label class="form-check-label" for="male">Uomo</label>
                            </div>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="F" {{ $user->sex == ('F') ? 'checked' : ''}}>
                                <label class="form-check-label" for="female">Donna</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio" rows="5" placeholder="Scrivi qualcosa su di te">{{ $user->bio }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 d-flex">
                            <button type="submit" id="update-profile" data-id="{{ $user->id }}" class="btn btn-secondary mr-auto">Salva <i class="fas fa-save ml-2"></i></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla <i class="fas fa-times ml-2"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>