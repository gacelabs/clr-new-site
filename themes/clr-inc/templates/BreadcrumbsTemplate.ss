
<% if $Pages %>
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/"><i class="fa fa-home"></i> Home</a>
						</li>
						<% loop $Pages %>
							<li class="breadcrumb-item active" aria-current="page">
							<% if $Last %>
								$MenuTitle.XML
							<% else %>
								<% if not Up.Unlinked %><a href="$Link" class="breadcrumb-$Pos"><% end_if %>
								$MenuTitle.XML
								<% if not Up.Unlinked %></a><% end_if %>
							<% end_if %>
							</li>
						<% end_loop %>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<% end_if %>
