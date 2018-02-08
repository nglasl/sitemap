<?php
use SilverStripe\View\Requirements;

class HTMLSitemap_Controller extends PageController {
	
	public function init() {
		parent::init();
		Requirements::css(SITEMAP_BASE . '/css/sitemap.css');
	}

}