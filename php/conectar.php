<?php
$sql = new mysqli('localhost', 'root', '', 'mamaezona');
if (false === $sql->set_charset('utf8')) {
	printf('Error ao usar utf8: %s', $mysqli->error);
}
