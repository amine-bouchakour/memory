<html>
<title>Wall of Fame</title>
<link rel="stylesheet" href="walloffame.css">


<?php
session_start();


class score{

    public $nb_cout;
    public $level=1;
    public $levelbis=1;
    public $temps;
    public $défi="";

    Public function scoreperso($défi,$level,$nb_cout,$temps) {


        if(isset($défi) and isset($level) and isset($nb_cout) and isset($temps)){

            $connexion=mysqli_connect("Localhost","root","","memory");
            $requete2="SELECT * FROM utilisateur ";
            $query=mysqli_query($connexion,$requete2);
            $resultat=mysqli_fetch_all($query);
            $resultat[0];
            var_dump($resultat);

            session_start();

            $this->défi=$défi;
            $this->level=$level;
            $this->temps=$temps;
            $this->nb_cout=$nb_cout;
            $login=$this->login;
            $id=$this->id;
            
            

            $connexion=mysqli_connect('localhost','root','','memory');
            $requete="INSERT INTO score (temps,tentative,level,defi,id_utilisateur) VALUES ('".$temps."','".$nb_cout."','".$level."','".$défi."'.'".$id."') WHERE login='".$login."'";
            $query=mysqli_query($connexion,$requete);
            echo ($query);

            echo '<br/>Défi = '.$défi.'<br>';
            echo 'Level = '.$level.'<br>';
            echo 'Nb_cout = '.$nb_cout.'<br/>';
            echo 'Temps= '.$temps.'<br/>';
            echo 'Id= '.$this->id.'<br/>';
            echo 'login= '.$login.'<br/>';

        }
    }

}

if(isset($_SESSION['login']) and isset($_SESSION['nb_tentative'])){

    echo 'Login = '.$_SESSION['login'].'<br/>';
    echo 'ID = '.$_SESSION['id'].'<br/>';
    echo 'Nb tentative = '.$_SESSION['nb_tentative'].' coups'.'<br/>';
    echo 'Chrono = '.$_SESSION['temps'].' secondes'.'<br/>';
    echo 'Level = '.$_SESSION['level'].'<br/>';
    echo 'Défi = '.$_SESSION['defi'].'<br/>';
    echo 'Points besttime = '.$_SESSION['pointstime'].'<br/>';
    echo 'Points besttentative = '.$_SESSION['pointstentative'].'<br/>';
}





$totalscore= new score;
if(isset($_POST['valider'])){
    $memory->scoreperso($_POST['défi'],$_POST['level'],$_POST['nb_cout'],$_POST['temps']);
}



// <!-- TEST " CHRONO " -->

if(isset($_GET['levelbis'])){
if(!isset($levelbis)){
    $levelbis=$_GET['levelbis'];
}
}

if(isset($_GET['levelbis2'])){
if(!isset($levelbis2)){
    $levelbis2=$_GET['levelbis2'];
}
}

if(!isset($level)){
    $level=0;
}
else{
    $level=$_GET['level'];
}
$n=1;
?>
<section class="aligntab">
    <table>
        <th>TOP 10</th>
        <th>--- " CHRONO " ---</th>
        <th>
            <ul id="menu-accordeon">                

                <li>
                <a href="#"><?php if(!isset($_GET['level'])){ echo 'Level 1';} else{echo 'Level '.$_GET['level'];} ?></a>
                    <ul>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=1&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }else{echo $levelbis=1;}?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){echo urlencode($levelbis2); } else{echo $levelbis2=1;}?>">Level
                                1</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=2&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }else{echo $levelbis=2;}?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){echo urlencode($levelbis2); } else{echo $levelbis2=2;}?>">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=3&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }else{echo $levelbis=3;}?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){echo urlencode($levelbis2); }else{echo $levelbis2=3;} ?>">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=4&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }else{echo $levelbis=4;}?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){echo urlencode($levelbis2); }else{echo $levelbis2=4;} ?>">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=5&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }else{echo $levelbis=5;}?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){echo urlencode($levelbis2); }else{echo $levelbis2=5;} ?>">Level
                                5</a></li>


                    </ul>
                </li>
        </th>
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

    


if(!empty($resultat2)){
    $nb_partielevel=count($resultat2);
    }
else{
    $nb_partielevel=1;
    }

    $j=0;

        $connexion=mysqli_connect('localhost','root','','memory');
        $requete0="SELECT login,avg(points),avg(temps) FROM `besttime`where level='".$level."'  GROUP BY login ORDER BY  avg(temps) LIMIT 10 ";
        
        $query0=mysqli_query($connexion,$requete0);
        $resultat0=mysqli_fetch_all($query0);
        //var_dump($resultat0);
        $n=1;
        foreach($resultat0 as $ligne)
        {
            $ligne[1] = number_format($ligne[1],2);
            $ligne[2] = number_format($ligne[2],1);
            echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.ucfirst($ligne[0]).'</b>'.'</td><td><b>'.$ligne[2].'</b> secondes ------- <b> '.$ligne[1].'</b> pts '.'</td></tr>';
            $n++;
        }  
       
        while($n<=10)
        {
            echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.'</b>'.'</td><td><b>'.'</b> <b> '.'</b> pts '.'</td></tr>';
            $n++;
        }
    ?>
    </table>
    <br><br><br><br>
   

    


    <br>
