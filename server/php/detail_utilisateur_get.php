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
?>
<?
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
  $cuser=htmlspecialchars($cuser);
  $cpasswd=htmlspecialchars($cpasswd);
  if ($action == "Modifier")
  {
    mysql_query("UPDATE contact.users SET passwd='$cpasswd' WHERE cuser='$cuser';",$dbh);
    if ($login==$cuser) $passwd=$cpasswd;
  }
  elseif ($action == "Creation")
  {
    mysql_query("INSERT INTO contact.users VALUES ('$cuser','$cpasswd');",$dbh);
  }
  if ($login == "root")
  {
    require("liste_utilisateurs.php");
  }
  else
  {
    require("liste_contacts.php");
  }
?>

