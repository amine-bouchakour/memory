<html>
<title>Profil</title>
<link rel="stylesheet" href="walloffame.css">
</html>

<?php
session_start();




class scoreprofil{




}

?>


<br>
<!-- TEST VOS PARTIE -->
<?php
if(isset($_SESSION['login']) and isset($_SESSION['id'])){
    echo 'id= '.$_SESSION['id'].'<br/>';
    echo 'login= '.$_SESSION['login'].'<br/>';
}


$n=1;
?> <table>
    <th>TOP</th>
    <th>-- VOS 5 MEILLEURS PARTIES --</th>
    <th>
        <ul id="menu-accordeon">
            <li><a href="#"><?php if(!isset($_GET['levelbis'])){ echo 'Level 1';} else{echo 'Level '.$_GET['levelbis'];} ?></a>
                <ul>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=1">Level
                            1</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=2">Level
                            2</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=3">Level
                            3</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=4">Level
                            4</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=5">Level
                            5</a></li>
                </ul>
            </li>
    </th>
    <?php ?>
<?php

if(isset($_GET['tab'])){

    if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==1){
        $level=1;
    }
    if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==2){
        $level=2;
    }
    if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==3){
        $level=3;
    }
    if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==4){
        $level=4;
    }
    if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==5){
        $level=5;
    }
    }
    else{
        $level=1;
    }
$connexion=mysqli_connect('localhost','root','','memory');
$requete="SELECT login,points FROM besttime WHERE level='".$level."' and login='".$_SESSION['login']."' ORDER BY points DESC";
$query=mysqli_query($connexion,$requete);
$resultatlevel2=mysqli_fetch_all($query);
var_dump($resultatlevel2);
echo $level.'<br/>';

// TABLEAU VOS PARTIES 

$n=1;
$k=0;
while ($n<=5){    
// $resultatlevel2[0][0];//Login
// $resultatlevel2[0][1];//points
while($k<count($resultatlevel2)){
    echo '<tr><td>'.'N°'.$n.'</td><td><b> '.$resultatlevel2[0][0].' --$défi $temps/$coups $date--</b></td><td><b>'.$resultatlevel2[$k][1].'</b> pts '.'</td></tr>';
    ++$k;
    ++$n;
}
if($k==count($resultatlevel2)){
    echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$points'.'</td></tr>';
    ++$n;

}
}
?>
</table>


