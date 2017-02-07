<?php

/**
 * Helper Datei für die nx-Fields 
 * @package     nx-Fields
 *
 * @copyright   Copyright (C) 2009 - 2016 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


JHtml::_('jquery.framework');

$document = JFactory::getDocument();


$chartjs = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js';

$maincssurl = 'modules/mod_nxchartbox/tmpl/css/main.css';


$document->addScript($chartjs);
$document->addStyleSheet($maincssurl);

class modnxchartBox
    
{
    public static function getData ( $values )
    {
        $fields = $values;
		return $fields;
    }
    
    public static function truefalse ( $setup )
    {   
        if ($setup == 0){
            $txtvalue = 'false';
        }elseif ($setup == 1){
            $txtvalue = 'true';
        }else{
            $txtvalue = 'undefined';
        }
        return $txtvalue;
    }
    
    public static function createContainer ($displaymode, $containerh , $containerw)
    {
        if ($displaymode == 1) {
            
            $setup = ' width:'.$containerw.'px; height:'.$containerh.'px; ';
            
        }else{
            
            $setup = '';
            
        }
        
        return $setup;
    }
    
    public static function setAlignment ($chartalign)
    {
        if ($chartalign == 0){
            // align left
            $setup = 'margin-left:0; margin-right:auto;';
        }elseif ($chartalign == 1){
            // align center
            $setup = 'margin-left:auto; margin-right:auto;';
        }elseif ($chartalign == 2){
            // align right
            $setup = 'margin-left:auto; margin-right:0;';
        }
        
        return $setup;
    }
    public static function configprintout ( $setup )
    {
        if ($setup == 1){
            $msg = $configprint;
        }else{
            $msg = '';
        }
        return $msg;
    }
}

?>
