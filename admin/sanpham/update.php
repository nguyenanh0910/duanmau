<?php
if (isset($_SESSION['editsp']) && is_array($_SESSION['editsp'])) {
	$editsp = $_SESSION['editsp'];
	extract($editsp);
}
?>
<main>
	<div class="title">
		<h1>CẬP NHẬT SẢN PHẨM</h1>
	</div>
	<div class="form-content">
		<form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<div>Danh mục sản phẩm</div>
				<input type="hidden" name="id" value="<?= $editsp['id_pro'] ?>">
				<select name="loaisp">
					<?php foreach ($listdm as $dm) {
						?>
						<option value="<?php echo $dm['id_cate'] ?>" <?php if ($dm['id_cate'] == $editsp['id_cate'])
								 echo "selected"; ?>><?php echo $dm['name_cate'] ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<div>Tên sản phẩm</div>
				<input type="text" name="tensp" value="<?= $name_pro ?>">
			</div>
			<div class="form-group">
				<div>Giá sản phẩm</div>
				<input type="text" name="giasp" value="<?= $price_pro ?>">
			</div>
			<div class="form-group">
				<div>Ảnh sản phẩm</div>
				<input type="file" name="anhsp">
			</div>
			<div class="form-group">
				<div>Mô tả sản phẩm</div>
				<textarea name="motasp" cols="30" rows="10"><?= $mota_pro ?></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" value="<?php if (isset($id_pro) && ($id_pro > 0))
					echo $id_pro; ?>">
				<input type="submit" name="btn_update" value="CẬP NHẬT">
				<input type="reset" name="btn_reset" value="NHẬP LẠI">
				<a href="index.php?act=listsp"><input type="button" name="btn_list" value="DANH SÁCH"></a>
			</div>
		</form>
	</div>
</main>