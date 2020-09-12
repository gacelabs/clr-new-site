<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Control\Director;
use SilverStripe\View\SSViewer;
use SilverStripe\Dev\Debug;
use SilverStripe\Control\Controller;
use SilverStripe\Assets\Image;
use SilverStripe\Blog\Model\BlogPost;

use App\Helpers\FieldHelper;
use App\Helpers\GridHelper;

class HomePage extends Page
{
	private static $db = [];

	private static $has_one = [];
	private static $many_many = [
		'FivePosts' => BlogPost::class
	];

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName(['Content']);
		
		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::ListBox('FivePosts', 'Select 5 Post', BlogPost::get())
		], 'Metadata');
		
		return $fields;
	}

	public function BlogPosts()
	{
		return BlogPost::get();
	}
}

class HomePageController extends PageController
{
	private static $allowed_actions = [];

	public function init()
	{
		parent::init();
	}
}