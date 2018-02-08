<?php

class SitemapPageExtension extends SilverStripe\ORM\DataExtension {
     
	private static $db = [	
		'ExcludeFromSitemap' => 'Boolean'
    ];
     
	public function updateSettingsFields(Silverstripe\Forms\FieldList $fields) {
		$fields->addFieldToTab("Root.Settings", new Silverstripe\Forms\CheckBoxField('ExcludeFromSitemap', 'Exclude from sitemap?'), 'ShowInSearch');
    }
	
}