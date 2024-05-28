<main>
	<article>
		<div class="panel">
			<div class="panel-heading">ĐĂNG KÝ THÀNH VIÊN</div>
			<div class="panel-body">
				<form action="index.php?act=dangky" method="POST">
					<div class="form-group">
						<div>Email</div>
						<input class="form-control" type="email" name="email">
					</div>
					<div class="form-group">
						<div>Tên đăng nhập</div>
						<input class="form-control" type="text" name="user">
					</div>
					<div class="form-group">
						<div>Mật khẩu</div>
						<input class="form-control" type="password" name="pass">
					</div>
					<div class="form-group">
						<input class="form-control" type="submit" value="Đăng ký" name="dangky">
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