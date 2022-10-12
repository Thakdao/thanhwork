<footer id="footer">
	<div class="box_footer center inview_fadeIn">
		<p class="logo"><a class="over" href="<?php echo LOCATION; ?>"><img src="<?php echo LOCATION; ?>files/images/footer/logo.gif" alt=""></a></p>
		<div class="box_sns">
			<p><a target="_blank" class="over" href="https://www.facebook.com/thak.dao/"><i class="fa-brands fa-facebook"></i></a></p>
			<p><a target="_blank" class="over" href="https://www.instagram.com/thakdao/"><i class="fa-brands fa-instagram"></i></a></p>
			<p><a class="over" href="<?php echo LOCATION; ?>"><i class="fa-solid fa-house"></i></a></p>
		</div>
		<p class="center" id="copyright">&copy; <?php echo get_copyright_date(2022); ?> Thanh Nguyen. all rights reserved.</p>

	</div>
</footer>
<?php
// コピーライトの年を返す
function get_copyright_date($then)
{
	$now = date('Y');
	if ($then < $now) {
		return $then . '–' . $now;
	} else {
		return $then;
	}
}
?>