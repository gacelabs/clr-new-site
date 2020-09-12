<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\SiteConfig\SiteConfig;

use App\Helpers\GridHelper;
use App\Helpers\FieldHelper;
use SilverStripe\Dev\Debug;

class SocialMediaSite extends DataObject {

	private static $table_name = 'SocialMediaSite';
	private static $singular_name = 'Social Media Site';
	private static $plural_name   = 'Social Media Sites';

	private static $db = [
		'Name' => 'Varchar(255)',
		'Link' => 'Text',
		'SortOrder' => 'Int'
	];

	private static $default_sort = 'SortOrder';

	private static $has_one = [
		'SiteConfig' => SiteConfig::class
	];

	private static $summary_fields = [
		'Name' => 'Name',
		'Link' => 'URL'
	];

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName(['SortOrder', 'SiteConfigID']);

		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::Text('Name'),
			FieldHelper::Text('Link', 'URL')
		]);
		return $fields;
	}

	public function FaIconClass()
	{
		return strtolower(trim($this->Name));
	}

}