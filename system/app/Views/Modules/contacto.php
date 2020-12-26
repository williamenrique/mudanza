	<section id="contact" class="wow fadeInUp">
		<div class="container">
			<div class="section-header">
				<h2>Contactenos</h2>
				<!-- <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim
					export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export
					irure minim illum fore</p> -->
			</div>

			<div class="row contact-info">

				<div class="col-md-4">
					<div class="contact-address">
						<i class="ion-ios-location-outline"></i>
						<h3>Direccion</h3>
						<address><?= $data["page_direccion"]?></address>
					</div>
				</div>

				<div class="col-md-4">
					<div class="contact-phone">
						<i class="ion-ios-telephone-outline"></i>
						<h3>Numero telefonico</h3>
						<p><a href="tel:<?= $data["page_tlf"]?>"><?= $data["page_tlf"]?>97</a></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="contact-email">
						<i class="ion-ios-email-outline"></i>
						<h3>Email</h3>
						<p><a href="mailto:<?= $data["page_email"]?>"><?= $data["page_email"]?></a></p>
					</div>
				</div>

			</div>
		</div>

		<div class="container mb-4">

			<iframe
				src="<?= $data["page_location"]?>"
				width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="container">
			<div class="section-header">
				<h2>Contactenos via email</h2>
			</div>
			<div class="form">
				<form role="form" class="php-email-form" id="formEmail">
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Tu Nombre" data-rule="minlen:4"
								data-msg="Por favor ingrese minimo de 4 caracteres" />
							<div class="validate"></div>
						</div>
						<div class="form-group col-md-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="Tu email" data-rule="email"
								data-msg="por favor ingrese un email valido" />
							<div class="validate"></div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4"
							data-msg="Por favor ingrese minimo de 8 caracteres de asunto" />
						<div class="validate"></div>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required"
							data-msg="Por favor escriba su mensaje" placeholder="Mensaje"></textarea>
						<div class="validate"></div>
					</div>

					<div class="mb-3">
						<!-- <div class="loading">Loading</div>
						<div class="error-message"></div> -->
						<div class="sent-message">Su mensaje a sido enviado.Gracias!</div>
					</div>

					<div class="text-center"><button type="submit">Enviar Mensaje</button></div>
				</form>
			</div>

		</div>
	</section>