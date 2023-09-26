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
            <form class="row g-3" method="post" action="<?= URLROOT; ?>/Register/registerFormData">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4">
                </div>
                
                <div class="col-12">
                    <label for="inputFirstname" class="form-label">Voornaam</label>
                    <input name="firstname" type="text" class="form-control" id="inputFirstname" placeholder="">
                </div>

                <div class="col-12">
                    <label for="inputInfix" class="form-label">Tussenvoegsel</label>
                    <input name="infix" type="text" class="form-control" id="inputInfix" placeholder="">
                </div>

                <div class="col-12">
                    <label for="inputLastname" class="form-label">Achternaam</label>
                    <input name="lastname" type="text" class="form-control" id="inputLastname" placeholder="">
                </div>

                <div class="col-12 d-grid gap-2">
                    <button name="button" type="submit" class="btn btn-primary" type="button" value="submit">Registreer</button>
                </div>
                </form>



        </div>
        <div class="col-3"></div>
    </div>
</div>









    