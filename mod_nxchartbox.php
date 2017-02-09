<?php
/**
 * Controller File for nx-Fields
 * @package     nx-Fields
 *
 * @copyright   Copyright (C) 2009 - 2016 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


// include the syndicate functions only once
require_once __DIR__ . '/helper.php';
require_once __DIR__ . '/printconfig.php';

// get the settings
$rndm = rand();
$set1 = $params->get( 'selector' );
$values = $params->get( 'chartdata' );

// Basic Settings
$basicsettings = $params->get( 'basicsettings' );
$displaytitle = $basicsettings->displaytitle;       //
$charttitle = $basicsettings->charttitle;           //
$headertag = $basicsettings->headertag;             //
$charttype = $basicsettings->charttype;             //  
$displaymode = $basicsettings->layoutselector;
$containerh = $basicsettings->containerheight;
$containerw = $basicsettings->containerwidth;
$chartalign = $basicsettings->chartalign;
$animatescale = $basicsettings->animatescale;       //
$aniduration = $basicsettings->aniduration;         //
$beginatzero = modnxchartBox::truefalse( $basicsettings->beginatzero ); //

// Configuration legend.xml
$legend = $params->get( 'legendsettings' );
$displaylegend = modnxchartBox::truefalse( $legend->displaylegend );
$legendpos = $legend->legendposition;
$legenditemboxwidth = $legend->legenditemboxwidth;
$legenditemfontsize = $legend->legenditemfontsize;
$legendfontstyle = $legend->legendfontstyle;
$legendfontcolor = $legend->legendfontcolor;



// Configuration labels.xml
$labels = $params->get( 'labelssettings' );

// Configuration scales.xml
$scalessetings = $params->get( 'scalessettings' );
$drawborder = modnxchartBox::truefalse( $scalessetings->drawborder );
$x_displaygridlines = modnxchartBox::truefalse( $scalessetings->displaygridlines_x );   //
$y_displaygridlines = modnxchartBox::truefalse( $scalessetings->displaygridlines_y );   //
$x_gridlineswidth = $scalessetings->gridlineswidth_x;
$y_gridlineswidth = $scalessetings->gridlineswidth_y;
$x_gridlinescolor = $scalessetings->gridlinescolor_x;
$y_gridlinescolor = $scalessetings->gridlinescolor_y;                   //
$x_displayzeroline = $scalessetings->displayzeroline_x;
$y_displayzeroline = $scalessetings->displayzeroline_y;                 //
$x_zerolinewidth = $scalessetings->zerolinewidth_x;
$y_zerolinewidth = $scalessetings->zerolinewidth_y;                    //
$x_zerolinecolor = $scalessetings->zerolinecolor_x;
$y_zerolinecolor = $scalessetings->zerolinecolor_y;                     //

$displayticks = modnxchartBox::truefalse( $scalessetings->displayticks );     //
$autoSkip = modnxchartBox::truefalse( $scalessetings->autoSkip );
$autoskippadding = $scalessetings->autoskippadding;
$minRota = $scalessetings->minRota;
$maxRota = $scalessetings->maxRota;
$tickfsize = $scalessetings->tickfsize;
$tickpadding = $scalessetings->tickpadding;
$tickcolor = $scalessetings->tickcolor;


// Advanced Settings
$displayconfig = $params->get('displayconfig');

if ($displayconfig == 1){
    $confprint = chartBoxprintout::legend( $displaylegend,$legendpos,$legenditemboxwidth,$legenditemfontsize,$legendfontstyle,$legendfontcolor );
};

$chartdata = modnxchartBox::getData( $values );
//$containersetup = modnxcharts::createContainer( $displaymode, $containerh , $containerw );
//$chartalignment = modnxcharts::setAlignment($chartalign);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require( JModuleHelper::getLayoutPath( 'mod_nxchartbox' ) );
?>
