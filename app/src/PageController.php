<?php

namespace {

	use SilverStripe\CMS\Controllers\ContentController;
	use SilverStripe\Control\Director;
	use SilverStripe\View\SSViewer;
	use SilverStripe\View\Requirements;
	use SilverStripe\Dev\Debug;
	use SilverStripe\SiteConfig\SiteConfig;
	use App\Forms\NewsLetter;

	class PageController extends ContentController
	{
		private static $allowed_actions = ['NewsLetter'];

		protected function init()
		{
			parent::init();

			/*set debugging comments on SSViewer in Dev Env*/
			if (Director::isDev()) {
				SSViewer::config()->set('source_file_comments', true);
			}

			$Blocks = $this->Blocks();
			if ($Blocks->Count()) {
				$arrayJS  = [];
				$arrayCSS = [];

				foreach ($Blocks as $key => $Box) {
					if (isset($Box->page_js) AND count($Box->page_js)) {
						foreach ($Box->page_js as $js) {
							if (!isset($arrayJS[md5($js)])) {
								$arrayJS[md5($js)] = $js;
							}
						}
					}
				}
				foreach ($Blocks as $key => $Box) {
					if (isset($Box->page_css) AND count($Box->page_css)) {
						foreach ($Box->page_css as $css) {
							if (!isset($arrayCSS[md5($css)])) {
								$arrayCSS[md5($css)] = $css;
							}
						}
					}
				}

				Requirements::combine_files('block.css', $arrayCSS);
				Requirements::combine_files('block.js', $arrayJS);
			}


			$general_css = [
				'requirements/css/bootstrap.min.css',
				'requirements/css/magnific-popup.css',
				'requirements/css/classy-nav.css',
				'requirements/css/owl.carousel.min.css',
				'requirements/css/animate.css',
				'static/assets/css/style.css',
				'requirements/css/custom.css',
			];
			// Requirements::css('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
			Requirements::combine_files('general-page.css', $general_css);

			$general_js = [
				'static/assets/js/jquery-2.2.4.min.js',
				'static/assets/js/popper.min.js',
				'static/assets/js/bootstrap.min.js',
				'static/assets/js/plugins.js',
				'static/assets/js/active.js',
			];
			Requirements::combine_files('general-page.js', $general_js);

			Requirements::set_force_js_to_bottom(true);
		}

		public function NewsLetter() {
			$NewsLetter = new NewsLetter($this->owner, __FUNCTION__);
			$NewsLetter->setTemplate('Forms/NewsLetterForm');
			// debug::endshow($NewsLetter);
			return $NewsLetter;
		}
	}
}
