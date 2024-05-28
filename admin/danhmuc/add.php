<main>
			<div class="title">
				<h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
			</div>
			<div class="form-content">
				<form action="index.php?act=adddm" method="POST">
					<div class="form-group">
						<div>Mã loại</div>
						<input type="text" name="maloai" placeholder="Tự động" disabled>
					</div>
					<div class="form-group">
						<div>Tên loại</div>
						<input type="text" name="tenloai">
					</div>
					<div class="form-group">
						<input type="submit" name="btn_add" value="THÊM MỚI">
						<input type="reset" name="btn_reset" value="NHẬP LẠI">
						<a href="index.php?act=listdm"><input type="button" name="btn_list" value="DANH SÁCH"></a>
					</div>
					<?php
					if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
					?>
				</form>
			</div>
		</main>