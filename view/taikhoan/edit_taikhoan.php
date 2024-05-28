<main>
	<article>
		<div class="panel">
			<div class="panel-heading">CẬP NHẬT TÀI KHOẢN</div>
			<div class="panel-body">
				<?php
					if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
						extract($_SESSION['user']);
					}
				?>
				<form action="index.php?act=edit_taikhoan" method="POST">
					<div class="form-group">
						<div>Email</div>
						<input class="form-control" type="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
						<div>Tên đăng nhập</div>
						<input class="form-control" type="text" name="user" value="<?=$user?>">
					</div>
					<div class="form-group">
						<div>Mật khẩu</div>
						<input class="form-control" type="password" name="pass">
					</div>
					<div class="form-group">
						<div>Địa chỉ</div>
						<input class="form-control" type="text" name="address" value="<?=$address?>">
					</div>
					<div class="form-group">
						<div>Điện thoại</div>
						<input class="form-control" type="text" name="tel" value="<?=$tel?>">
					</div>
					<div class="form-group">
						<input type="hidden" name="id" value="<?=$id?>">
						<input class="form-control" type="submit" value="Cập nhật" name="capnhat">
						<input class="form-control" type="reset" value="Nhập lại">
					</div>
				</form>
				<h2 class="thongbao">
					<?php
					if (isset($thongbao) && ($thongbao != "")) {
						echo $thongbao;
					}
					?>
				</h2>

			</div>
		</div>
	</article>
	<aside>
		<?php include "view/boxright.php"; ?>
	</aside>
</main>