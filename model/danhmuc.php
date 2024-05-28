<?php
function check_duplicate_danhmuc($tenloai)
{
	// Kết nối đến cơ sở dữ liệu
	$pdo = pdo_get_connection();

	// Truy vấn kiểm tra tên loại đã tồn tại chưa
	$sql = "SELECT COUNT(*) FROM `categories` WHERE `name_cate` = :tenloai";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':tenloai' => $tenloai]);
	$count = $stmt->fetchColumn();

	// Trả về true nếu tên loại đã tồn tại, ngược lại trả về false
	return ($count > 0) ? true : false;
}
function insert_danhmuc($tenloai)
{
	$sql = "INSERT INTO `categories` (`name_cate`) VALUES ('{$tenloai}')";
	pdo_execute($sql);
}
function delete_danhmuc($id_cate)
{
	$sql_product = "DELETE FROM `product` WHERE `id_cate` IN (
		SELECT `id_cate` FROM (SELECT `id_cate` FROM `product`) AS subquery WHERE `id_cate` = {$_GET['id_cate']}
)";
	pdo_query($sql_product);

	// Tiếp theo, xóa hàng từ bảng categories
	$sql_categories = "DELETE FROM `categories` WHERE `id_cate` = {$_GET['id_cate']}";
	pdo_query($sql_categories);
}

function loadAll_danhmuc()
{
	$sql = "SELECT * FROM `categories` ORDER BY `id_cate` DESC";
	$listdm = pdo_query($sql);
	return $listdm;
}

function loadOne_danhmuc($id_cate)
{
	$sql = "SELECT *FROM categories WHERE `categories`.`id_cate` = {$_GET['id_cate']}";
	$editdm = pdo_query_one($sql);
	return $editdm;
}

function update_danhmuc($id, $tenloai)
{
	$sql = "UPDATE `categories` SET `name_cate` = '{$tenloai}' WHERE `categories`.`id_cate` = {$id}";
	pdo_execute($sql);
}
?>