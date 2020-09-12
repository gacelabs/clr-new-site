<?php

namespace App\UserInterfaces;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\Dev\Debug;

use App\Helpers\FieldHelper;
use App\Helpers\GridHelper;
use App\Helpers\GeneralHelper;
use App\UserInterfaces\Block;

class ContentTemplate extends Block {

	private static $table_name = 'ContentTemplate';
	private static $description = 'Add Content to page from template selected';
	private static $singular_name = 'HTML Content Template';
	private static $plural_name = 'HTML Content Templates';

	private static $db = [
		'Template' => 'Varchar',
		'Description' => 'HTMLText'
	];

	private static $has_one = [
		'Image1' => Image::class,
		'Image2' => Image::class,
		'File1' => File::class,
		'File2' => File::class,
	];

	public static $TemplateViews = [
		'TwoColumnImage' => 'Two Column Image',
		'TwoColumnFile' => 'Two Column File',
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		
		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::Dropdown('Template', 'Template', self::$TemplateViews)->setEmptyString('Description Content'),

			FieldHelper::Upload('Image1')
				->displayIf('Template')->isEqualTo('TwoColumnImage')->orIf('Template')->isEqualTo('TwoColumnFile')->end(),
			FieldHelper::Upload('Image2')
				->displayIf('Template')->isEqualTo('TwoColumnImage')->orIf('Template')->isEqualTo('TwoColumnFile')->end(),

			FieldHelper::Upload('File1')
				->displayIf('Template')->isEqualTo('TwoColumnFile')->end(),
			FieldHelper::Upload('File2')
				->displayIf('Template')->isEqualTo('TwoColumnFile')->end(),

			FieldHelper::HTMLEditor('Description'),

		], 'Content');

		$fields->removeByName(['Content']);

		return $fields;
	}

	public function GetTemplateView()
	{
		/*debug::endshow($this->Blocks());
		$Blocks = $this->owner->Blocks()->Filter(['Published'=>1])->Sort('SortOrder');
		$HTML = '';
		if ($Blocks) {
			foreach ($Blocks as $Block) {
				// debug::endshow($Block);
				$Template = $Block->ClassName ?: 'UserInterfaces\\Default';
				$HTML .= $Block->renderWith(str_replace('App\\', '', $Template));
			}
		}
		return FieldHelper::HTMLText($HTML);*/
	}
}