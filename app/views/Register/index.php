<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Register</title>
</head>
<body>
    <u></u>

   <div class="container">
    
   <div class="row">
        <div class="col-3"></div>
        <div class="col-6 text-center"><h3><?= $data['title']; ?></h3></div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Wachtwoord</label>
                    <input name="password" type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Adres</label>
                    <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-10">
                    <label for="inputCity" class="form-label">Woonplaats</label>
                    <input name="city" input="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Postcode</label>
                    <input name="zip" type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>



