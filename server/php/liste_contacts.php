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
  <title>Liste des contacts</title>
  <script language="JavaScript">
    function selectionne(Num)
    {
      document.all.cident.value=Num;
      //document.all.Detail.onClick="soumettre('Detail')";
    }

    function soumettre(texte) 
    {
        if ((texte!="Detail") || (document.all.cident.value!=""))
        {
          document.all.action.value=texte;
          form1.submit();
        }
        else alert("Veuillez d'abord sélectionner un contact");
    }
    
    function aide(topic)
    {
      open("help/index.html#"+topic,"Aide");
    }
  </script>
</head>
<body background="imgs/background.jpg" text="#000000" bgcolor="#ffd89d" link="blue" alink="blue" vlink="blue">
<form name="form1" action="liste_contacts_get.php" method="POST">
  <input type="hidden" name="action" value="">
  <input type="hidden" name="cident" value="">
  <table width="100%" border=1>
    <tr align="center " valign="center">
      <td width="100%" align="center" valign="center"><font size="+3"><b>LISTE DES CONTACTS</b></font></td>
    </tr>
  </table>
<?
  echo "connecté: <b>$login</b> <input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"passwd\" value=\"$passwd\">";
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
?>
  <p>&nbsp;</p>
  <table width="100%" height="70%"  border=0>
    <tr>
      <td width="80%" align="center" valign="top">
        <table width="100%">
          <!-- entete -->
          <th bgcolor="#b1b1b1">&nbsp;</th>
          <th align="center" valign="center" bgcolor="#b1b1b1">Nom</th>
          <th align="center" valign="center" bgcolor="#b1b1b1">Ville</th>
          <th align="center" valign="center" bgcolor="#b1b1b1">Telephone</th>
          <th align="center" valign="center" bgcolor="#b1b1b1">E-mail</th>
          <!-- lignes -->
          <tbody>
<?
   $i=0;
   if ($_nom=="") $_nom="%";
   if ($_prenom=="") $_prenom="%";
   if ($_pseudo=="") $_pseudo="%";
   if ($_nature=="") $_nature="%";
   if ($_type=="") $_type="%";
   if ($_ville=="") $_ville="%";
   $result=mysql_query("SELECT * FROM contact.contacts WHERE cuser='$login' AND nom LIKE '$_nom' AND prenom LIKE '$_prenom' AND pseudo LIKE '$_pseudo' AND nature LIKE '$_nature' AND type LIKE '$_type' AND ville LIKE '$_ville';",$dbh);
   while ($row = mysql_fetch_assoc($result))
   {
     if ($i==0)
     {
       echo "<tr bgcolor=\"lightGray\">";
       $i=1;
     }
     else
     {
       echo "<tr bgcolor=\"#b1b1b1\">";     
       $i=0;
     }
     $pseudo=$row["pseudo"];
     $nom=$row["nom"];
     $prenom=$row["prenom"];
     $ville=$row["ville"];
     $tel1=$row["telpor"];
     $tel2=$row["teldom"];
     $tel3=$row["telbur"];
     $mail1=$row["empers"];
     $mail2=$row["emprof"];
     $ident=$row["ident"];
     if ($pseudo=="")
     {
       $pseudo=$nom." ".$prenom;
     }
     if ($tel1=="")
     {
       $tel1=$tel2;
     }
     if ($tel1=="")
     {
       $tel1=$tel3;
     }
     if ($mail1=="")
     {
       $mail1=$mail2;
     }
     if ($tel1=="")
     {
       $tel="&nbsp;";
     }
     if ($mail1=="")
     {
       $mail1="&nbsp;";
     }  
     echo "<td align=\"center\"><input type=\"radio\" name=\"selec\" value=\"O\" onClick=\"selectionne('$ident')\">"; 
     echo "<td align=\"left\" valign=\"center\">$pseudo</td>";
     echo "<td align=\"left\" valign=\"center\">$ville</td>";
     echo "<td align=\"left\" valign=\"center\">$tel1</td>";
     echo "<td align=\"left\" valign=\"center\"><a href=\"mailto:$mail1\">$mail1</a></td>";
     echo "</tr>";
   }
   mysql_free_result($result);
   mysql_close($dbh);
?>
          </tbody>
        </table>
      </td>
      <td width="5%" align="center">&nbsp;</td>
      <td width="15%" align="center" valign="top" bgcolor="darkCyan">
        <table width="100%" align="center" bgcolor="darkCyan">
          <tr align="center " valign="center">
            <td align="center" valign="center"><img src="imgs/detail.jpg" name="Detail" onClick="soumettre('Detail')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/nouveau.jpg" name="Nouveau" onClick="soumettre('Nouveau')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/chercher.jpg" name="Chercher" onClick="soumettre('Chercher')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/password.jpg" name="Password" onClick="soumettre('Password')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/aide.jpg" name="Aide" onClick="aide('LISTE')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/apropos.jpg" name="APropos" onClick="soumettre('Apropos')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/quitter.jpg" name="Quitter" onClick="soumettre('Quitter')" /></td>
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
