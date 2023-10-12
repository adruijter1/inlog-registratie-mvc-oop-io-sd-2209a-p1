<div class="container">
    <div class="row mb-4 mt-3">
        <div class="col-3"></div>
        <div class="col-6">
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-3"></div>
    </div>


    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form class="row g-3" method="post" action="<?= URLROOT; ?>/Register/activeren">
                <div class="col-md-12">
                    <label for="inputPassword" class="form-label">Kies een wachtwoord</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                </div>
                
                <div class="col-12">
                    <label for="inputPassword2" class="form-label">Type het wachtwoord opnieuw</label>
                    <input name="passwordCheck" type="password" class="form-control" id="inputPassword2" placeholder="">
                </div>

                <input type="hidden" name="gebruikersId" value="<?= $data['gebruikersId']; ?>">
                <input type="hidden" name="passwordHash" value="<?= $data['hash']; ?>">

                <div class="col-12 d-grid gap-2">
                    <button name="button" type="submit" class="btn btn-primary" type="button" value="submit">Registreer</button>
                </div>
                </form>



        </div>
        <div class="col-3"></div>
    </div>
</div>









    