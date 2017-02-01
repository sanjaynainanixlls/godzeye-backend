
<?php include_once 'header.php'; ?>

		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Hero Section -->
			<section class="section-hero">
				<div class="hero-content contact">
					<div class="container">
						<h1 class="heading">contact us</h1>
					</div>
				</div>
			</section>

			<!-- Contact Section -->
			<section class="section-contact">
				<div class="contact-info-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<form class="contact-form">
									<label>
										<input type="text" class="form-input js-input" name="username" />
										<span>Your name</span>
									</label>

									<label>
										<input type="text" class="form-input js-input" name="email" />
										<span>E-mail address</span>
									</label>

									<label>
										<input type="text" class="form-input js-input" name="subject" />
										<span>Subject</span>
									</label>

									<label>
										<textarea class="form-input js-input" name="message"></textarea>
										<span>Message</span>
									</label>

									<button class="btn theme-btn-1">
										<span class="button">Send message</span>
									</button>
								</form>

							</div>

							<div class="col-md-6 map-wrapper">
								<div class="map" id="map-canvas"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="row row-fit">
					<div class="col-sm-4">
						<div class="contact-info-block">
							<div class="block-meta">
								<h4>Phone number</h4>
								<p>+91-8081441115</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="contact-info-block has-icon"></div>
					</div>

					<div class="col-sm-4">
						<div class="contact-info-block">
							<div class="block-meta">
								<h4>Email contact</h4>
								<p><a href="#">contact@godzeye.in</a></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Call to Action Box -->
			<div class="call-to-action-box" data-parallax-bg="img/call-to-action-bg.jpg">
				<div class="box-img"><span></span></div>
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<h2>Enjoy our courses Today</h2>
						</div>

						<div class="col-md-5">
							<div class="button-wrapper">
								<a href="#" class="btn theme-btn-3">Get in touch</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <script>
          function initMap() {
            var uluru = {lat: 28.5003239, lng: 77.1906796};
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
              zoom: 15,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYHeYHxmN5nmk2kqzg86xUkwynn61Ob4c&callback=initMap"></script>
		<?php include_once 'footer.php'; ?>

	