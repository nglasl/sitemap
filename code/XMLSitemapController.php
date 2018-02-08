<?php

class XMLSitemap_Controller extends PageController {
	
	public function init() {
		parent::init();
		
		// update xml file when url is visited
		$this->UpdateXMLFile();
	}
	
	/**
	 * Update xml file when this page is viewed
	 **/
	public function UpdateXMLFile(){
		
		// get the value of the XMLSitemap page
		$xml = $this->GetXMLValue();

		// get link to xml file to be created/updated in site root
		$file = BASE_PATH . '/sitemap.xml';
		$fp = fopen($file, "w");
		// prepend xml tag to result (gets excluded from curl)
		/*$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= $xml;*/
		
		// write xml file
		fwrite($fp, $xml);
	}
	
	/**
	 * Get the value of this page
	 * Render with template
	 **/
	public function GetXMLValue(){
		return $this->renderWith('XMLSitemap')->Value;
	}

}