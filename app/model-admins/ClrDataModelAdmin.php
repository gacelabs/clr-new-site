<?php

namespace App\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;

use SilverStripe\Blog\Model\BlogPost;

class ClrDataModelAdmin extends ModelAdmin
{
	private static $menu_title = 'CLR Data';

	private static $url_segment = 'clr-industrial-data';

	private static $menu_icon_class = 'font-icon-database';

	private static $menu_priority = 7;

	private static $managed_models = [
		BlogPost::class => ['title' => 'Products'],
	];
}