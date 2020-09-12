<!DOCTYPE html>
<html lang="en">
<head>
	<% if $isLive %>
		<script data-ad-client="ca-pub-6230385111769760" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154196717-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-154196717-1');
		</script>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-MXS8SLV');</script>
		<!-- End Google Tag Manager -->
	<% end_if %>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	$MetaTags(false)
	<!-- [if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif] -->
	<link rel="icon" type="image/png" href="{$SiteConfig.SiteFavIcon.Link}" />
    <link rel="canonical" href="{$AbsoluteLink}" />
	<% if $isLive %>
		<!-- Facebook Pixel Code -->
		<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','718635915214505');fbq('track','PageView');</script>
		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=718635915214505&ev=PageView&noscript=1"/></noscript>
		<!-- End Facebook Pixel Code -->
	<% end_if %>
</head>
<body>
	<% if $isLive %>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXS8SLV"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<script>
			fbq('track', 'Contact');
			fbq('track', 'FindLocation');
		</script>
		<!-- Load Facebook SDK for JavaScript -->
		<div id="fb-root"></div>
		<script>window.fbAsyncInit = function() { FB.init({ xfbml: true, version: 'v4.0' }); }; (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
		<!-- Your customer chat code -->
		<div class="fb-customerchat" attribution="setup_tool" page_id="120439316017067"></div>
	<% end_if %>
	<header class="header-area">
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="top-header-content">
							<!-- <div class="search-form">
								<form action="#" method="get">
									<input type="search" name="search" class="form-control" placeholder="Search and hit enter..." />
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div> -->
							<div class="top-social-info text-center pt-1">
								<div class="row">
									<div class="col-lg-4 d-none d-lg-block">
										<span class="caption-text">$SiteConfig.Address2, $SiteConfig.Address1</span>
										<a target="_blank" href="https://www.google.com/maps?ll=14.806284,121.038616&z=14&t=m&hl=en&gl=PH&mapclient=embed&cid=11330003192753673843"><span class="h4">$SiteConfig.Address3</span>
										<br>
										</a>
									</div>
									<% if $SiteConfig.FormatContacts.Count %>
									<div class="col-lg-4 d-none d-lg-block">
										<span class="h4">
											<% loop $SiteConfig.FormatContacts.Limit(2) %>
												<% if $Pos > 1 %> | <% end_if %><a class="text-black" href="tel:$Number"><span class="h4">$Number</span></a>
											<% end_loop %>
										</span>
										<br>
										<span class="caption-text">Mobile Numbers</span>
									</div>
									<% end_if %>
									<% if $SiteConfig.FormatEmails.Count %>
										<div class="col-lg-4 d-none d-lg-block">
											<% loop $SiteConfig.FormatEmails.Limit(2) %>
												<a href="mailto:$Email"><span class="h4">$Email</span></a>
											<% end_loop %>
											<% if $SiteConfig.FormatEmails.Count == 1 %>
												<br>
												<span class="caption-text">$SiteConfig.OtherDetails</span>
											<% end_if %>
										</div>
									<% end_if %>
								</div>
								<div class="row d-block d-sm-none d-none d-sm-block d-md-none">
									<div class="col-12">
										<span class="h4">Mobile Numbers</span>
										<br>
										<% loop $SiteConfig.FormatContacts %>
											<% if $Pos > 1 %> | <% end_if %><a class="text-black" href="tel:$Number">$Number</a>
										<% end_loop %>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="logo-area text-center">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<a href="/" class="nav-brand"><img src="$SiteConfig.SiteLogo.Link" class="clrinc-logo-main" alt="CLR Industrial" /></a>
					</div>
				</div>
			</div>
		</div>

		<div id="sticky-wrapper" class="sticky-wrapper">
			<div class="foode-main-menu">
				<div class="classy-nav-container breakpoint-off light left">
					<div class="container">
						<nav class="classy-navbar" id="foodeNav">
							<a href="/" class="nav-brand"><img src="$SiteConfig.SiteLogo.Link" class="clrinc-logo-small" alt="CLR Industrial" /></a>
							<div class="classy-navbar-toggler">
								<span class="navbarToggler"><span></span><span></span><span></span></span>
							</div>
							<div class="classy-menu">
								<div class="classycloseIcon">
									<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
								</div>
								<div class="classynav">
									<ul>
										<% loop $Menu(1) %>
											<% if $Children %>
												<li class="cn-dropdown-item has-down $LinkingMode">
													<a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
													<ul class="dropdown">
														<% loop $Children %>
															<li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
														<% end_loop %>
													</ul>
													<span class="dd-trigger"></span>
												</li>
											<% else %>
												<li class="$LinkingMode">
													<a href="$Link" class="nav-link text-left" title="$Title.XML">$MenuTitle.XML</a>
												</li>
											<% end_if %>
										<% end_loop %>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>