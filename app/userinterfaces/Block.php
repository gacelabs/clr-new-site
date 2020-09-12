<?php

namespace App\UserInterfaces;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;
use SilverStripe\Core\Config\Config;

use App\Helpers\FieldHelper;
use App\Helpers\GridHelper;
use App\Helpers\GeneralHelper;

class Block extends DataObject {

	private static $table_name = 'Block';
	private static $description = 'Section Block';
	private static $singular_name = 'General Block';
	private static $plural_name = 'General Blockes';

	private static $db = [
		'Name' => 'Varchar(255)',
		'Content' => 'HTMLText',
		'Published' => 'Boolean',
		'SortOrder' => 'Int'
	];

	// private static $default_sort = 'SortOrder';

	private static $has_one = [
		'Page' => SiteTree::class
	];

	private static $summary_fields = [
		'Name' => 'Name',
		'SingularName' => 'Block Type',
		'isPublished' => 'Published'
	];

	public function getCMSValidator()
	{
		return FieldHelper::Required(['Name']);
	}

	public function SingularName()
	{ 
		return FieldHelper::HTMLText(Config::inst()->get($this->owner, 'singular_name'));
	}

	public function isPublished()
	{
		return FieldHelper::HTMLText($this->Published ? 'Yes' : 'No');
	}

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName(['SortOrder', 'PageID', 'Name', 'Published', 'Content']);
		
		// debug::endshow($this->owner->SingularName());

		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::HeaderField($this->owner->SingularName()->Value),
			FieldHelper::Text('Name'),
			FieldHelper::Checkbox('Published'),
			FieldHelper::HTMLEditor('Content'),
		]);

		return $fields;
	}

	public function onAfterWrite()
	{
		parent::onAfterWrite();
		// debug::endshow($this->Page()->hasMethod('doPublish'));
	}

}