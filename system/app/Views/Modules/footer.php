<!-- ======= Footer ======= -->
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-lg-none">
	<div class="container clearfix">
		<div class="text-center contact-info">
			<i class="fa fa-envelope-o"></i> <a href="mailto:<?= $data["page_email"]?>"><?= $data["page_email"]?></a>
			<i class="fa fa-phone"></i> <?= $data["page_tlf"]?>
		</div>
		<div class="text-center social-links">
			<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
			<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
			<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
			<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
			<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
		</div>
	</div>
</section><!-- End Top Bar-->
<footer id="footer">
	<div class="container">
		<div class="copyright">
			&copy; Copyright <strong>Mudanzas Santiago</strong>. All Rights Reserved
		</div>
		<div class="credits">
			Designed by <a href="#">Workinfo</a>
		</div>
	</div>
</footer><!-- End Footer -->
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
<script src="<?= PLUGINS ?>wow/wow.min.js"></script>
<script src="<?= PLUGINS ?>venobox/venobox.min.js"></script>
<script src="<?= PLUGINS ?>owl.carousel/owl.carousel.min.js"></script>
<script src="<?= PLUGINS ?>jquery-sticky/jquery.sticky.js"></script>
<script src="<?= PLUGINS ?>superfish/superfish.min.js"></script>
<script src="<?= PLUGINS ?>hoverIntent/hoverIntent.js"></script>
<script src="<?= PLUGINS ?>isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= PLUGINS ?>sweetalert/sweetalert2@10.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->

<!-- Template Main JS File -->
<script>
const base_url = "<?= base_url()?>";
</script>
<script src="<?= JS ?>main.js"></script>
<script src="<?= JS ?>/<?= $data['page_function']?>"></script>

</body>

</html>