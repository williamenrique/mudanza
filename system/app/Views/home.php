<?php
	head($data);
	getModal('modalComent',$data);
?>
<main id="main">

	<!-- ======= About Section ======= -->
	<?php /* modules('acerca',$data) */  ?>
	<!-- End Services Section -->

	<!-- ======= Clients Section ======= -->

	<!-- End Clients Section -->

	<!-- ======= Portfolio Section ======= -->

	<!-- End Portfolio Section -->

	<!-- ======= Testimonials Section ======= -->

	<!-- End Testimonials Section -->

	<!-- ======= Call To Action Section ======= -->
	<?php /* modules('call',$data) */?>
	<!-- End Call To Action Section -->

	<!-- ======= Team Section ======= -->

	<!-- End Team Section -->

	<!-- ======= Contact Section ======= -->
	<?php /* modules('contacto',$data) */?>
	<!-- End Contact Section -->

	<!-- ======= Comentario Section ======= -->
	<div class="coments">
		<div class="container">

			<div class="section-header">
				<h2>Deja tu comentario</h2>
				<button type="button" class="btn btn-primary" onclick="openModal()">Comenta aqui</button>
			</div>
			<div class="comments-container">

			</div>
		</div>

	</div>
	<!-- End comentario Section -->
</main><!-- End #main -->
<?php footer($data) ?>