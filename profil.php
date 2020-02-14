<html>
<title>Wall of Fame</title>
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

echo $_SESSION['id'].'<br/>';
echo $_SESSION['login'].'<br/>';


$n=1;
?> <table>
    <th>TOP 10</th>
    <th>---VOS PARTIE---</th>
    <th>
        <ul id="menu-accordeon">
            <li><a href="#"><?php if(!isset($levelbis)){ echo 'Level';}else{echo 'Level '.$_GET['levelbis'];} ?></a>
                <ul>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=<?php if(isset($_GET['level'])){ echo urlencode($_GET['level']);} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=1&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }?>">Level
                            1</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=<?php if(isset($_GET['level'])){ echo urlencode($_GET['level']);} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=2&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }?>">Level
                            2</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=<?php if(isset($_GET['level'])){ echo urlencode($_GET['level']);} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=3&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }?>">Level
                            3</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=<?php if(isset($_GET['level'])){ echo urlencode($_GET['level']);} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=4&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }?>">Level
                            4</a></li>
                    <li><a
                            href="profil.php?tab=1&amp;type=time&amp;level=<?php if(isset($_GET['level'])){ echo urlencode($_GET['level']);} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=5&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }?>">Level
                            5</a></li>
                </ul>
            </li>
    </th>
    <?php

if(isset($_GET['tabbis'])){

if($_GET['tabbis']=='2' and $_GET['typebis']=="tentative" and $_GET['levelbis']==1){
$levelbis=1;
}
if($_GET['tabbis']=='2' and $_GET['typebis']=="tentative" and $_GET['levelbis']==2){
$levelbis=2;
}
if($_GET['tabbis']=='2' and $_GET['typebis']=="tentative" and $_GET['levelbis']==3){
$levelbis=3;
}
if($_GET['tabbis']=='2' and $_GET['typebis']=="tentative" and $_GET['levelbis']==4){
$levelbis=4;
}
if($_GET['tabbis']=='2' and $_GET['typebis']=="tentative" and $_GET['levelbis']==5){
$levelbis=5;
}
}

$connexion=mysqli_connect('localhost','root','','memory');

$requete1="SELECT points FROM besttime WHERE level='".$levelbis."' and login='".$_SESSION['login']."' ORDER BY points DESC";
$query=mysqli_query($connexion,$requete1);
$resultatlevel1=mysqli_fetch_all($query);
echo $resultatlevel1[0];
var_dump($resultatlevel1);

$requete1="SELECT points FROM besttentative WHERE level='".$levelbis."' and login='".$_SESSION['login']."' ORDER BY points DESC";
$query1=mysqli_query($connexion,$requete1);
$resultatlevel2=mysqli_fetch_all($query1);
echo $resultatlevel2[0];
var_dump($resultatlevel2);

$k=0;
while ($n<=10){    
// $resultatlevel2[0][0];//Login
// $resultatlevel2[0][1];//tentative
// $resultatlevel2[0][2];//points
while($k<count($resultatlevel2)){
    $ptstotal = number_format($ptstotal,2);
    echo '<tr><td>'.'N°'.$n.'</td><td><b>'.$resultatlevel2[$k].'</b></td><td><b>'.$resultatlevel2[$k].'</b> coups -------------- <b>'.$ptstotal.'</b> pts '.'</td></tr>';
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



