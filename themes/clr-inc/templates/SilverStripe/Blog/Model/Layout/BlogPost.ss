
$Breadcrumbs

<section class="blog-content-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="blog-posts-area">
					<div class="single-post-details-area">
						<%-- <div class="post-thumbnail mb-30">
							$FeaturedImage.CropHeight(350)
						</div> --%>
						<div class="post-content">
							<%-- <p class="post-date">$PublishDate.Format('MMMM d, YYYY')</p> --%>
							<h4 class="post-title"><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h4>
							<div class="post-meta">
								<% loop $Authors %>
									<% if $First %><span>by</span><% end_if %> <b>$FirstName $Surname</b><% if $Count > 1 && not $Last %>, <% end_if %>
								<% end_loop %>
							</div>
							$Content
						</div>
					</div>

					<div class="post-tags-share d-flex justify-content-between align-items-center">
						<%-- <ol class="popular-tags d-flex flex-wrap">
							<li><a href="single-post.html#">Creative</a></li>
							<li><a href="single-post.html#">Unique</a></li>
						</ol> --%>
						<div class="post-share">
							<span>Share:</span>
							<a target="_blank" href="https://www.facebook.com/sharer.php?u={$BaseHref}{$Link}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a target="_blank" href="https://twitter.com/intent/tweet?url={$BaseHref}{$Link}&text=<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<%-- <a target="_blank" href="https://plus.google.com/share?url={$BaseHref}{$Link}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> --%>
							<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={$BaseHref}{$Link}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							<a target="_blank" href="mailto:{$SiteConfig.Emails}?subject=Check this out&body={$BaseHref}{$Link} <% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
						</div>
					</div>

					<% if $RelatestPosts.Count %>
						<div class="related-posts clearfix">
							<div class="curve-line bg-img mb-50" style="background-image: url(/static/assets/images/breadcrumb-line.png);"></div>
							<h4 class="headline">Relatest Products</h4>
							<div class="row">
								<% loop $RelatestPosts %>
								<div class="col-12 col-md-6">
									<div class="single-blog-post related-post">
										<div class="post-thumbnail mb-50">
											<a href="single-post.html#">$FeaturedImage.FillMax(350, 350)</a>
										</div>

										<div class="post-content mb-50">
											<%-- <p class="post-date">$PublishDate.Format('MMMM d, YYYY')</p> --%>
											<a href="single-post.html#" class="post-title">
												<h4><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h4>
											</a>
											<div class="post-meta">
												<% loop $Authors %>
													<% if $First %><span>by</span><% end_if %> <b>$FirstName $Surname</b><% if $Count > 1 && not $Last %>, <% end_if %>
												<% end_loop %>
											</div>
										</div>
									</div>
								</div>
								<% end_loop %>
							</div>

							<div class="curve-line bg-img" style="background-image: url(/static/assets/images/breadcrumb-line.png);"></div>
						</div>
					<% end_if %>
				</div>
			</div>
		</div>
	</div>
</section>