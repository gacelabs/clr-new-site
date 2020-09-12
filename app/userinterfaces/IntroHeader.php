<?php

namespace App\UserInterfaces;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;

use App\Helpers\FieldHelper;
use App\Helpers\GridHelper;
use App\Helpers\GeneralHelper;
use App\UserInterfaces\Block;

class IntroHeader extends Block {

	private static $table_name = 'IntroHeader';
	private static $description = 'Add Intro header block to page';
	private static $singular_name = 'Intro header Block';
	private static $plural_name = 'Intro header Blockes';

	private static $db = [
		'Title' => 'Varchar',
		'SubHeading' => 'Text'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName(['Content']);
		
		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::Text('Title'),
			FieldHelper::Textarea('SubHeading', 'Sub-Heading')->setRows(2)
		], 'Published');

		return $fields;
	}


}