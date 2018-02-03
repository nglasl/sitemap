<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DB;

class XMLSitemap extends Page{

	private static $allowed_children = 'none';
	private static $description = 'Adds an XML sitemap generated from the site tree';
	private static $icon = 'sitemap/images/sitemap.png';
	
	private static $db = [];

	private static $has_one = [];
	
	private static $defaults = [
		'ShowInMenus' => 0,
		'Sort' => 10001
	];

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->removeByName('Metadata');
		return $fields;
	}
	
	/**
	 * Add default record to database
	 *
	 */
	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		
		// if xml sitemap page does not exist
		if(static::class == self::class && $this->config()->create_default_pages) {
			if( !SiteTree::get_by_link('sitemap') ){
				$XMLSitemap = new XMLSitemap();
				$XMLSitemap->Title = 'XML Sitemap';
				$XMLSitemap->Content = '';
				$XMLSitemap->URLSegment = 'sitemap';
				$XMLSitemap->write();
				$XMLSitemap->publish('Stage', 'Live');
				$XMLSitemap->flushCache();
				DB::alteration_message('Sitemap XML page created', 'created');
			}

		}

	}
}