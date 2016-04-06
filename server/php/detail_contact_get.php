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
<?
  require("config.php");
  $dbh=mysql_connect($Location, $User, $Passwd);
  if ($action == "Creation")
  {
    mysql_query("INSERT INTO contact.contacts VALUES ('$ident','$cuser','$nom','$prenom','$dnaiss','$pseudo','$nature','$type','$adresse1','$adresse2','$cdpost','$ville','$teldom','$empers','$telbur','$emprof','$telpor','$fax');",$dbh);
    require("liste_contacts.php");
  }
  elseif ($action == "Modifier")
  {
    mysql_query("UPDATE contact.contacts SET fax='$fax',nom='$nom',prenom='$prenom',dnaiss='$dnaiss',pseudo='$pseudo',nature='$nature',type='$type',adresse1='$adresse1',adresse2='$adresse2',cdpost='$cdpost',ville='$ville',teldom='$teldom',empers='$empers',telbur='$telbur',emprof='$emprof',telpor='$telpor' WHERE ident='$ident' AND cuser='$cuser';",$dbh);
    require("liste_contacts.php");
  }
  elseif ($action == "Supprimer")
  {
    mysql_query("DELETE FROM contact.contacts WHERE ident='$ident' AND cuser='$cuser';",$dbh);
    require("liste_contacts.php");
  }
  else
  {
    require("liste_contacts.php");
  }
?>

