
<?php include 'include/header.php' ?>
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<img src="assets/images/breadcrumb-line.png" alt="" />
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="/static/index.php"><i class="fa fa-home"></i> Home</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Contact</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="map-area">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15429.372472153533!2d121.0349434!3d14.8059888!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d3c41dff81fd673!2sCLR%20Industrial%20Trading!5e0!3m2!1sen!2sph!4v1599364938589!5m2!1sen!2sph" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>

	<section class="contact-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="contact-content-area">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="contact-content">
									<h4>Get In Touch</h4>

									<div class="contact-form-area">
										<form action="/static/index.php" method="post">
											<div class="row">
												<div class="col-12 col-lg-6">
													<div class="form-group">
														<input type="text" class="form-control" id="contact-name" placeholder="Name" />
													</div>
												</div>
												<div class="col-12 col-lg-6">
													<div class="form-group">
														<input type="email" class="form-control" id="contact-email" placeholder="Email" />
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" class="btn foode-btn">Send</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="contact-content contact-information">
									<h4>Information</h4>

									<div class="single-contact-info d-flex">
										<div class="icon">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
										</div>
										<p>3919 New Cut Rd, Mary land, United State.</p>
									</div>

									<div class="single-contact-info d-flex">
										<div class="icon">
											<i class="fa fa-phone" aria-hidden="true"></i>
										</div>
										<p>(12)-100-100-100</p>
									</div>

									<div class="single-contact-info d-flex">
										<div class="icon">
											<i class="fa fa-print" aria-hidden="true"></i>
										</div>
										<p>(12)-112-123-123</p>
									</div>

									<div class="single-contact-info d-flex">
										<div class="icon">
											<i class="fa fa-envelope" aria-hidden="true"></i>
										</div>
										<p>deercreative@gmail.com</p>
									</div>

									<div class="contact-social-info mt-50">
										<a href="/static/index.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
										<a href="/static/index.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
										<a href="/static/index.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
											<i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
										<a href="/static/index.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
											<i class="fa fa-google-plus" aria-hidden="true"></i>
										</a>
										<a href="/static/index.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
											<i class="fa fa-pinterest" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'include/footer.php' ?>