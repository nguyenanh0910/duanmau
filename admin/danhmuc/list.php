<main>
	<div class="title">
		<h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
	</div>
	<div class="form-content">
		<form action="#" method="POST">
			<div class="form-group">
				<table>
					<tr>
						<th></th>
						<th>STT</th>
						<th>Tên Loại</th>
						<th></th>
					</tr>
					<?php
					$stt = 0;
					foreach ($listdm as $dm) {
						$stt++;
						extract($dm);
						$suadm = "index.php?act=suadm&id_cate=".$id_cate;
						$xoadm = "index.php?act=xoadm&id_cate=".$id_cate;
						echo ' <tr>
									<td><input type="checkbox" name="" id=""></td>
									<td>'.$stt.'</td>
									<td>'.$name_cate.'</td>
									<td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'" onclick="return confirm(\'Bạn có muốn xóa không?\')"><input type="button" value="Xóa"></a></td>
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
				<a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
			</div>
		</form>
	</div>
</main>