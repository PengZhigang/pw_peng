<?php
session_start();
if(isset($_SESSION['vu']))
{
    $_SESSION['vu']=$_SESSION['vu']+1;
}
else
{
    $_SESSION['vu']=1;
}
echo "nb de vu：". $_SESSION['vu'];
?>
<br>

<br>
<a href="http://localhost/tp1/exo3/compteur.php"><input type="button" value='RECHARGER Web'></a>
<a href="http://localhost/tp1/exo3/resetCompteur.php"><input type="button" value='recommencer'></a>