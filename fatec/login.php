<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
  
</body>

<?php
  include_once("cabec.php");
?>

<div class="container">
  <div class="row mt-4 justify-content-center">
    <div id="login" class="card col-lg-5 bg-light border-primary bg-dark text-light">
      <h2 class="mt-5 text-center font-courier"><?php echo $lng['acessoSistema']; ?></h2>

      <div class="col-12">
        &nbsp;
      </div>
    
      <form name="dados" action="autentica.php" method="GET">
        <div class="row ms-5 mb-3">
          <label for="email" class="col-form-label">E-mail:</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control">
          </div>
        </div>

      <div>
        &nbsp;
      </div>

      <div class="row ms-5 mb-3">
        <label for="senha" class="col-form-label"><?php echo $lng['senha']; ?>:</label>
        <div class="col-sm-10">
          <input type="password" name="senha" class="form-control">
        </div>
      </div>

      <div class="col-12">
        &nbsp;
      </div>

      <div class="text-center">
        <button type="submit" name="btnEnviar" class="mb-5 col-9 btn btn-primary"><?php echo $lng['entrar']; ?></button>
      </div>
    </form>
  </div>
</div>

<?php
  include_once("rodape.php");
?>