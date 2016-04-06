<!--
* 01/02/2002 - 04:01:45
*
* Contact - Gestionnaire de contacts
* Copyright (C) 2002 Philippe BOUSQUET
* e-mail: Darken@tuxfamily.org
* site: http://darken.tuxfamily.org
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
-->
<?
   require("autorisation.php");
   if ($login=="root")
   {
     require("login.php");
     exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
  <title>Detail Contact</title>
</head>
<body background="imgs/background.jpg" text="#000000" bgcolor="#ffd89d" link="blue" alink="blue" vlink="blue">
<form name="form1" action="detail_contact_get.php" method="POST">
<script language="JavaScript">
function controler()
{      
  var cok=true;
  if (document.all.nom.value=="")
  {
    alert("Le nom du contact est obligatoire");
    cok=false;
  }
  else if ((document.all.cdpost.value!="") && ((document.all.cdpost.value.length<5) || (isNaN(parseInt(document.all.cdpost.value,10))) || (parseInt(document.all.cdpost.value,10)==0)))
  {
    alert("Le code postal est invalide");
    cok=false;    
  }
  else if ((document.all.jjnais.value!="") && ((isNaN(parseInt(document.all.jjnais.value,10))) || (parseInt(document.all.jjnais.value,10)>31) || (parseInt(document.all.jjnais.value,10)<1) || (document.all.mmnais.value=="") || (document.all.aanais.value=="")))
  {
    alert("La date de naissance est invalide");
    cok=false;    
  }
  else if ((document.all.mmnais.value!="") && ((isNaN(parseInt(document.all.mmnais.value,10))) || (parseInt(document.all.mmnais.value,10)>12) || (parseInt(document.all.mmnais.value,10)<1) || (document.all.jjnais.value=="") || (document.all.aanais.value=="")))
  {
    alert("La date de naissance est invalide");
    cok=false;    
  }
  else if ((document.all.aanais.value!="") && ((isNaN(parseInt(document.all.aanais.value,10))) || (parseInt(document.all.aanais.value,10)<1800) || (document.all.mmnais.value=="") || (document.all.jjnais.value=="")))
  {
    alert("La date de naissance est invalide");
    cok=false;    
  }
  else if (document.all.ville.value=="")
  {
    alert("La ville est obligatoire");
    cok=false;
  }
  else if ((document.all.teldom.value!="") && ((document.all.teldom.value.length<10) || (isNaN(parseInt(document.all.teldom.value,10))) || (parseInt(document.all.teldom.value,10)==0)))
  {
    alert("Le telephone personnel est invalide");
    cok=false;
  }
  else if ((document.all.telbur.value!="") && ((document.all.telbur.value.length<10) || (isNaN(parseInt(document.all.telbur.value,10))) || (parseInt(document.all.telbur.value,10)==0)))
  {
    alert("Le telephone professionnel est invalide");
    cok=false;
  }
  else if ((document.all.telpor.value!="") && ((document.all.telpor.value.length<10) || (isNaN(parseInt(document.all.telpor.value,10))) || (parseInt(document.all.telpor.value,10)==0)))
  {
    alert("Le telephone portable est invalide");
    cok=false;
  }
  else if ((document.all.fax.value!="") && ((document.all.fax.value.length<10) || (isNaN(parseInt(document.all.fax.value,10)) || (parseInt(document.all.fax.value,10)==0))))
  {
    alert("Le numero de fax est invalide");
    cok=false;
  }
  document.all.dnaiss.value=document.all.aanais.value+"-"+document.all.mmnais.value+"-"+document.all.jjnais.value;
  document.all.nom.value=document.all.nom.value.toUpperCase();
  document.all.prenom.value=document.all.prenom.value.toLowerCase();
  document.all.pseudo.value=document.all.pseudo.value.toLowerCase();
  document.all.ville.value=document.all.ville.value.toUpperCase();
  return cok;
}

function supprimer()
{
  if (confirm("Etes vous sur de vouloir supprimer ce Contact ?"))
  {
    document.all.action.value="Supprimer";
    form1.submit();
  }
}

function modifier()
{
  if (controler() && confirm("Etes vous sur de vouloir modifier ce Contact ?"))
  {
    document.all.action.value="Modifier";
    form1.submit();
  }
}

function creation()
{
  if (controler())
  {        
    document.all.action.value="Creation";
    form1.submit();
  }  
}

function retour()
{
  document.all.action.value="Retour";
  form1.submit();
}

    function aide(topic)
    {
      open("help/index.html#"+topic,"Aide");
    }
</script>
<?
  echo "<input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"passwd\" value=\"$passwd\">";
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
  $ident="";
  $cuser=$login;
  $nom="";
  $prenom="";
  $pseudo="";
  $dnaiss="";
  $nature="";
  $type="";
  $adresse1="";
  $adresse2="";
  $cdpost="";
  $ville="";
  $telpor="";
  $teldom="";
  $telbur="";
  $fax="";
  $empers="";
  $emprof="";
  if ($mode==0)
  {
    $result=mysql_query("SELECT * FROM contact.contacts WHERE ident='$cident' AND cuser='$login';",$dbh);
    if ($row = mysql_fetch_assoc($result))
    {
      $ident=$row["ident"];
      $cuser=$row["cuser"];
      $nom=$row["nom"];
      $prenom=$row["prenom"];
      $pseudo=$row["pseudo"];
      $dnaiss=$row["dnaiss"];
      $nature=$row["nature"];
      $type=$row["type"];
      $adresse1=$row["adresse1"];
      $adresse2=$row["adresse2"];
      $cdpost=$row["cdpost"];
      $ville=$row["ville"];
      $telpor=$row["telpor"];
      $teldom=$row["teldom"];
      $telbur=$row["telbur"];
      $empers=$row["empers"];
      $emprof=$row["emprof"];
      $fax=$row["fax"];
    }
    mysql_free_result($result);
  }  
  $naiss=explode("-",$dnaiss);
  $jjnais=$naiss[2];
  $mmnais=$naiss[1];
  $aanais=$naiss[0];
  if ($jjnais=="00") $jjnais="";
  if ($mmnais=="00") $mmnais="";
  if ($aanais=="0000") $aanais="";
  mysql_close($dbh);  
  echo "<input type=\"hidden\" name=\"cuser\" value=\"$cuser\">";
  echo "<input type=\"hidden\" name=\"ident\" value=\"$ident\">";
?>
  <input type="hidden" name="action" value="">
  <input type="hidden" name="dnaiss" value="">
  <table width="100%" border=1>
    <tr>
      <td align="center" valign="center"><font size="+3"><b>
<?
  if ($mode==0) echo "DETAIL ";
  else echo "NOUVEAU ";
?>  
  CONTACT</b></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" height="70%">
    <tr>
      <td width="80%" valign="top">
        <table width="100%">
          <tr>
            <td align="right"><b>Nom</b></td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"nom\" value=\"$nom\" size=15 maxlength=25 alt=\"Nom de la personne ou de la société\"></td>";
?>
            <td align="right">Prenom</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"prenom\" value=\"$prenom\" size=15 maxlength=25 alt=\"Prenom de la personne\"></td>";
?>            
          </tr>
          <tr>
            <td align="right">Date naissance</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"jjnais\" value=\"$jjnais\" size=2 maxlength=2 alt=\"Jour de naissance\">/<input type=\"text\" name=\"mmnais\" value=\"$mmnais\" size=2 maxlength=2 alt=\"Mois de naissance\">/<input type=\"text\" name=\"aanais\" value=\"$aanais\" size=4 maxlength=4 alt=\"Annee de naissance\"></td>";
?>
            <td align="right">Pseudonyme</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"pseudo\" value=\"$pseudo\" size=10 maxlength=15 alt=\"Pseudonime / Nickname\"></td>";
?>
            </tr>
          <tr>
            <td align="right">Nature</td>
            <td align="left">
              <select name="nature">
                <option></option>
<?
            if ($nature==1)
            {
              echo "<option value=\"1\" selected>Homme</option>";
            }  
            else
            {
              echo "<option value=\"1\">Homme</option>";
            }
?>
<?
            if ($nature==2)
            {
              echo "<option value=\"2\" selected>Femme</option>";
            }
            else
            {
              echo "<option value=\"2\">Femme</option>";
            }
?>
<?
            if ($nature==3)
            {
              echo "<option value=\"3\" selected>Société</option>";
            } 
            else
            {
              echo "<option value=\"3\">Société</option>";
            }
?>
              </select>
            </td>
            <td align="right">Nature contact</td>
            <td align="left">
              <select name="type">
                <option></option>
<?
            if ($type==1)
            {
              echo "<option value=\"1\" selected>Famille</option>";
            }
            else
            {
              echo "<option value=\"1\">Famille</option>";
            }
?>
<?
            if ($type==2)
            {
              echo "<option value=\"2\" selected>Amis</option>";
            }
            else
            {
              echo "<option value=\"2\">Amis</option>";
            }
?>
<?
            if ($type==3)
            {
              echo "<option value=\"3\" selected>Connaissance</option>";
            }
            else
            {
              echo "<option value=\"3\">Connaissance</option>";
            }
?>
<?
            if ($type==4)
            {
              echo "<option value=\"4\" selected>Professionnel</option>";
            }
            else
            {
              echo "<option value=\"4\">Professionnel</option>";
            }
?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="100%" colspan=4><hr></td>
          </tr>
          <tr>
            <td align="right">Adresse</td>
<?
            echo "<td colspan=3 align=\"left\"><input type=\"text\" name=\"adresse1\" value=\"$adresse1\" size=50 maxlength=128 alt=\"Adresse de la personne\"></td>";
?>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
<?
            echo "<td colspan=3 align=\"left\"><input type=\"text\" name=\"adresse2\" value=\"$adresse2\" size=50 maxlength=128 alt=\"Suite adresse de la personne\"></td>";
?>
          </tr>
          <tr>
            <td align="right">Code postal</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"cdpost\" value=\"$cdpost\" size=5 maxlength=5></td>";
?>
            <td align="right"><b>Ville</b></td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"ville\" value=\"$ville\" size=15 maxlength=20></td>";
?>
          </tr>
          <tr>
            <td width="100%" colspan=4><hr></td>
          </tr>
          <tr>
            <td align="right">Tel. domicile</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"teldom\" value=\"$teldom\" size=10 maxlength=10 alt=\"Telephone du domicile\"></td>";
?>
            <td align="right">e-mail</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"empers\" value=\"$empers\" size=20 maxlength=255 alt=\"E-mail personnel\"></td>";
?>
          </tr>
          <tr>
            <td align="right">Tel. bureau</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"telbur\" value=\"$telbur\" size=10 maxlength=10 alt=\"Telephone professionnel\"></td>";
?>
            <td align="right">e-mail</td>
<?
            echo "<td align=\"left\"><input type=\"text\" name=\"emprof\" value=\"$emprof\" size=20 maxlength=255 alt=\"E-mail professionnel\"></td>";
?>
          </tr>
          <tr>
            <td align="right">Tel. portable</td>
<?            
            echo "<td align=\"left\"><input type=\"text\" name=\"telpor\" size=10 maxlength=10 alt=\"Telephone portable\" value=\"$telpor\"></td>";
?>
            <td align="right">Fax</td>
<?            
            echo "<td align=\"left\"><input type=\"text\" name=\"fax\" size=10 maxlength=10 alt=\"Telephone portable\" value=\"$fax\"></td>";
?>
          </tr>
        </table>
      </td>
      <td width="5%" align="center">&nbsp;</td>
      <td width="15%" align="right" valign="top" bgcolor="darkCyan">
        <table width="100%" align="center" bgcolor="darkCyan">
          <tr align="center " valign="center">
<?
   if ($mode==1)
   {
     echo "<td align=\"center\" valign=\"center\"><img src=\"imgs/creation.jpg\" onClick=\"creation()\" /></td>";
   }
?>
<?
   if ($mode==0)
   {
     echo "<td align=\"center\" valign=\"center\"><img src=\"imgs/modifier.jpg\" onClick=\"modifier()\" /></td>";
     echo "</tr>";
     echo "<tr>";
     echo "<td align=\"center\" valign=\"center\"><img src=\"imgs/supprimer.jpg\" onClick=\"supprimer()\" /></td>";
   }
?>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
<?
  if ($mode==1)          
  {
    echo "<td align=\"center\" valign=\"center\"><img src=\"imgs/aide.jpg\" name=\"Aide\" onClick=\"aide('NOUVEAU')\" /></td>";
  }
  else
  {
    echo "<td align=\"center\" valign=\"center\"><img src=\"imgs/aide.jpg\" name=\"Aide\" onClick=\"aide('DETAIL')\" /></td>";
  }
?>          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/retour.jpg" onClick="retour()" /></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <hr>
  Copyright (c) 2002 - Philippe BOUSQUET, distribué sous licence GNU GENERAL PUBLIC LICENSE
</form>
</body>
</html>
