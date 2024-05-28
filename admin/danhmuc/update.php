<?php
if (is_array($editdm)) {
	extract($editdm);
}
?>
<main>
	<div class="title">
		<h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
	</div>
	<div class="form-content">
		<form action="index.php?act=updatedm" method="POST">
			<div class="form-group">
				<div>Mã loại</div>
				<input type="text" name="maloai" value="<?php echo $id_cate ?>" disabled>
			</div>
			<div class="form-group">
				<div>Tên loại</div>
				<input type="text" name="tenloai" value="<?php if (isset($name_cate) && ($name_cate != ""))
					echo $name_cate; ?>">
			</div>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php if (isset($id_cate) && ($id_cate > 0))
					echo $id_cate; ?>">
				<input type="hidden" name="current_tenloai"
					value="<?php if (isset($name_cate) && ($name_cate != ""))
						echo $name_cate; ?>">
				<input type="submit" name="btn_update" value="CẬP NHẬT">
				<input type="reset" name="btn_reset" value="NHẬP LẠI">
				<a href="index.php?act=listdm"><input type="button" name="btn_list" value="DANH SÁCH"></a>
			</div>
		</form>
	</div>
</main>