<!-- LOGIN -->
<div class="panel panel-login">
	<div class="panel-heading">TÀI KHOẢN</div>
	<div class="panel-body">
		<?php
		if (isset($_SESSION['user'])) {
			extract($_SESSION['user']);

			?>
			<div class="form-group">
				<div>Xin chào</div>
				<?= $user ?>
			</div>
			<div class="form-group">
				<li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
				<li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
				<li><a href="admin/index.php">Đăng nhập Admin</a></li>
				<li><a href="index.php?act=thoat">Thoát</a></li>
			</div>
			<?php
		} else {
			?>
			<form action="index.php?act=dangnhap" method="POST">
				<div class="form-group">
					<div>Tên đăng nhập</div>
					<input class="form-control" type="text" name="user">
				</div>
				<div class="form-group">
					<div>Password</div>
					<input class="form-control" type="password" name="pass">
				</div>
				<div class="form-group">
					<div class="form-control">
						<label class="checkbox-inline">
							<input name="ghi_nho" type="checkbox" checked>
							Ghi nhớ tài khoản?
						</label>
					</div>
				</div>
				<div class="form-group">
					<input class="form-control" type="submit" name="btn_login" value="Đăng nhập">
				</div>
				<div class="form-group">
					<li><a href="#">Quên mật khẩu</a></li>
					<li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
				</div>
			</form>
			<?php
		}
		?>
	</div>
</div>
<!-- CATEGORY -->
<div class="panel panel-category">
	<div class="panel-heading">DANH MỤC</div>
	<div class="list-group">
		<ul>
			<?php
			foreach ($dsdm as $dm) {
				extract($dm);
				$linkdm = "index.php?act=sanpham&iddm=" . $id_cate;
				echo '<li><a href="' . $linkdm . '" class="list-group-item">' . $name_cate . '</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="panel-footer">
		<form action="index.php?act=sanpham" method="POST">
			<input type="text" name="kyw">
			<input type="submit" name="tim_kiem" value="Tìm kiếm">
		</form>
	</div>
</div>
<!-- FAVORITE -->
<div class="panel panel-favorite">
	<div class="panel-heading">TOP 10 YÊU THÍCH</div>
	<div class="panel-body">
		<?php
		foreach ($dstop10 as $sp) {
			extract($sp);
			$linksp = "index.php?act=sanphamct&idsp=" . $id_pro;
			$img = $img_path . $img_pro;
			echo '<div class="product">
						<div class="product-img">
						<a href="' . $linksp . '"><img src="' . $img . '" alt="Ảnh sản phẩm"></a>
						</div>
						<div class="product-name">
							<a href="' . $linksp . '">' . $name_pro . '</a>
						</div>
					</div>';
		}
		?>
	</div>
</div>