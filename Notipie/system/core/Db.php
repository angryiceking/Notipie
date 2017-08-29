<?php
class Db
{
	public function connect()
	{
		$h = 'localhost';
		$u = 'root';
		$p = '';
		$db = 'messages';
		
		return mysqli_connect($h, $u, $p, $db);
	}
}