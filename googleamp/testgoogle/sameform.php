<?php

  $nomeDominio='';

  if (isset($_GET['infoDominio']))
  {          
      $nomeDominio = $_GET['nomeDominio'];
      echo "I'm getting ".$nomeDominio;
  }

  if (isset($_POST['atualizarDominio']))
  {
      echo "I'm posting ".$nomeDominio;
  }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test Case 99</title>
    </head>

    <body>

        <form name="infoDominio" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>"  method="get">

            <input id="nome_dominio" type="text" name="nomeDominio" value="<?php echo $nomeDominio; ?>"/>
            <br />
            <button name="infoDominio" type="submit">Obtem informacao</button>

        </form>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" name="atualizarDominio" method="post">

            <input type="hidden" value="<?php echo $nomeDominio ?>" name="nome-dominio"/>
            <br />
            <button type="submit" name="atualizarDominio">atualizar domínio</button>

        </form>

    </body>

</html>