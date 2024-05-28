<main>
	<article>
		<div class="banner">
			<img src="view/img/products/1004.jpg" alt="banner">
		</div>
		<div class="product">
			<?php
			foreach ($spnew as $sp) {
				extract($sp);
				$linksp = "index.php?act=sanphamct&idsp=".$id_pro;
				$hinh = $img_path . $img_pro;
				echo '<div class="product-detail">
					<div class="product-img">
						<a href="' . $linksp . '"><img src="' . $hinh . '" alt="Ảnh sản phẩm"></a>
					</div>
					<div class="product-caption">
						<h3>$ ' . number_format($price_pro, 0, ',', '.') . '</h3>
						<a href="' . $linksp . '"><p>' . $name_pro . '</p></a>
					</div>
				</div>';
			}
			?>
		</div>
	</article>
	<aside>
			<?php include "boxright.php"; ?>
	</aside>
</main>