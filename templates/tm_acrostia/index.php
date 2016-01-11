<?php
/*-----------------------------------------------------------------------
#package     TM Acrostia Joomla Template
#author      Templatemesh http://www.templatemesh.com
#copyright   Copyright under commercial licence (C) 2013 - 2014 Templatemesh
------------------------------------------------------------------------*/

/**---------------------------------------------------------------------
 * @package Helix Framework Credit
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2013 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
------------------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');   

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"  lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"  lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"  lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <jdoc:include type="head" />
        <?php
            $this->helix->Header()
			->addCSS('jquery.mCustomScrollbar.css')
			->addCSS('animation.css')
            ->setLessVariables(array(
                    'preset'=>$this->helix->Preset(),
                    'header_color'=> $this->helix->PresetParam('_header'),
                    'bg_color'=> $this->helix->PresetParam('_bg'),
                    'text_color'=> $this->helix->PresetParam('_text'),
                    'link_color'=> $this->helix->PresetParam('_link')
                ))
            ->addLess('master', 'template')
            ->addLess( 'presets',  'presets/'.$this->helix->Preset())
			->addJS('topfixed.js')
			->addCSS('custom.css');
        ?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>	
		<?php
		$doc = JFactory::getDocument();
		$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/modernizr.custom.92416.js', 'text/javascript');
		?>
    </head>
    <body <?php echo $this->helix->bodyClass('bg hfeed clearfix'); ?>>
		<div class="body-innerwrapper">
        <!--[if lt IE 8]>
        <div class="chromeframe alert alert-danger" style="text-align:center">You are using an <strong>outdated</strong> browser. Please <a target="_blank" href="http://browsehappy.com/">upgrade your browser</a> or <a target="_blank" href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
        <![endif]-->
        <?php
            $this->helix->layout();
            $this->helix->Footer();
        ?>
        <jdoc:include type="modules" name="debug" />
		</div>
		<script src="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template; ?>/js/jquery.singlePageNav.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
            // Prevent console.log from generating errors in IE for the purposes of the demo
            if ( ! window.console ) console = { log: function(){} };

            // The actual plugin
            jQuery('#sp-header-wrapper #sp-menu').singlePageNav({
                offset: jQuery('#sp-header-wrapper #sp-menu').outerHeight(),
				filter: ':not(.parent .last,.parent .menu-item,.last)',
                beforeStart: function() {
                    console.log('begin scrolling');
                },
                onComplete: function() {
                    console.log('done scrolling');
                }
            })});

        </script>
    </body>
</html>