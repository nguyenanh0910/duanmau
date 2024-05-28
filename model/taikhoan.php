<?php
function insert_taikhoan($email, $user, $pass)
{
	$sql = "INSERT INTO `taikhoan` (`email`, `user`, `pass`) VALUES ('{$email}', '{$user}', '{$pass}')";
	pdo_execute($sql);
}
function checkuser($user, $pass)
{
	$sql = "SELECT *FROM `taikhoan` WHERE user='". $user ."' and pass='". $pass ."'";
	$user = pdo_query_one($sql);
	return $user;
}
function checkemail($email)
{
	$sql = "SELECT *FROM `taikhoan` WHERE email='". $email ."'";
	$user = pdo_query_one($sql);
	return $user;
}
function update_user($id, $user, $pass, $email, $tel, $address)
{
	$sql = "UPDATE `taikhoan` SET `user` = '{$user}', `pass` = '{$pass}', `email` = '{$email}', `tel` = '{$tel}', `address` = '{$address}' WHERE `taikhoan`.`id` = {$id}";
	pdo_execute($sql);
}
?>