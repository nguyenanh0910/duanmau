<main>
	<div class="title">
		<h1>THÊM MỚI SẢN PHẨM</h1>
	</div>
	<div class="form-content">
		<form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<div>Danh mục sản phẩm</div>
				<select name="loaisp">
					<?php foreach ($listdm as $dm) {
						extract($dm);
						echo '<option value="'.$id_cate.'">'.$name_cate.'</option>';
					}
					?>
					
				</select>
			</div>
			<div class="form-group">
				<div>Tên sản phẩm</div>
				<input type="text" name="tensp">
			</div>
			<div class="form-group">
				<div>Giá sản phẩm</div>
				<input type="text" name="giasp">
			</div>
			<div class="form-group">
				<div>Ảnh sản phẩm</div>
				<input type="file" name="anhsp">
			</div>
			<div class="form-group">
				<div>Mô tả sản phẩm</div>
				<textarea name="motasp" cols="30" rows="10"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="btn_add" value="THÊM MỚI">
				<input type="reset" name="btn_reset" value="NHẬP LẠI">
				<a href="index.php?act=listsp"><input type="button" name="btn_list" value="DANH SÁCH"></a>
			</div>
			<?php
			if (isset($thongbao) && ($thongbao != ""))
				echo $thongbao;
			?>
		</form>
	</div>
</main>