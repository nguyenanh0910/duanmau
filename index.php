<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "view/header.php";
include "global.php";

$spnew = loadAll_sanpham_home();
$dsdm = loadAll_danhmuc();
$dstop10 = loadAll_sanpham_top10();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
	$act = $_GET['act'];
	switch ($act) {
		case 'sanpham':
			if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
				$kyw = $_POST['kyw'];
			} else {
				$kyw = "";
			}
			;
			if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
				$loaisp = $_GET['iddm'];
			} else {
				$loaisp = 0;
			}
			$dssp = loadAll_sanpham($kyw, $loaisp);
			$tendm = load_ten_dm($loaisp);
			include "view/sanpham.php";
			break;
		case 'sanphamct':
			if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
				$onesp = loadOne_sanphamct($_GET['idsp']);
				extract($onesp);
				$sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $id_cate);
				include "view/sanphamct.php";
			} else {
				include "view/home.php";
			}
			break;
		case 'dangky':
			if (isset($_POST['dangky']) && ($_POST['dangky'])) {
				$email = $_POST['email'];
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				insert_taikhoan($email, $user, $pass);
				$thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
			}
			include "view/taikhoan/dangky.php";
			break;
		case 'dangnhap':
			if (isset($_POST['btn_login']) && ($_POST['btn_login'])) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$checkuser = checkuser($user, $pass);
				if (is_array($checkuser)) {
					$_SESSION['user'] = $checkuser;
					header('location:index.php');
				} else {
					$thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký";
				}
			}
			include "view/taikhoan/dangky.php";
			break;
		case 'edit_taikhoan':
			if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$tel = $_POST['tel'];
				$id = $_POST['id'];
				update_user($id, $user, $pass, $email, $tel, $address);
				$_SESSION['user'] = checkuser($user, $pass);
				header('location:index.php?act=edit_taikhoan');
			}
			include "view/taikhoan/edit_taikhoan.php";
			break;
			case 'quenmk':
				if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
					$email = $_POST['email'];
					$checkemail =checkemail($email);
					if(is_array($checkemail)){
						$thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
					}else{
						$thongbao = "Email này không tồn tại";
					}
				}
				include "view/taikhoan/quenmk.php";
				break;
		case 'gioithieu':
			include "view/gioithieu.php";
			break;
		case 'lienhe':
			include "view/lienhe.php";
			break;
		default:
			include "view/home.php";
			break;
	}
} else {
	include "view/home.php";
}
include "view/footer.php";
?>