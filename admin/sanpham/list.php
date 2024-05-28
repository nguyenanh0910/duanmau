<main>
	<div class="title">
		<h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
	</div>
	<form action="index.php?act=listsp" method="POST">
		<input type="text" name="key">
		<select name="loaisp">
			<option value="0" selected>Tất cả</option>
			<?php foreach ($listdm as $dm) {
				extract($dm);
				echo '<option value="' . $id_cate . '">' . $name_cate . '</option>';
			}
			?>
		</select>
		<input type="submit" name="listok" value="Go">
	</form> <br>
	<div class="form-content">
		<form action="#" method="POST">
			<div class="form-group">
				<table>
					<tr>
						<th></th>
						<th>Danh mục Sản Phẩm</th>
						<th>Tên Sản Phẩm</th>
						<th>Ảnh Sản Phẩm</th>
						<th>Giá Sản Phẩm</th>
						<th>Lượt Xem</th>
						<th></th>
					</tr>
					<?php
					foreach ($listsp as $sp) {
						extract($sp);
						$suasp = "index.php?act=suasp&id_pro=" . $id_pro;
						$xoasp = "index.php?act=xoasp&id_pro=" . $id_pro;
						echo ' <tr>
									<td><input type="checkbox" name="" id=""></td>
									<td>' . $name_cate . '</td>
									<td>' . $name_pro . '</td>
									<td><img src="' . $img_pro . '" alt="Ảnh sản phẩm" style="width:150px"></td>
									<td>$ ' . number_format($price_pro, 0, ',', '.') . '</td>
									<td>' . $view_pro . '</td>
									<td><a href="' . $suasp . '"><input type="button" value="Sửa"></a> <a href="' . $xoasp . '" onclick="return confirm(\'Bạn có muốn xóa không?\')"><input type="button" value="Xóa"></a></td>
								</tr>';
					}
					?>
					<a href="" onclick="return confirm('Bạn có muốn xóa không?')"></a>
				</table>
			</div>
			<div class="form-group">
				<input type="button" value="Chọn tất cả">
				<input type="button" value="Bỏ chọn tất cả">
				<input type="button" value="Xóa các mục đã chọn">
				<a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
			</div>
		</form>
	</div>
</main>