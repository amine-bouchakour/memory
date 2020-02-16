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

echo 'Login = '.$_SESSION['login'].'<br/>';
echo 'ID = '.$_SESSION['id'].'<br/>';
echo 'Nb tentative = '.$_SESSION['nb_tentative'].' coups'.'<br/>';
echo 'Chrono = '.$_SESSION['temps'].' secondes'.'<br/>';
echo 'Level = '.$_SESSION['level'].'<br/>';
echo 'Défi = '.$_SESSION['defi'].'<br/>';
echo 'Points besttime = '.$_SESSION['pointstime'].'<br/>';
echo 'Points besttentative = '.$_SESSION['pointstentative'].'<br/>';





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

    
// TOUTE PARTIE SELON LEVEL
$connexion=mysqli_connect('localhost','root','','memory');
$requete="SELECT login,temps,points,id_utilisateur FROM besttime WHERE level='".$level."' ORDER BY points DESC";
$query=mysqli_query($connexion,$requete);
$resultat2=mysqli_fetch_all($query);
var_dump($resultat2);

if(!empty($resultat2)){
    $nb_partielevel=count($resultat2);
    }
else{
    $nb_partielevel=1;
    }

    $j=0;
while ($n<=10){
    
    // $resultatl2[0][0];//Login
    // $resultatl2[0][1];//temps
    // $resultatl2[0][2];//points
    $ptstotal=0;
    
    while($j<$nb_partielevel  and $n<=10){
        $login=$resultat2[$j][0];


        $points=$resultat2[$j][2];
        $pointstotals=$points+$points;
        $points=0;
        echo 'Login = '.$login.'<br/>';

        // ADDITION DE TOUTE LES PARTIE DU MEME JOUEUR ET MEME LEVEL points
        $l=0;
        while($l<$nb_partielevel  and $n<=10){
            if($login==$resultat2[$l][0]){
        $id_utilisateur=$resultat2[$l][3];//id_utiiisateur

                // echo 'Points DANS boucle avant '.$points.'<br/>';
                $points=$points+$resultat2[$l++][2];
                echo 'Points DANS boucle apres '.$points.'<br/>';
            }
            else{
                ++$l;
            }
        }

        $temps=0;
        $requete1="SELECT login,temps,points,id_utilisateur FROM besttime WHERE level='".$level."' and id_utilisateur='".$id_utilisateur."' ORDER BY points DESC";
        $query1=mysqli_query($connexion,$requete1);
        $resultat1=mysqli_fetch_all($query1);
            
        if(!empty($resultat1)){
            $nb_partiejoueur=count($resultat1);
            }

        else{
            $nb_partiejoueur=1;
            }
            // ADDITION DE TOUTE LES PARTIE DU MEME JOUEUR ET MEME LEVEL temps
            $r=0;
            while($r<$nb_partiejoueur ){
                if($login==$resultat2[$r][0]){
                    // echo 'temps DANS boucle avant = '.$temps.'<br/>';
                    $temps=$temps+$resultat2[$r++][1];
                    echo 'temps DANS boucle apres = '.$temps.'<br/>';
                }
                else{
                    ++$r;
                }
            }
            echo '<br/>';

        if($temps==0){
            $temps=1;
        }
        
        echo 'calcul temps moyen ='.$temps.'/'.$nb_partiejoueur.'<br/>';
        $temps=$temps/$nb_partiejoueur;
        echo 'Temps moyenne = '.$temps.' secondes'.'<br/>';
        
        echo 'calcul points moyen ='.$points.'/'.$nb_partiejoueur.'<br/>';
        $points=$points/$nb_partiejoueur;
        echo 'Points moyen = '.$points.' points'.'<br/>'.'<br/>';

        // echo 'Points TOTAL bestime  personnel '.$points.' pts<br/>'.'<br/>';
        
        $points = number_format($points,1);
        $temps = number_format($temps,1);

        echo $temps.'<br/>';

        // echo 'TEMPS AVANT CALCUL = '.$temps.'<br/>';
        //    echo 'TEMPS APRES CALCUL = '.$temps.'<br/>';

        echo '<tr><td>'.'N°'.$n.'</td><td>'.'<b>'.ucfirst($resultat2[$j][0]).'</b>'.'</td><td><b>'.$temps.'</b> secondes ------- <b> '.$points.'</b> pts '.'</td></tr>';
        ++$j;
        ++$n;
    }

    if($j==count($resultat2)){
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$points'.'</td></tr>';
        ++$n;
    }

}


    // echo 'Login = '.$login.'<br/>';
    // echo 'PTS BESTIME + BESTTENTATIVE = '.$points.'<br/>';
    // echo 'Nb partie du joueur par level = '.$nb_partiejoueur.'<br/>';
    // echo 'Nb partie total par level = '.$nb_partielevel.'<br/>';

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

    $connexion=mysqli_connect('localhost','root','','memory');
    $requete1="SELECT login,nb_tentative,points FROM besttentative WHERE level='".$levelbis."' ORDER BY points DESC";
    $query1=mysqli_query($connexion,$requete1);
    $resultatlevel2=mysqli_fetch_all($query1);
    // var_dump($resultatlevel2);
    $k=0;
