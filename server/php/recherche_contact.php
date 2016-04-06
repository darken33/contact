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
  <title>Recherche Contact</title>
</head>
<body background="imgs/background.jpg" text="#000000" link="blue" alink="blue" vlink="blue">
<form name="form1" action="recherche_contact_get.php" method="POST">
<script language="JavaScript">
function miseforme()
{
  document.all.nom.value=document.all.nom.value.toUpperCase();
  document.all.prenom.value=document.all.prenom.value.toLowerCase();
  document.all.pseudo.value=document.all.pseudo.value.toLowerCase();
  document.all.ville.value=document.all.ville.value.toUpperCase();
}

function soumettre(texte)
{
  if (texte=="Recherche") miseforme();
  document.all.action.value=texte;
  form1.submit();
}
    
    function aide(topic)
    {
      open("help/index.html#"+topic,"Aide");
    }
</script>
<?
   echo "<input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"passwd\" value=\"$passwd\">";
   echo "<input type=\"hidden\" name=\"cuser\" value=\"$login\">";
?>
  <table width="100%" border=1>
    <tr>
      <td width="100%" align="center" valign="center"><font size="+3"><b>RECHERCHE CONTACT</b></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <input type="hidden" name="action" value="" />
  <table width="100%" height="70%">
    <tr>
      <td width="80%" height="100%" valign="top">
        <table width="100%">
          <tr>
            <td align="right">Nom</td>
            <td align="left"><input type="text" name="nom" value="" size=15 maxlength=25 alt="Nom de la personne ou de la société"></td>
            <td align="right">Prenom</td>
            <td align="left"><input type="text" name="prenom" value="" size=15 maxlength=25 alt="Prenom de la personne"></td>
          </tr>
          <tr>
            <td align="right">Pseudonyme</td>
            <td align="left"><input type="text" name="pseudo" value="" size=10 maxlength=15 alt="Pseudonime / Nickname"></td>
            <td align="right">Ville</td>
            <td align="left"><input type="text" name="ville" value="" size=15 maxlength=20></td>
          </tr>
          <tr>
            <td align="right">Nature</td>
            <td align="left">
              <select name="nature">
                <option></option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
                <option value="3">Société</option>
              </select>
            </td>
            <td align="right">Nature contact</td>
            <td align="left">
              <select name="type">
                <option></option>
                <option value="1">Famille</option>
                <option value="2">Amis</option>
                <option value="3">Connaissance</option>
                <option value="4">Professionnel</option>
              </select>
            </td>
          </tr>
        </table>
      </td>
      <td width="5%" height="100%">&nbsp;</td>
      <td width="15%" height="100%" align="right" bgcolor="darkCyan" valign="top">
        <table width="100%" align="center" bgcolor="darkCyan">
          <tr align="center " valign="center">
            <td align="center" valign="center"><img src="imgs/chercher.jpg" onClick="soumettre('Recherche')" /></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/aide.jpg" name="Aide" onClick="aide('CHERCHER')"></td>
          </tr>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center"><img src="imgs/retour.jpg" onClick="soumettre('Retour')" /></td>
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
