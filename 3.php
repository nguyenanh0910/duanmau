<?php
	session_start();
	session_destroy();
	echo '<h1>Session đã hủy</h1>';
	echo '<a herf="1.php">Khởi tạo</a>';
	echo '<a herf="2.php">Show session</a>';
?>