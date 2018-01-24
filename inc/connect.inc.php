<?php

@mysql_connect("localhost", "root", "")  or die("Couldn't Connect to DB");
@mysql_select_db("login&reg") or die("Couldn't select to DB");

?>