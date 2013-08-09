<?php
	include("site_title.php");
?>
<html><head><title><?php echo $site_title; ?></title>

	<FRAMESET COLS="15%, 85%" BORDER="0">
		<FRAME SRC="sidebar.php" SCROLLING="no">
		<FRAME SRC="view-items.php" NAME="main">
	</FRAMESET>

</head></html>
