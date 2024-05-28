<main>
	<article>
		<div class="panel">
			<?php
			extract($onesp);
			?>
			<div class="panel-heading"><?php echo $name_pro ?></div>
			<div class="panel-body">
				<?php
				$img = $img_path.$img_pro;
				echo '<div class="img_proct"><img src="' . $img . '" alt="Ảnh sản phẩm" style="width:250px; height:250px"></div><br>';
				echo $mota_pro;
				?>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">BÌNH LUẬN</div>
			<div class="panel-body">
				aaaaaa
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">SẢN PHẨM CÙNG LOẠI</div>
			<div class="panel-body">
				<?php
					foreach ($sp_cung_loai as $sp_cung_loai) {
						$linksp = "index.php?act=sanphamct&idsp=".$id_pro;
						extract($sp_cung_loai);
						echo '<li><a href="' . $linksp . '">'.$name_pro.'</a></li>';
					}
				?>
			</div>
		</div>
	</article>
	<aside>
		<?php include "boxright.php"; ?>
	</aside>
</main>
