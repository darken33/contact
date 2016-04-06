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
  <title>Login</title>
</head>
<body background="imgs/background.jpg" bgcolor="#ffd89d" text="#000000" link="blue" alink="blue" vlink="blue">
<script language="JavaScript">
function glogin()
{
  document.all.action.value="Login";
  document.form1.submit();
}
</script>
<?
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
  if (!$dbh)
  {
    echo "<font color=\"#FF0000\"><b>ERREUR !</b><br>
    Impossible de se connecter à la base de données $Database.</font></body></html>";
    exit;
  }
  else
  {
    $dbh=mysql_select_db($Database);
    if (!$dbh)
    {
      echo "<font color=\"#FF0000\"><b>ERREUR !</b><br>
      Impossible de se connecter à la base de données $Database.</font></body></html>";
      exit;
    }
//    mysql_close($dbh);
  }
?>
<form name="form1" action="login_get.php" method="POST">
  <input type="hidden" name="action" value="">
  <table width="100%" border=1 align="center">
    <tr>
      <td><font size="+3"><center><b>LOGIN</b></center></font></td>
    </tr>
  </table>
  <table width="100%" height="80%" border=0 align="center">
    <tr align="center " valign="center">
      <td align="center" valign="center">
      <table width="40%" align="center" bgcolor="darkCyan">
        <tr align="center " valign="center">
          <td colspan=2 width="100%" align="center" valign="center">Connectez vous...</td>
        </tr>
        <tr align="center " valign="center">
          <td colspan=2 align="center"><hr></td>
        </tr>
        <tr align="center " valign="center">
          <td colspan=2 align="center" valign="center">&nbsp;</td>
        </tr>
        <tr align="center " valign="center">
          <td align="right" valign="center"><b>Login</b></td>
          <td align="center" valign="center"><input type="text" name="login" size=10 maxlength=10 alt="Nom d'utilisateur" tabindex=1 align="middle" value=""></td>
        </tr>
        <tr align="center " valign="center">
          <td align="right" valign="center"><b>Password</b></td>
          <td align="center" valign="center"><input type="password" name="passwd" size=10 maxlength=10 alt="Mot de passe" tabindex=2 value=""></td>
        </tr>
        <tr align="center " valign="center">
          <td colspan=2 align="center" valign="center">&nbsp;</td>
        </tr>
        <tr align="center " valign="center">
          <td colspan=2 align="center"><hr></td>
        </tr>
        <tr align="center " valign="center">
          <td colspan=2 align="center" valign="center"><img src="imgs/connecter" onClick="glogin()"></td>
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
