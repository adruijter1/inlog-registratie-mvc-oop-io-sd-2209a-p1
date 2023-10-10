<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-3"></div>
        <div class="col-6">
            <h1><?= $data['title']; ?></h1>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form class="row g-3" method="post" action="<?= URLROOT; ?>/Register/index">
                <div class="col-md-12">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-12">
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input name="firstname" type="text" class="form-control" id="inputFirstname">
                </div>
                <div class="col-12">
                    <label for="inputInfix" class="form-label">Tussenvoegsel</label>
                    <input name="infix" type="text" class="form-control" id="inputInfix">
                </div>
                <div class="col-12">
                    <label for="inputLastname" class="form-label">Achternaam</label>
                    <input name="lastname" type="text" class="form-control" id="inputLastname">
                </div>
                <div class="col-12 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Registreer</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>


    