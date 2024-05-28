<?php
function insert_sanpham($tensp, $giasp, $anhsp, $motasp, $loaisp)
{
	$sql = "INSERT INTO `product` (`name_pro`, `price_pro`, `img_pro`, `mota_pro`, `id_cate`) VALUES ('{$tensp}', '{$giasp}', '{$anhsp}','{$motasp}', '{$loaisp}')";
	pdo_execute($sql);
}

function delete_sanpham($id_pro)
{
	$sql = "DELETE FROM product WHERE `product`.`id_pro` = {$_GET['id_pro']}";
	pdo_query($sql);
}
function loadAll_sanpham_top10()
{
	$sql = "SELECT * FROM `product` WHERE 1 ORDER BY `product`.`view_pro` DESC limit 0,10";
	$listsp = pdo_query($sql);
	return $listsp;
}
function loadAll_sanpham_home()
{
	$sql = "SELECT * FROM `product` WHERE 1 ORDER BY `product`.`id_pro` DESC limit 0,9";
	$listsp = pdo_query($sql);
	return $listsp;
}
function loadAll_sanpham($key = "", $loaisp = 0)
{
	$sql = "SELECT * FROM `product` INNER JOIN `categories` ON `product`.`id_cate` = `categories`.`id_cate` WHERE 1";
	if ($key != "") {
		$sql .= " AND `product`.`name_pro` LIKE '%" . $key . "%'";
	}
	if ($loaisp > 0) {
		$sql .= " AND `product`.`id_cate` = '" . $loaisp . "'";
	}
	$sql .= " ORDER BY `product`.`id_pro` DESC";
	$listsp = pdo_query($sql);
	return $listsp;
}
function load_ten_dm($loaisp)
{
	if ($loaisp > 0) {
		$sql = "SELECT *FROM `categories` WHERE `categories`.`id_cate` = {$_GET['iddm']}";
		$dm = pdo_query_one($sql);
		extract($dm);
		return $name_cate;
	} else {
		return "";
	}

}
function loadOne_sanpham($id_pro)
{
	$sql = "SELECT *FROM `product` WHERE `product`.`id_pro` = {$_GET['id_pro']}";
	$editsp = pdo_query_one($sql);
	return $editsp;
}

function loadOne_sanphamct($id_pro)
{
	$sql = "SELECT *FROM `product` WHERE `product`.`id_pro` = {$_GET['idsp']}";
	$sp = pdo_query_one($sql);
	return $sp;
}
function load_sanpham_cungloai($id_pro, $id_cate)
{
	$sql = "SELECT *FROM `product` WHERE id_cate=" . $id_cate . " and `product`.`id_pro` <> {$_GET['idsp']}";
	$listsp = pdo_query($sql);
	return $listsp;
}
function update_sanpham($id, $tensp, $giasp, $anhsp, $motasp, $loaisp)
{
	$sql = "UPDATE `product` SET `name_pro` = '{$tensp}', `price_pro` = '{$giasp}', `img_pro` = '{$anhsp}', `mota_pro` = '{$motasp}', `id_cate` = '{$loaisp}' WHERE `product`.`id_pro` = {$id}";
	pdo_execute($sql);
}

?>