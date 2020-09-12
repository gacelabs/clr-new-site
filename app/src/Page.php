<?php

namespace {

	use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
	use Symbiote\GridFieldExtensions\GridFieldAddNewMultiClass;
	use Symbiote\GridFieldExtensions\GridFieldAddNewMultiClassHandler;

	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
	use SilverStripe\Forms\GridField\GridFieldAddNewButton;
	use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
	use SilverStripe\Control\Director;
	use SilverStripe\View\SSViewer;
	use SilverStripe\Dev\Debug;
	use SilverStripe\Blog\Model\BlogPost;
	use SilverStripe\Blog\Model\Blog;

	use App\Helpers\FieldHelper;
	use App\Helpers\GridHelper;

	use App\UserInterfaces\Block;

	class Page extends SiteTree
	{
		private static $db = [];

		private static $has_one = [];

		private static $has_many = [
			'Blocks' => Block::class
		];

		public $page_css = [];
		public $page_js = [];
	
		public function getCMSFields() {
			$fields = parent::getCMSFields();

			if ($this->ClassName != BlogPost::class) {
				$fields->removeByName(['Content']);
				if ($this->ClassName != Blog::class) {
					$gridConfig = GridFieldConfig_RelationEditor::create(15)
						->removeComponentsByType(GridFieldAddNewButton::class)
						->removeComponentsByType(GridFieldAddExistingAutocompleter::class)
						->addComponent(new GridFieldSortableRows('SortOrder'))
						->addComponent(new GridFieldAddNewMultiClass(), 'GridFieldToolbarHeader');

					$gridField = GridField::create('Block', 'Element Blocks',
						$this->Blocks(), 
						$gridConfig
					);
					
					$fields->addFieldToTab('Root.ElementBlocks', $gridField);

					foreach ($this->Blocks() as $key => $Block) {
						if (isset($Block->page_js) AND count($Block->page_js)) {
							foreach ($Block->page_js as $js) {
								$this->page_js[md5($js)] = $js;
							}
						}
					}
					// debug::endshow($this->page_js);
					foreach ($this->Blocks() as $key => $Block) {
						if (isset($Block->page_css) AND count($Block->page_css)) {
							foreach ($Block->page_css as $css) {
								$this->page_css[md5($css)] = $css;
							}
						}
					}
				}
			}

			return $fields;
		}

		public function isLive()
		{
			if (Director::isLive()) {
				return true;
			}
			return false;
		}

		public function InstagramWidget($PhotoCount=5)
		{
			/*Instagram Access Token here*/
			// $AccessToken = "9151400880.1677ed0.3eca4bb19d664f37a7abbdad6ad49514";
			$AccessToken = "1234567890";
			$JsonLink = "https://api.instagram.com/v1/users/self/media/recent/?";
			$JsonLink .= "access_token={$AccessToken}&count={$PhotoCount}";

			$Json = @file_get_contents($JsonLink);
			// debug::show($Json); exit();
			$Object = json_decode($Json, true, 512, JSON_BIGINT_AS_STRING);
			// debug::show($Object); exit();

			if (isset($Object['data'])) {
				$Feeds = ArrayList::create();
				foreach ($Object['data'] as $Feed) {
					$PicCreatedTime = date("F j, Y", $Feed['caption']['created_time']);
					$Feeds->push([
						'PicText' => $Feed['caption']['text'],
						'PicLink' => $Feed['link'],
						'LikeCount' => $Feed['likes']['count'],
						'CommentCount' => $Feed['comments']['count'],
						'PicSrc' => str_replace("http://", "https://", $Feed['images']['standard_resolution']['url']),
						'CreatedTime' => $PicCreatedTime
					]);
				}

				return $Feeds;
			}
			return false;
		}

		public function GenerateBlockUIs()
		{
			$Blocks = $this->owner->Blocks()->Filter(['Published'=>1])->Sort('SortOrder');
			// debug::endshow($Blocks);
			$HTML = '';
			if ($Blocks) {
				foreach ($Blocks as $Block) {
					// debug::endshow($Block);
					$Template = $Block->ClassName ?: 'UserInterfaces\\Default';
					$HTML .= $Block->renderWith(str_replace('App\\', '', $Template));
				}
			}
			return FieldHelper::HTMLText($HTML);
		}
	}
}
