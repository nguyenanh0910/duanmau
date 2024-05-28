<main>
	<article>
		<div class="panel">
			<div class="panel-heading">QUÊN MẬT KHẨU</div>
			<div class="panel-body">
				<form action="index.php?act=quenmk" method="POST">
					<div class="form-group">
						<div>Email</div>
						<input class="form-control" type="email" name="email">
					</div>
					<div class="form-group">
						<input class="form-control" type="submit" value="Gửi" name="guiemail">
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