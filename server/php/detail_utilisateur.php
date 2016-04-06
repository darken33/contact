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
   if (($login!="root") && ($login!=$cuser) && ($mode!=0))
   {
     require("login.php");
     exit;
   }
?>
<head>
  <title>Modifier Mot de Passe</title>
</head>
<script language="JavaScript">
    function controler()
    {
      var cok=true;
      if (document.all.cuser.value=="")
      {
        cok=false;
        alert("Le code utilisateur est obligatoire");
      }
      else if (document.all.cpasswd.value!=document.all.vpasswd.value)
      {
        cok=false;
        document.all.vpasswd.value="";
        alert("Le mot de passe est invalide");
      }
      else if (document.all.cpasswd.value=="") cok=confirm("ATTENTION : Aucun mot de passe n'a été saisi, continuer ?");
      if (cok) document.all.cuser.disabled=false;
      return cok;
    }
    
    function soumettre(texte) 
    {
      if (texte!="Retour")
      {
        if (controler())
        {
          document.all.action.value=texte;
          form1.submit();
        }  
      }
      else
      {
        document.all.action.value=texte;
        form1.submit();
      }
    }
    
    function aide(topic)
    {
      open("help/index.html#"+topic,"Aide");
    }
</script>
<body text="#000000" background="imgs/background.jpg" bgcolor="#FFD89D" link="blue" alink="blue" vlink="blue">
<form name="form1" action="detail_utilisateur_get.php" method="POST">
<?
  echo "<input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"passwd\" value=\"$passwd\"><input type=\"hidden\" name=\"action\" value=\"\" />";
?>
  <table width="100%" border=1>
    <tr>
      <td align="center" valign="center"><font size="+3"><b>
<?
   if ($mode==1) echo "NOUVEL UTILISATEUR";
   else echo "MODIFIER MOT DE PASSE";
?>
      </b></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" height="70%">
    <tr>
      <td width="80%" valign="top" align="center">
        <table>
          <tr align="center">
            <td>&nbsp;</td>
            <td align="right"><b>Utilisateur</b></td>
<?
   if ($mode==0)
   {
      echo "<td align=\"left\"><input disabled type=\"text\" name=\"cuser\" value=\"$cuser\" size=10 maxlength=10 alt=\"Code utilisateur\"></td>";
   }
   else
   {
      echo "<td align=\"left\"><input type=\"text\" name=\"cuser\" value=\"\" size=10 maxlength=10 alt=\"Code utilisateur\"></td>";
   }
?>
          </tr>
          <tr>
            <td colspan=3>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Nouveau Password</td>
            <td align="left"><input type="password" name="cpasswd" value="" size=10 maxlength=10 alt="Mot de passe Utilisateur"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Verification Password</td>
            <td align="left"><input type="password" name="vpasswd" value="" size=10 maxlength=10 alt="Verification mot de passe"></td>
          </tr>
        </table>
      </td>
      <td width="5%" align="center">&nbsp;</td>
      <td width="15%" align="right" valign="top" bgcolor="darkCyan">
        <table width="100%" align="center" bgcolor="darkCyan">
          <tr>
          <td align="center" valign=center>
<?
  if ($mode==1)
  {
    echo "<img src=\"imgs/creation.jpg\" name=\"Creation\" onClick=\"soumettre('Creation')\">";
  }
  else  
  {
    echo "<img src=\"imgs/modifier.jpg\" name=\"Modifier\" onClick=\"soumettre('Modifier')\">";
  }
?>
            </td>
          <tr>
            <td align="center" valign="center"><hr></td>
          </tr>
          <tr>
            <td align="center" valign="center">
<?
   if ($login!="root") echo "<img src=\"imgs/aide.jpg\" name=\"Aide\" onClick=\"aide('MOTPASSE')\">";
   else if ($mode==1) echo "<img src=\"imgs/aide.jpg\" name=\"Aide\" onClick=\"aide('CREERUTIL')\">";
   else echo "<img src=\"imgs/aide.jpg\" name=\"Aide\" onClick=\"aide('MODIFUTIL')\">";
?>
            </td>
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
