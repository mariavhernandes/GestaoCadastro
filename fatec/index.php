<?php
  include_once("cabec.php");
?>

    <div id="container" class="d-flex mt-5 justify-content-center align-items-center">
      <div id="login" class="card col-lg-7 border-primary bg-dark text-light">
        <h3 class="mt-5 text-center font-courier text-primary"><?php echo $lng['titulo']; ?></h3>

        <p>&nbsp;</p>

        <h4 class="mb-5 text-center font-courier">
          <?php
            if (isset($_SESSION['usuNome'])) {
              echo $lng['bemVindo'] . $_SESSION['usuNome'];
            } 
            else 
            {
              echo $lng['usuDesconectado'];;
            }
          ?>
        </h4>
      </div>
    </div>

<?php
  include_once("rodape.php");
?>