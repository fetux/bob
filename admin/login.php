<?php 
session_start();
	if (isset($_POST['user'])) {
		if ($_POST['user']=='bobmilanga') {
			if ($_POST['passwd']=='milanesa') {
				$_SESSION['logueado']='ok';
				echo 'logueado';
			}
			else{
				echo 'error passwd';
			}
		}
		else {
			echo 'error login';
		}
	}
?>