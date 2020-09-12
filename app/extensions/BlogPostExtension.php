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

class BlogPostExtension extends DataExtension
{
	private static $table_name = 'BlogPostExtension';

	private static $db = [
		'SortOrder' => 'Int'
	];

	private static $default_sort = 'SortOrder';

	private static $has_one = [];
	private static $has_many = [];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->removeByName(['SortOrder']);
	}

	public function RelatestPosts()
	{
		return BlogPost::get()->Filter('ID:Not', $this->owner->ID)->Sort('PublishDate', 'DESC')->Limit(2);
	}
}