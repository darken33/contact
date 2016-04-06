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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<?
   require("autorisation.php");
   if ($login!="root")
   {
     require("login.php");
     exit;
   }
?>
<?
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
?>

<head>
  <title>Liste des utilisateurs</title>
</head>
  <script language="JavaScript">
    function selectionne(Num)
    {
      document.all.cuser.value=Num;
    }

    function soumettre(texte) 
    {
        if (((texte!="Modifier") && (texte!="Supprimer")) || (document.all.cuser.value!=""))
        {
          if ((texte=="Supprimer") && (document.all.cuser.value=="root"))
          {
            alert("Vous ne pouvez supprimer l'administrateur");
          }
          else if ((texte!="Supprimer") || (confirm("Etes vous sur de vouloir supprimer cet Utilisateur ?")))
          {
            document.all.action.value=texte;
            form1.submit();
          }  
        }
        else alert("Veuillez d'abord sélectionner un utilisateur");
    }
    
    function aide(topic)
    {
      open("help/index.html#"+topic,"Aide");
    }
  </script>
<body text="#000000" background="imgs/background.jpg" link="blue" alink="blue" vlink="blue">
  <form name="form1" action="liste_utilisateurs_get.php" method="POST">
  <input type="hidden" name="action" value="">
  <input type="hidden" name="cuser" value="">
<table width="100%" border=1>
    <tr align="center " valign="center">
      <td width="100%" align="center" valign="center"><font size="+3"><b>LISTE DES UTILISATEURS</b></font></td>
    </tr>
  </table>
<?
  echo "connecté: <b>$login</b> <input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"passwd\" value=\"$passwd\">";
?>
  <p>&nbsp;</p>
  <table width="100%" height="70%"  border=0>
    <tr>
      <td width="80%" align="center" valign="top">
        <table width="100%">
          <!-- entete -->
          <th align="center" valign="center" bgcolor="#b1b1b1">&nbsp;</th>
          <th align="center" valign="center" bgcolor="#b1b1b1">Code Utilisateur</th>
          <!-- lignes -->
          <tbody>
<?
   $i=0;
   $result=mysql_query("SELECT * FROM contact.users",$dbh);
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
     $cuser=$row["cuser"];
     echo "<td align=\"center\"><input type=\"radio\" name=\"selec\" value=\"O\" onClick=\"selectionne('$cuser')\">"; 
     echo "<td align=\"left\" valign=\"center\">$cuser</td>";
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
            <td align="center" valign="center"><img src="imgs/nouveau.jpg" name="Nouveau" onClick="soumettre('Nouveau')"></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/modifier.jpg" name="Modifier" onClick="soumettre('Modifier')"></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/supprimer.jpg" name="Supprimer" onClick="soumettre('Supprimer')"></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/aide.jpg" name="Supprimer" onClick="aide('LISTEUTIL')"></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/quitter.jpg" name="Quitter" onClick="soumettre('quitter')"></a></td>
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
