<?php
	function m2h($s) {
		return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
	}
	
	$veza = new PDO("mysql:dbname=wt_vijecemladih;host=localhost;charset=utf8", "vijecemladih", "sarajevo");
	$veza->exec("set names utf8");
?>