<!-- TEST PRINCIPALE  " SANS-FAUTE "  -->
    <?php

$n=1;
?> <table>
        <th>TOP 10</th>
        <th>--- " SANS-FAUTE " ---</th>
        <th>
            <ul id="menu-accordeon">
            <li>
                <a href="#"><?php if(!isset($_GET['levelbis'])){ echo 'Level 1';} else{echo 'Level '.$_GET['levelbis'];} ?></a>
                    <ul>
                <li>
                <a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=1&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }else{echo $levelbis2=1;}?>">Level
                                1</a>
                    <ul>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=2&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }else{echo $levelbis2=2;}?>">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=3&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }else{echo $levelbis2=3;}?>">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=4&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }else{echo $levelbis2=4;}?>">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=5&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php if(isset($levelbis2)){ echo urlencode($levelbis2); }else{echo $levelbis2=5;}?>">Level
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
else{
    $levelbis=1;
}



if(!empty($resultatlevel2)){
    $nb_partielevel=count($resultatlevel2);
    }
else{
    $nb_partielevel=1;
    }

    $connexion=mysqli_connect('localhost','root','','memory');
    $requete0="SELECT login,avg(points),avg(nb_tentative) FROM `besttentative`where level='".$levelbis."'  GROUP BY login ORDER BY avg(nb_tentative) LIMIT 10 ";
    
    $query0=mysqli_query($connexion,$requete0);
    $resultat0=mysqli_fetch_all($query0);
    //var_dump($resultat0);
    $n=1;
    foreach($resultat0 as $ligne)
    {
        $ligne[1] = number_format($ligne[1],2);
        $ligne[2] = number_format($ligne[2],1);
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.ucfirst($ligne[0]).'</b>'.'</td><td><b>'.$ligne[2].'</b> coups ------- <b> '.$ligne[1].'</b> pts '.'</td></tr>';
        $n++;
    }  
   
    while($n<=10)
    {
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.'</b>'.'</td><td><b>'.'</b> <b> '.'</b> pts '.'</td></tr>';
        $n++;
    }
?>

    
<!-- TEST PRINCIPALE BESTSCORE -->


<?php



// SELECT utilisateurs.login,SUM(besttime.points) + SUM(besttentative.points) FROM utilisateurs INNER JOIN besttime on utilisateurs.id=besttime.id_utilisateur INNER JOIN besttentative on utilisateurs.id=besttentative.id_utilisateur WHERE besttime.level=3 AND besttentative.level=3 GROUP by utilisateurs.login

?>

</html>

    <?php

$n=1;
?> <table>
        <th>TOP 10</th>
        <th>---BEST TOTAL SCORE---</th>
        <th>
            <ul id="menu-accordeon">
            <li>
                <a href="#"><?php if(!isset($_GET['levelbis2'])){ echo 'Level 1';} else{echo 'Level '.$_GET['levelbis2'];} ?></a>
                    <ul>
                <li>
                <a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=1">Level
                                1</a>
                    <ul>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=2">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=3">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=4">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php if(isset($level)){echo $level;}else{ echo $_GET['level'];} ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php if(isset($levelbis)){ echo urlencode($levelbis); }?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=5">Level
                                5</a></li>
                    </ul>
                </li>
        </th>
        <?php
if(isset($_GET['tabbis2'])){

if($_GET['tabbis2']=='3' and $_GET['typebis2']=="bestscore" and $_GET['levelbis2']==1){
    $levelbis2=1;
}
if($_GET['tabbis2']=='3' and $_GET['typebis2']=="bestscore" and $_GET['levelbis2']==2){
    $levelbis2=2;
}
if($_GET['tabbis2']=='3' and $_GET['typebis2']=="bestscore" and $_GET['levelbis2']==3){
    $levelbis2=3;
}
if($_GET['tabbis2']=='3' and $_GET['typebis2']=="bestscore" and $_GET['levelbis2']==4){
    $levelbis2=4;
}
if($_GET['tabbis2']=='3' and $_GET['typebis2']=="bestscore" and $_GET['levelbis2']==5){
    $levelbis2=5;
}
}
else{
    $levelbis2=1;
}

$connexion=mysqli_connect('localhost','root','','memory');
    $requete0="SELECT utilisateurs.login,SUM(besttime.points) + SUM(besttentative.points) FROM utilisateurs INNER JOIN besttime on utilisateurs.id=besttime.id_utilisateur INNER JOIN besttentative on utilisateurs.id=besttentative.id_utilisateur WHERE besttime.level='".$levelbis2."' AND besttentative.level='".$levelbis2."' GROUP by utilisateurs.login ORDER BY SUM(besttime.points) + SUM(besttentative.points) LIMIT 10 ";
    
    $query0=mysqli_query($connexion,$requete0);
    $resultat0=mysqli_fetch_all($query0);
    //var_dump($resultat0);
    $n=1;
    foreach($resultat0 as $ligne)
    {
        $ligne[1] = number_format($ligne[1],2);
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.ucfirst($ligne[0]).'</b>'.'</td><td> '.$ligne[1].'</b> pts '.'</td></tr>';
        $n++;
    }  
   
    while($n<=10)
    {
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.'</b>'.'</td><td><b>'.'</b> <b> '.'</b>'.'</td></tr>';
        $n++;
    }


?>
    </table>
</section>