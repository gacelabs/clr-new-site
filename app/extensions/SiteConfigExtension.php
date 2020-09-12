<?php
namespace App\Extensions;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Forms\FieldList;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Dev\Debug;

use App\Helpers\GridHelper;
use App\Helpers\FieldHelper;

use App\Model\SocialMediaSite;

class SiteConfigExtension extends DataExtension
{
	private static $table_name = 'SiteConfigExtension';

	private static $db = [
		'Address1' => 'Text',
		'Address2' => 'Text',
		'Address3' => 'Text',
		'Contacts' => 'Text',
		'Emails' => 'Text',
		'OtherDetails' => 'Text',
		'SortOrder' => 'Int'
	];

	private static $default_sort = 'SortOrder';

	private static $has_one = [
		'SiteFavIcon' => File::class,
		'SiteLogo' => File::class,
		'BusinessSignature' => Image::class,
		'Privacy' => SiteTree::class,
		'Terms' => SiteTree::class,
		'Download' => SiteTree::class,
	];

	private static $has_many = [
		'SocialMediaSites' => SocialMediaSite::class
	];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->removeByName(['SortOrder']);

		$fields->addFieldsToTab('Root.Main', [
			FieldHelper::Upload('SiteFavIcon', 'Site Favicon')->setAllowedExtensions(array('ico')),
			FieldHelper::Upload('SiteLogo', 'Site Logo')->setAllowedExtensions(array('jpg','png')),
			FieldHelper::Text('Address1', 'City / Province'),
			FieldHelper::Text('Address2', 'House# / Street'),
			FieldHelper::Text('Address3', 'Subdivision / Barangay'),
			FieldHelper::Text('Contacts', 'Contacts'),
			FieldHelper::Upload('BusinessSignature', 'Business Signature'),
			FieldHelper::Text('Emails', 'Emails'),
			FieldHelper::Text('OtherDetails', 'Postal code')
		]);
		
		$fields->addFieldToTab('Root.SocialMedia', 
			GridHelper::sortable('SocialMediaSites', 'Social Media Sites', $this->owner->SocialMediaSites()));
		
		$fields->addFieldsToTab('Root.FooterPages', [
			FieldHelper::TreeDropdown('PrivacyID', 'Privacy policy Link', SiteTree::class),
			FieldHelper::TreeDropdown('TermsID', 'Terms and Conditions Link', SiteTree::class),
			FieldHelper::TreeDropdown('DownloadID', 'Downloads Link', SiteTree::class),
		]);
	}

	public function FormatContacts()
	{
		$List = ArrayList::create();
		if ($this->owner->Contacts) {
			if ((bool)strstr($this->owner->Contacts, ',')) {
				$Contacts = explode(',', str_replace(' ', '', $this->owner->Contacts));
				foreach ($Contacts as $key => $value) {
					$List->push([
						'Number' => $value
					]);
				}
			} else {
				$List->push(['Number'=>$this->owner->Contacts]);
			}
		}
		// debug::endshow($List);
		return $List;
	}

	public function FormatEmails()
	{
		$List = ArrayList::create();
		if ($this->owner->Emails) {
			if ((bool)strstr($this->owner->Emails, ',')) {
				$Emails = explode(',', str_replace(' ', '', $this->owner->Emails));
				foreach ($Emails as $key => $value) {
					$List->push([
						'Email' => $value
					]);
				}
			} else {
				$List->push(['Email'=>$this->owner->Emails]);
			}
		}
		// debug::endshow($List);
		return $List;
	}

}