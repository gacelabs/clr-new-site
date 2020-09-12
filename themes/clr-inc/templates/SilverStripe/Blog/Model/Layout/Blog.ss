
$Breadcrumbs

<section class="blog-content-area section-padding-0-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="blog-posts-area">
					<% if $TopProduct.Exists %>
						<div class="featured-posts">
							<a href="$TopProduct.Link">$TopProduct.FeaturedImage
							<div class="featured-post-content">
								<%-- <p>$TopProduct.PublishDate.Format('MMMM d, YYYY')</p> --%>
								<a href="$TopProduct.Link" class="post-title">
									<h2><% if $TopProduct.MenuTitle %>$TopProduct.MenuTitle<% else %>$TopProduct.Title<% end_if %></h2>
								</a>
							</div>
						</div>
					<% end_if %>

					<% if $getBlogPosts.Count %>
						<% loop $getBlogPosts.Filter(ID:Not, $TopProduct.ID).Sort(PublishDate, DESC) %>
							<div class="single-blog-post d-flex flex-wrap mt-50">
								<div class="post-thumbnail mb-50">
									<a href="$Link">$FeaturedImage.FillMax(365, 300)</a>
								</div>
								<div class="post-content mb-50">
									<%-- <p class="post-date">$PublishDate.Format('MMMM d, YYYY')</p> --%>
									<a href="https://colorlib.com/preview/theme/foode/archive-blog.html#" class="post-title">
										<h4><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h4>
									</a>
									<div class="post-meta">
										<% loop $Authors %>
											<% if $First %><span>by</span><% end_if %> <b>$FirstName $Surname</b><% if $Count > 1 && not $Last %>, <% end_if %>
										<% end_loop %>
									</div>
									<p class="post-excerpt"><% if $Summary %>$Summary<% else %>$Excerpt<% end_if %></p>
									<a href="$Link" class="read-more-btn">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div>
								<img class="post-curve-line" src="/static/assets/images/post-curve-line.png" alt="" />
							</div>
						<% end_loop %>
					<% end_if %>
				</div>

				<% with $PaginatedList %>
					<% if $MoreThanOnePage %>
						<ol class="foode-pager mt-50">
							<% if $NotFirstPage %>
								<li>
									<a href="$NextLink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a>
								</li>
							<% end_if %>
							<% if $NotLastPage %>
								<li>
									<a href="$PrevLink">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</li>
							<% end_if %>
						</ol>
					<% end_if %>
				<% end_with %>
			</div>
		</div>
	</div>
</section>