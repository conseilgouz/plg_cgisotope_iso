<?php 
/**
 * @version		1.0.0
 * @package		CG Isotope plugin
 * @author		ConseilGouz
 * @copyright	Copyright (C) 2021 ConseilGouz. All rights reserved.
 * @license		GNU/GPL v2; see LICENSE.php
 **/
defined( '_JEXEC' ) or die( 'Restricted access' );
use Joomla\CMS\Factory;
use Joomla\CMS\Access\Access;
use Joomla\CMS\Plugin\PluginHelper;
use \Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

class plgCGIsotopeIso extends JPlugin
{	
	/*
	*	onIsotopeFilter : add some filtering options
	*
	*   @context  string   must contain com_cgisotope.article
	*   @items array 	   contains all selected items
	*	
	*	@return boolean    always true
	*/
	public function onCGIsotopeFilter($context, &$items) {
		if ($context != 'com_cgisotope.article') return true;
		
		return true;
	}
	/*
	*	onIsotopeRender : add some code before displaying isotope article
	*
	*   @context  string   must contain com_cgisotope.article
	*   @article object    one article
	*   @params  object    isotope params
	*   @page    int       page number (pagination)
	*	
	*	@return boolean    always true
	*/
	public function onCGIsotopeRender($context, &$article, &$params, $page = 0) {
		if ($context != 'com_cgisotope.article') return true;

		// add {myiso} shortcode  
		if (strpos($article->text,'{myiso}') ) {
			$output = "just testing plugin";
			$article->text = str_replace('{myiso}', $output, $article->text);
		}		
		

		return true;
	}
	/*
	*	onIsotopeBefore : add some code before displaying isotope page
	*
	*   @context  string   must contain com_cgisotope.article
	*   @obj      array    contains isotope object
	*	
	*	@return boolean    always true

	*/
	public function onCGIsotopeBefore($context,$obj) {
		if ($context != 'com_cgisotope.article') return true;

		return true;
		}
	
	
}
?>