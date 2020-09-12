
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="post-sidebar-area">
					<div class="single-widget-area">
						<div class="widget-title">
							<h6><a href="/about-us/">About Us</a></h6>
						</div>
						<div class="about-thumbnail">
							<a href="/about-us/"><img src="/static/assets/images/logo-sq.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
			<% if $SiteConfig.SocialMediaSites.Count %>
			<div class="col-lg-4">
				<div class="post-sidebar-area">
					<div class="single-widget-area">
						<div class="widget-title">
							<h6>Subscribe &amp; Follow</h6>
						</div>
						<div class="widget-social-info text-center">
							<% loop $SiteConfig.SocialMediaSites %>
								<a href="$SocialMediaURL"><i class="fa fa-{$FaIconClass}"></i></a>
							<% end_loop %>
						</div>
						<br>
						<div class="widget-content text-center">
							$SiteConfig.BusinessSignature.FillMax(350, 46)
							<p>$SiteConfig.Tagline</p>
						</div>
					</div>
				</div>
			</div>
			<% end_if %>
			<div class="col-lg-4">
				<div class="post-sidebar-area">
					<div class="single-widget-area">
						<div class="widget-title">
							<h6>Newsletter</h6>
						</div>
						<div class="newsletter-content">
							<p>Subscribe our newsletter and/or get notification about new updates, information discount, etc.</p>
							<form action="#" method="post">
								<input type="email" name="email" class="form-control" placeholder="Your email" required="required" />
								<button><i class="fa fa-send"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<% if $InstagramWidget %>
		<div class="follow-us-instagram">
			<img class="footer-curve section-padding-50" src="/static/assets/images/foo-curve.png" alt="">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-heading">
							<h2>Follow Us On Instagram</h2>
							<a href=""><span>@foodeblog</span></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="instagram-slides owl-carousel owl-loaded owl-drag">
							<% loop $InstagramWidget %>
							<div class="single-instagram-slide">
								<img src="/static/assets/images/insta1.jpg" alt="" />
								<a href="#"><i class="fa fa-instagram"></i>Follow Me</a>
							</div>
							<% end_loop %>
						</div>
					</div>
				</div>
			</div>
		</div>
	<% end_if %>

	<footer class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<img class="footer-curve" src="/static/assets/images/foo-curve.png" alt="" />
					<div class="footer-social-info d-flex align-items-center justify-content-between">
						<a href="$SiteConfig.Privacy.Link"><i class="fa fa-lock" style="font-size: xx-large;"></i><span>Privacy policy</span></a>
						<a href="$SiteConfig.Terms.Link"><i class="fa fa-balance-scale" style="font-size: xx-large;"></i><span>Terms and Conditions</span></a>
						<a href="$SiteConfig.Download.Link"><i class="fa fa-download" style="font-size: xx-large;"></i><span>Downloads</span></a>
					</div>
					<img class="footer-curve" src="/static/assets/images/foo-curve.png" alt="" />
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="copywrite-text">
						<p>
							Copyright ©
							<script type="text/javascript">
								document.write(new Date().getFullYear());
							</script>
							~ All rights reserved<%--  | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a> --%>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>