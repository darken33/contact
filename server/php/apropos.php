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
<head>
  <title>A Propos</title>
</head>
<script language="JavaScript">
    function soumettre(texte) 
    {
          document.all.action.value=texte;
          form1.submit();
    }
</script>
<body text="#000000" background="imgs/background.jpg" link="blue" alink="blue" vlink="blue">
<form name="form1" action="apropos_get.php" method="POST">
<?
   require("autorisation.php");
   if ($login=="root")
   {
     require("login.php");
     exit;
   }
   echo "<input type=\"hidden\" name=\"login\" value=\"$login\" /><input type=\"hidden\" name=\"passwd\" value=\"$passwd\">";
?>
  <input type="hidden" name="action" value="" />
  <table width="100%" height="100%" border=0>
    <tr align="center " valign="center">
      <td align="center" valign="center">
        <table width="60%" align="center" bgcolor="darkCyan">
          <tr>
            <td><font color="red" size=+2><div align="left"><i><b>CONTACT v0.1.2</b></i></div></font></td>
          </tr>
          <tr>
            <td><hr></td>
          </tr>
          <tr>
            <td><div align="center"><font color="yellow">Carnet d'adresses</font></div></td>
          </tr>
          <tr>
            <td><hr></td>
          </tr>
          <tr>
            <td><div align="left"><font color="cyan">Développé par Philippe BOUSQUET</font></div></td>
          </tr>
          <tr>
            <td><div align="left"><font color="cyan">Distribué sous licence GPL</font></div></td>
          </tr>
          <tr>
            <td><div align="left"><font color="cyan">e-mail: <a href="mailto:darken@tuxfamily.org">darken@tuxfamily.org</a></font></div></td>
          </tr>
          <tr>
            <td><div align="left"><font color="cyan">site: <a href="http://darken.tuxfamily.org" onclick="open('http://darken.tuxfamily.org','http://darken.tuxfamily.org');">http://darken.tuxfamily.org</a></font></div></td>
          </tr>
          <tr>
            <td><hr></td>
          </tr>
          <tr>
            <td><div align="center">Copyright (c) 2002 - Philippe BOUSQUET</div></td>
          </tr>
          <tr>
            <td><hr></td>
          </tr>
          <tr>
            <td align="center"><img src="imgs/retour.jpg" width=80 height=25 border=0 onClick="soumettre('Retour')"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
