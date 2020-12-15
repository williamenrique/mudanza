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
				<ul id="comments-list" class="comments-list">
					<li>
						<div class="comment-main-level">

							<!-- Contenedor del Comentario -->
							<div class="comment-box">
								<div class="comment-head">
									<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
									<span>hace 20 minutos</span>
									<i class="fa fa-reply" onclick="reply()"></i>
								</div>
								<div class="comment-content">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae,
									praesentium optio, sapiente distinctio illo?
								</div>
							</div>
						</div>
						<!-- Respuestas de los comentarios -->
						<ul class="comments-list reply-list">
							<li>

								<!-- Contenedor del Comentario -->
								<div class="comment-box">
									<div class="comment-head">
										<h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
										<span>hace 10 minutos</span>
										<i class="fa fa-reply" onclick="comentar()"></i>

									</div>
									<div class="comment-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae,
										praesentium optio, sapiente distinctio illo?
									</div>
								</div>
							</li>

							<li>

								<!-- Contenedor del Comentario -->
								<div class="comment-box">
									<div class="comment-head">
										<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
										<span>hace 10 minutos</span>
										<i class="fa fa-reply"></i>

									</div>
									<div class="comment-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae,
										praesentium optio, sapiente distinctio illo?
									</div>
								</div>
							</li>
						</ul>
					</li>

					<li>
						<div class="comment-main-level">

							<!-- Contenedor del Comentario -->
							<div class="comment-box">
								<div class="comment-head">
									<h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
									<span>hace 10 minutos</span>
									<i class="fa fa-reply"></i>
								</div>
								<div class="comment-content">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae,
									praesentium optio, sapiente distinctio illo?
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<!-- End comentario Section -->
</main><!-- End #main -->
<?php footer($data) ?>