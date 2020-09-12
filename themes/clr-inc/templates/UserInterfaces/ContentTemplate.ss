
<div class="row justify-content-center">
	<div class="col-12 col-lg-10">
		<div class="foode-image">
			<% if $Template == '' %>
			    $Description
			<% end_if %>

			<% if $Template == TwoColumnImage %>
				<div class="row">
					<div class="col-12 col-md-6">
						$Image1.FillMax(445, 310)
					</div>
					<div class="col-12 col-md-6">
						$Image2.FillMax(445, 310)
					</div>
				</div>
				$Description
			<% end_if %>

			<% if $Template == TwoColumnFile %>
				<div class="row">
					<div class="col-12 col-md-6">
						<a target="_blank" href="$File1.Link">$Image1</a>
					</div>
					<div class="col-12 col-md-6">
						<a target="_blank" href="$File2.Link">$Image2</a>
					</div>
				</div>
				$Description
			<% end_if %>
		</div>
	</div>
</div>