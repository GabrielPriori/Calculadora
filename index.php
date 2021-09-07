<?php
session_start();
ini_set('default_charset', 'iso-8859-1')
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <title>Calculadora</title>
</head>

<body>
    <div class="container">
        <h1>CALCULADORA</h1> 
        <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>CONVERTER PARA ROMANO</h5>
                    <form class="row g-3" method="POST" action="calcular.php">
                      <div class="col-auto">
                         <label for="formGroupExampleInput" class="form-label">Digite um Número:</label>
                      </div>
                      <div class="col-auto">
                        <input class="form-control" name="numero">
                      </div>
                      <div class="col-auto">
                        <input type="submit" class="btn btn-secondary" value="Calcular">
                      </div>
                    </form>
                    <div class="result">
                        <p><?php if (isset($_SESSION['msgErro'])){echo $_SESSION['msgErro']; unset($_SESSION['msgErro']); } ?>
                        <p>Resultado: <?php if(isset($_SESSION['valor'])){ echo $_SESSION['valor']; unset($_SESSION['resultNumero']); }else{ echo "0";}  ?></p>
                        <p>I = <?php if(isset($_SESSION['contI'])){ echo $_SESSION['contI']; unset($_SESSION['contI']); }else{ echo "0";}  ?></p>
                        <p>V = <?php if(isset($_SESSION['contV'])){ echo $_SESSION['contV']; unset($_SESSION['contV']); }else{ echo "0";}  ?></p>
						<p>X = <?php if(isset($_SESSION['contX'])){ echo $_SESSION['contX']; unset($_SESSION['contX']); }else{ echo "0";}  ?></p>
						<p>L = <?php if(isset($_SESSION['contL'])){ echo $_SESSION['contL']; unset($_SESSION['contL']); }else{ echo "0";}  ?></p>
						<p>C = <?php if(isset($_SESSION['contC'])){ echo $_SESSION['contC']; unset($_SESSION['contC']); }else{ echo "0";}  ?></p>
						<p>D = <?php if(isset($_SESSION['contD'])){ echo $_SESSION['contD']; unset($_SESSION['contD']); }else{ echo "0";}  ?></p>
						<p>M = <?php if(isset($_SESSION['contM'])){ echo $_SESSION['contM']; unset($_SESSION['contM']); }else{ echo "0";}  ?></p>
                    </div>
                </div>

                <div class="col">
                    <h5>CONVERTER PARA ÁRABE</h5>
                    <form class="row g-3" method="POST" action="calcular.php">
                      <div class="col-auto">
                        <label type="text" readonly class="form-control-plaintext">Número Romano:</label>
                      </div>
                      <div class="col-auto">
                        <input class="form-control" name="romano" type="text" size="20" maxlength="20" style="text-transform:uppercase" >
                      </div>
                      <div class="col-auto">
                        <input type="submit" id="registrar" class="btn btn-secondary" value="Calcular">
                      </div>
                    </form>
                    <div class="result">
                        <p><?php if (isset($_SESSION['Erro'])){echo $_SESSION['Erro']; unset($_SESSION['Erro']); } ?>
                        <p>Resultado: <?php if(isset($_SESSION['resultRomano'])){ echo $_SESSION['resultRomano']; unset($_SESSION['resultRomano']); } ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>