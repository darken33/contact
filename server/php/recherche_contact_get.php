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
  if ($action == "Recherche")
  {
    $_nom=$nom;
    $_prenom=$prenom;
    $_pseudo=$pseudo;
    $_nature=$nature;
    $_type=$type;
    $_ville=$ville;
    require("liste_contacts.php");
  }
  else
  {
    $_nom="%";
    $_prenom="%";
    $_pseudo="%";
    $_nature="%";
    $_type="%";
    $_ville="%";
    require("liste_contacts.php");
  }
?>

