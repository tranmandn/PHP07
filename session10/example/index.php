<?php 
require_once 'users_model.php';

$users = new UsersModel();

$listUsers = $users->selectUser();

foreach($listUsers as $listUser){
	
	echo $listUser->id.' - '.$listUser->name.' - '.$listUser->username.' - '.$listUser->password. '<br>';

}
?>