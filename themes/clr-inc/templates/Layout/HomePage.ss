
<% if $BlogPosts.Count %>
	<section class="hero-area">
		<div class="hero-post-slides owl-carousel owl-loaded owl-drag">
			<% loop $BlogPosts.Sort(PublishDate, DESC) %>
				<div class="single-hero-post">
					<a href="$Link">
						<div class="slide-img bg-img" style="background-image: url($FeaturedImage.Link);"></div>
					</a>
					<div class="hero-slides-content">
						<%-- <p>$PublishDate.Format('MMMM d, YYYY')</p> --%>
						<a href="$Link" class="post-title">
							<h4><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h4>
						</a>
					</div>
				</div>
			<% end_loop %>
		</div>
	</section>
<% end_if %>

<%-- <section class="blog-content-area section-padding-100-0">
	<div class="container">
		<% if $FivePosts.Count %>
			<div class="row">
				<div class="col-12">
					<div class="featured-post-area">
						<div id="featured-post-slides" class="carousel slide d-flex flex-wrap" data-ride="carousel">
							<div class="carousel-inner">
								<% loop $FivePosts.Sort(PublishDate, DESC).Limit(5) %>
									<div class="carousel-item bg-img<% if $First %> active<% end_if %>" style="background-image: url('$FeaturedImage.URL');">
										<div class="featured-post-content">
											<a href="$Link" class="post-title">
												<h2><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h2>
											</a>
										</div>
									</div>
								<% end_loop %>
							</div>
							<ol class="carousel-indicators">
								<% loop $FivePosts.Sort(PublishDate, DESC).Limit(5) %>
									<li data-target="#featured-post-slides" data-slide-to="$Pos"<% if $First %> class="active"<% end_if %>>
										<h2>$Pos</h2>
										<a href="$Link" class="post-title">
											<h5><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h5>
										</a>
									</li>
								<% end_loop %>
							</ol>
						</div>
					</div>
				</div>
			</div>
		<% else %>
			<img class="footer-curve section-padding-0-50" src="/static/assets/images/foo-curve.png" alt="">
		<% end_if %>

		<% if $BlogPosts.Count %>
			<div class="row justify-content-center">
				<div class="col-12 col-lg-8">
					<div class="blog-posts-area">
						<% loop $BlogPosts.Sort(PublishDate, DESC) %>
							<div class="single-blog-post d-flex flex-wrap mt-50">
								<div class="post-thumbnail mb-50">
									<a href="$link">$FeaturedImage.FillMax(365, 365)</a>
								</div>
								<div class="post-content mb-50">
									<a href="$link" class="post-title">
										<h4><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h4>
									</a>
									<div class="post-meta">
										<% loop $Authors %>
											<% if $First %><span>by</span><% end_if %> <b>$FirstName $Surname</b><% if $Count > 1 && not $Last %>, <% end_if %>
										<% end_loop %>
									</div>
									<p class="post-excerpt"><% if $Summary %>$Summary<% else %>$Excerpt<% end_if %></p>
									<a href="$link" class="read-more-btn">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div>
								<img class="post-curve-line" src="/static/assets/images/post-curve-line.png" alt="" />
							</div>
						<% end_loop %>
					</div>
				</div>

				<div class="col-12 col-sm-9 col-md-6 col-lg-4">
					<div class="post-sidebar-area">
						<div class="single-widget-area">
							<div class="widget-title">
								<h6>Latest Posts</h6>
							</div>
							<% loop $BlogPosts.Sort('RAND()') %>
								<div class="single-latest-post d-flex">
									<div class="post-thumb">
										$FeaturedImage.FillMax(123, 123)
									</div>
									<div class="post-content">
										<a href="$Link" class="post-title">
											<h6><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h6>
										</a>
										<% loop $Authors %>
											<% if $First %><span>by</span><% end_if %> <b>$FirstName $Surname</b><% if $Count > 1 && not $Last %>, <% end_if %>
										<% end_loop %>
									</div>
								</div>
							<% end_loop %>
						</div>

						<div class="single-widget-area">
							<div class="widget-title" style="margin-bottom: 20px;">
								<h6>popular tags</h6>
							</div>
							<ol class="popular-tags d-flex flex-wrap">
								<li><a href="#">Creative</a></li>
								<li><a href="#">Unique</a></li>
								<li><a href="#">Template</a></li>
								<li><a href="#">Photography</a></li>
								<li><a href="#">travel</a></li>
								<li><a href="#">lifestyle</a></li>
								<li><a href="#">Wordpress Template</a></li>
								<li><a href="#">food</a></li>
								<li><a href="#">Idea</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		<% end_if %>
	</div>
</section> --%>