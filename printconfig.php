<?php

/**
 * Configuration Frontend Printout for nx-chartBox
 * @package     nx-chartBox
 *
 * @copyright   Copyright (C) 2009 - 2016 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );
class chartBoxprintout {
    public static function legend($displaylegend,$legendpos,$legenditemboxwidth,$legenditemfontsize,$legendfontstyle,$legendfontcolor)
    {    
        $print ='<div class="nx-debug legend">
    <table class="table">
        <tr>
            <th><h3>Legend Settings</h3></th>
            <td></td>
        </tr>
        <tr>
            <th>Display Legend</th>
            <td>'.$displaylegend.'</td>
        </tr>
        <tr>
            <th>Legend Position</th>
            <td>'.$legendpos.'</td>
        </tr>
        <tr>
            <th>Legend Item Colorbox Width</th>
            <td>'.$legenditemboxwidth.'</td>
        </tr>
        <tr>
            <th>Legend Item Fontsize</th>
            <td>'.$legenditemfontsize.'</td>
        </tr>
        <tr>
            <th>Legend Item Fontstyle</th>
            <td>'.$legendfontstyle.'</td>
        </tr>
        <tr>
            <th>Legend Item Fontcolor</th>
            <td><div class="nx-colorbox" style="background-color:'.$legendfontcolor.'"></div>
                '.$legendfontcolor.'
            </td>
        </tr>       
    </table>
</div>';
        
        return $print;
        
    }
}

?>