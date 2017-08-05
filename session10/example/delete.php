<?php 
require_once 'users_model.php';

$users = new UsersModel();

$id = $_GET['id'];

if(!is_null($id)){

	$users->deleteUser($id);
	
	echo "ID deleted";

}else{
	echo "No exist ID";
}

?>