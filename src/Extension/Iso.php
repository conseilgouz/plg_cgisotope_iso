<?php 
/**
 * @package		CG Isotope plugin
 * @author		ConseilGouz
 * @copyright	Copyright (C) 2025 ConseilGouz. All rights reserved.
 * @license		GNU/GPL v2; see LICENSE.php
 **/
namespace ConseilGouz\Plugin\Cgisotope\Iso\Extension; 
defined( '_JEXEC' ) or die( 'Restricted access' );
use Joomla\CMS\Factory;
use Joomla\CMS\Access\Access;
use Joomla\CMS\Plugin\PluginHelper;
use \Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

class Iso extends CMSPlugin implements SubscriberInterface
{
    /**
     * @inheritDoc
     *
     * @return string[]
     *
     * @since 4.1.0
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onCGIsotopeFilter'	=> 'filter',
            'onCGIsotopeRender'	=> 'render',
            'onCGIsotopeBefore'	=> 'before',
        ];
    }

{	
	/*
	*	onIsotopeFilter : add some filtering options
	*
	*   @context  string   must contain com_cgisotope.article
	*   @items array 	   contains all selected items
	*	
	*	@return boolean    always true
	*/
    public function filter($event)
    {
        $context	= $event[0];
        $items		= $event[1];

		if ($context != 'com_cgisotope.article') return true;
		
		return true;
	}
	/*
	*	onIsotopeRender : add some code before displaying isotope article
	*
	*   @context  string   must contain com_cgisotope.article
	*   @article object    one article
	*   @params  object    isotope params
	*   @page    obect     full item object
	*	
	*	@return boolean    always true
	*/
    public function render($event) // ($context, &$article, &$params, $item)
    {
        $context	= $event[0];
        $article	= $event[1];
        $params		= $event[2];
        $item		= $event[3];
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
    public function before($event) //($context, $obj)
    {
        $context    = $event[0];
        $obj        = $event[1];
		if ($context != 'com_cgisotope.article') return true;

		return true;
		}
	
	
}
?>