<?php
//use SilverStripe\Control\HTTP;
use SilverStripe\ORM\DataObject;

define('SITEMAP_BASE', dirname(dirname(__FILE__)));

// set cache lifetime to 3 hours
//HTTP::set_cache_age( 10800);

// Extensions
DataObject::add_extension('Page', 'SitemapPageExtension');