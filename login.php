
<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página


<form method="post" action="valida.php">
  <label> Usuário </label>
  <input type="text" name="usuario" maxlength="50" /> <br /> <br />
  
  <label>Senha</label>
  <input type="password" name="senha" maxlength="50" /> <br /> <br />
  
  <input type="submit" value="Entrar" />
</form>
?>