while ($n<=10){    
    // $resultatlevel2[0][0];//Login
    // $resultatlevel2[0][1];//tentative
    // $resultatlevel2[0][2];//points
    while($k<count($resultatlevel2) and $n<=10){
        $pts=$levelbis/$resultatlevel2[$k][1];
        $ptstotal=$pts*$levelbis*10;
        $ptstotal = number_format($ptstotal,1);
        echo '<tr><td>'.'N°'.$n.'</td><td><b>'.ucfirst($resultatlevel2[$k][0]).'</b></td><td><b>'.$resultatlevel2[$k][1].'</b> coups -------------- <b>'.$ptstotal.'</b> pts '.'</td></tr>';
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

    <br>
    <!-- TEST PRINCIPALE BESTSCORE -->

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




// REQUETE POINTS BESTTIME
$connexion=mysqli_connect('localhost','root','','memory');
$requete1="SELECT points,utilise,id_utilisateur,login FROM besttime WHERE level='".$levelbis2."' ORDER BY points DESC";
$query=mysqli_query($connexion,$requete1);
$resultatlevel1=mysqli_fetch_all($query);
echo($requete1).'<br/>';;
echo $resultatlevel1[0][3].'<br/>';//login
echo $resultatlevel1[0][2].'<br/>';//id_utilisateur



$m=0;
$ptstime=0;
if(!empty($resultatlevel1 and $resultatlevel1[0][1]!='oui')){
    $utilise='oui';
$connexion=mysqli_connect('localhost','root','','memory');
$requete2="UPDATE besttime SET utilise='".$utilise."' WHERE login='".$_SESSION['login']."' and  level='".$levelbis2."'";
$query2=mysqli_query($connexion,$requete2);

    while($m<count($resultatlevel1)){
        $ptstime=$ptstime+$resultatlevel1[$m][0];
        ++$m;
    }
}
else{
    $ptstime=0;
}


// REQUETE POINTS BESTTENTATIVE
$connexion=mysqli_connect('localhost','root','','memory');
$requete1="SELECT points,utilise,id_utilisateur,login FROM besttentative WHERE level='".$levelbis2."' ORDER BY points DESC";
$query1=mysqli_query($connexion,$requete1);
$resultatlevel2=mysqli_fetch_all($query1);
// var_dump($resultatlevel2);
$p=0;

if(!empty($resultatlevel2) and $resultatlevel2[0][1]!='oui'){
    $utilise='oui';
    $connexion=mysqli_connect('localhost','root','','memory');
    $requete2="UPDATE besttentative SET utilise='".$utilise."' WHERE login='".$_SESSION['login']."' and  level='".$levelbis2."'";
    $query2=mysqli_query($connexion,$requete2);
    while($p<count($resultatlevel2)){
        $ptstentative=$ptstentative=$resultatlevel1[$p][0];
        ++$p;
    }
    $ptstentative=$resultatlevel2[0][0];
}
else{
    $ptstentative=0;
}

// BESTTENTATIVE + BESTTIME POUR TABLEAU SCORETOTAL
// if(isset($ptstentative) and isset($ptstime)){
//     $ptstotal=$ptstime+$ptstentative;

//     $connexion=mysqli_connect("Localhost",'root','','memory');
//     $requete0="SELECT points FROM bestscore WHERE login='".$_SESSION['login']."'";
//     $query0=mysqli_query($connexion,$requete0);
//     $resultat0=mysqli_fetch_all($query0);

//     echo 'Résultat tableau BESTSCORE : '.$resultat0[0][0].'<br/>';
//     $ptstotalstocké=$resultat0[0][0];
//     $ptstotal=$ptstotal+$ptstotalstocké;

//     $requete="UPDATE bestscore SET points='".$ptstotal."' WHERE login='".$_SESSION['login']."' and level='".$levelbis2."' ";
//     $query=mysqli_query($connexion,$requete);
// }

echo 'Points time : '.$ptstime.'<br/>';
echo 'Points tentative '.$ptstentative.'<br/>';
echo 'Points Totals : '.$ptstotal.'<br/>';


    $connexion=mysqli_connect('localhost','root','','memory');
    $requete2="SELECT login,points FROM bestscore WHERE level='".$levelbis2."' ORDER BY points DESC";
    $query2=mysqli_query($connexion,$requete2);
    $resultatlevel3=mysqli_fetch_all($query2);
    $l=0;
    
    
while ($n<=10){
    // $resultatlevel3[0][0];//Login
    // $resultatlevel3[0][1];//points
    while($l<count($resultatlevel3) and $n<=10){
        $ptstotal=$resultatlevel3[$l][1];
        $ptstotal = number_format($ptstotal,1);

        echo '<tr><td>'.'N°'.$n.'</td><td><b>'.ucfirst($resultatlevel3[$l][0]).'</b></td><td><b>'.$ptstotal.'</b> pts '.'</td></tr>';
        ++$l;
        ++$n;
    }
    if($l==count($resultatlevel3)){
        echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$points'.'</td></tr>';
        ++$n;

    }
}?>
    </table>
</section>

<?php

?>

</html>
