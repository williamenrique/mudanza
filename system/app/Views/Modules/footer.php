<!-- ======= Footer ======= -->

<footer id="footer">
	<div class="container">
		<div class="copyright">
			&copy; Copyright <strong><?= $data["page_empresa"]?></strong>. All Rights Reserved
		</div>
		<div class="credits">
			Designed by <a href="#">WM</a>
		</div>

	</div>
</footer><!-- End Footer -->

<!-- boton facebook -->
<div class="" style="position: fixed; bottom: 60px; left: 15px; cursor: pointer; z-index: 99999999;">
	<div style="display: flex; justify-content: center; align-items: center;  ">
		<a href="https://www.facebook.com/Transportejcm-104536918173737" target="_blank" rel="noopener noreferrer">
			<img src="<?= IMG ?>facebook.png" alt="" width="40" heith="40">
		</a>
	</div>
</div>
<!-- boton whatsapp -->
<div onclick="ht_ctc_click(this);" class="ht-ctc ht-ctc-chat ctc_wp_desktop ctc-analytics style-2 ht_ctc_animation null"
	style="position: fixed; bottom: 15px; left: 15px; cursor: pointer; z-index: 99999999;" data-return_type="chat"
	data-style="2" data-number="<?= $data["page_tlf"]?>" data-pre_filled="Hola, me interesan sus servicios (mensaje web)"
	data-is_ga_enable="yes" data-is_fb_pixel="yes" data-is_fb_an_enable="no" data-webandapi="webapi"
	data-display_mobile="show" data-display_desktop="show" data-css="display: none; cursor: pointer; z-index: 99999999;"
	data-position="position: fixed; bottom: 15px; left: 15px;"
	data-position_mobile="position: fixed; bottom: 15px; left: 15px;" data-show_effect="120" data-no_number="added">
	<div style="display: flex; justify-content: center; align-items: center;  ">
		<p class="ht-ctc-cta ht-ctc-cta-hover " style=" display: none;">Contactanos</p>
		<img src="<?= IMG ?>whatsapp.svg" alt="" width="40" heith="40">
	</div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="<?= PLUGINS ?>jquery/jquery.min.js"></script>
<script src="<?= PLUGINS ?>whatsapp/app.min.js"></script>
<script src="<?= PLUGINS ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= PLUGINS ?>jquery.easing/jquery.easing.min.js"></script>
<script src="<?= PLUGINS ?>php-email-form/validate.js"></script>
<script src="<?= PLUGINS ?>jquery-sticky/jquery.sticky.js"></script>
<script src="<?= PLUGINS ?>sweetalert/sweetalert2@10.js"></script>

<!-- Template Main JS File -->
<script>
const base_url = "<?= base_url()?>";
</script>
<script src="<?= JS ?>main.js"></script>
<script src="<?= JS ?><?= $data['page_function']?>"></script>

</body>

</html>