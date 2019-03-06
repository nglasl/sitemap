<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DB;

class HTMLSitemap extends Page {

	private static $allowed_children = 'none';
	private static $description = 'Adds an html sitemap generated from the site tree';
	private static $icon = 'sitemap/images/sitemap.png';
	
	private static $db = [];

	private static $has_one = [];
	
	private static $defaults = [
		'ShowInMenus' => 0,
		'Sort' => 10000
	];

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		return $fields;
	}
	
	/**
	 * Add default record to database
	 *
	 */
	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		
		// if html sitemap page does not exist
		if(static::class == self::class && $this->config()->create_default_pages) {
			if( !HTMLSitemap::get()->first() ){
				$HTMLSitemap = new HTMLSitemap();
				$HTMLSitemap->Title = 'HTML Sitemap';
				$HTMLSitemap->Content = '';
				$HTMLSitemap->write();
				$HTMLSitemap->publish('Stage', 'Live');
				$HTMLSitemap->flushCache();
				DB::alteration_message('Sitemap HTML page created', 'created');
			}

		}

		/*
		// schema migration
		// @todo Move to migration task once infrastructure is implemented
		if($this->class == 'SiteTree') {
			$conn = DB::getConn();
			// only execute command if fields haven't been renamed to _obsolete_<fieldname> already by the task
			if(array_key_exists('Viewers', $conn->fieldList('SiteTree'))) {
				$task = new UpgradeSiteTreePermissionSchemaTask();
				$task->run(new SS_HTTPRequest('GET','/'));
			}
		}*/
	}


}