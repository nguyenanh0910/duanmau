<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
// controller

if (isset($_GET['act'])) {
	$act = $_GET['act'];
	switch ($act) {
		case 'adddm':
			// kiểm tra xem người dùng có click vào nút add hay không
			if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
				if (!empty($_POST['tenloai'])) {
					$tenloai = $_POST['tenloai'];
					if (!check_duplicate_danhmuc($tenloai)) {
						// Nếu không trùng, thực hiện thêm mới
						insert_danhmuc($tenloai);
						$thongbao = "Thêm thành công";
					} else {
						// Nếu trùng, thông báo cho người dùng
						$thongbao = "Tên loại đã tồn tại, vui lòng chọn tên khác.";
					}
				} else {
					// Nếu không có dữ liệu được nhập, hiển thị thông báo
					$thongbao = "Vui lòng nhập tên loại hàng hóa";
				}
			}

			include "danhmuc/add.php";
			break;
		case 'listdm':
			$listdm = loadAll_danhmuc();
			include "danhmuc/list.php";
			break;

		case 'xoadm':
			if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
				delete_danhmuc($_GET['id_cate']);
			}
			$listdm = loadAll_danhmuc();
			include "danhmuc/list.php";
			break;
		case 'suadm':
			if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
				$editdm = loadOne_danhmuc($_GET['id_cate']);
			}
			include "danhmuc/update.php";
			break;
		case 'updatedm':
			if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
				$id = $_POST['id'];
				if (!empty($_POST['tenloai'])) {
					$tenloai = $_POST['tenloai'];
					$current_tenloai = $_POST['current_tenloai'];

					// Kiểm tra nếu tên loại mới khác với tên loại hiện tại
					if ($tenloai != $current_tenloai) {
						if (!check_duplicate_danhmuc($tenloai)) {
							update_danhmuc($id, $tenloai);
							$thongbao = "Cập nhật thành công";
						} else {
							// Nếu trùng, thông báo cho người dùng
							$thongbao = "Tên loại đã tồn tại, vui lòng chọn tên khác.";
						}
					} else {
						// Nếu tên loại không thay đổi, không cần thông báo gì
						$thongbao = "";
					}
				} else {
					// Nếu không có dữ liệu được nhập, hiển thị thông báo
					$thongbao = "Vui lòng nhập tên loại hàng hóa";
				}
			}

			if (isset($thongbao) && !empty($thongbao)) {
				echo "<p>$thongbao</p>";
			}
			$listdm = loadAll_danhmuc();
			include "danhmuc/list.php";
			break;

		// Controller sản phẩm

		case 'addsp':
			// kiểm tra xem người dùng có click vào nút add hay không
			if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
				$loaisp = $_POST['loaisp'];
				$tensp = $_POST['tensp'];
				$giasp = $_POST['giasp'];
				$motasp = $_POST['motasp'];
				$target_dir = "../upload/";
				$filename = basename($_FILES['anhsp']['name']);
				$target_file = $target_dir . $filename;
				if (move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)) {
					$anhsp = $target_file;
				}
				insert_sanpham($tensp, $giasp, $anhsp, $motasp, $loaisp);
				$thongbao = "Thêm thành công";
			}
			$listdm = loadAll_danhmuc();
			include "sanpham/add.php";
			break;
		case 'listsp':
			if (isset($_POST['listok']) && ($_POST['listok'])) {
				$key = $_POST['key'];
				$loaisp = $_POST['loaisp'];
			} else {
				$key = '';
				$loaisp = 0;
			}
			$listdm = loadAll_danhmuc();
			$listsp = loadAll_sanpham($key, $loaisp);
			include "sanpham/list.php";
			break;

		case 'xoasp':
			if (isset($_GET['id_pro']) && ($_GET['id_pro'] > 0)) {
				delete_sanpham($_GET['id_pro']);
			}
			$listsp = loadAll_sanpham("", 0);
			include "sanpham/list.php";
			break;
		case 'suasp':
			if (isset($_GET['id_pro']) && ($_GET['id_pro'] > 0)) {
				$editsp = loadOne_sanpham($_GET['id_pro']);
				$_SESSION['editsp'] = $editsp; // Lưu sản phẩm vào session
			}
			$listdm = loadAll_danhmuc();
			include "sanpham/update.php";
			break;
		case 'updatesp':
			if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
				$id = $_POST['id'];
				$loaisp = $_POST['loaisp'];
				$tensp = $_POST['tensp'];
				$giasp = $_POST['giasp'];
				$motasp = $_POST['motasp'];
				$target_dir = "../upload/";
				$filename = basename($_FILES['anhsp']['name']);
				$target_file = $target_dir . $filename;
				$checkUp = false;
				if (move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)) {
					$checkUp = true;
				}
				;
				if ($checkUp == true) {
					$anhsp = $target_file;
				} else {
					$editsp = $_SESSION['editsp'];
					$anhsp = $editsp['img_pro'];
				}
				update_sanpham($id, $tensp, $giasp, $anhsp, $motasp, $loaisp);
			}
			$listsp = loadAll_sanpham("", 0);
			include "sanpham/list.php";
			break;

		default:
			include "home.php";
			break;
	}
} else {
	include "home.php";
}


include "footer.php";
?>