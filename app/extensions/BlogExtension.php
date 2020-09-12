<?php
namespace App\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Forms\FieldList;
use SilverStripe\Assets\File;
use SilverStripe\Dev\Debug;
use SilverStripe\Blog\Model\BlogPost;

use App\Helpers\GridHelper;
use App\Helpers\FieldHelper;

use App\Model\SocialMediaSite;

class BlogExtension extends DataExtension
{
	private static $table_name = 'BlogExtension';

	private static $db = [];

	private static $has_one = [
		'TopProduct' => BlogPost::class
	];

	private static $has_many = [];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->removeByName(['Content']);
		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::Dropdown('TopProductID', 'Top Product', BlogPost::get()),
		], 'Metadata');
	}
}