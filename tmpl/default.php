<?php
/**
 * Printout File for nx-chartBox
 * @package     nx-chartBox
 *
 * @copyright   Copyright (C) 2009 - 2016 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<script type="text/javascript">
    var array_names_<?php echo $rndm; ?> = [];
    var array_description_<?php echo $rndm; ?> = [];
    var array_values_<?php echo $rndm; ?> = [];
    var array_colors_<?php echo $rndm; ?> = [];
    var array_bcolors_<?php echo $rndm; ?> = [];
    
    <?php foreach ($chartdata as $item) : ?>
        array_names_<?php echo $rndm; ?>.push("<?php echo $item->name; ?>");
        array_description_<?php echo $rndm; ?>.push("<?php echo $item->description; ?>");
        array_values_<?php echo $rndm; ?>.push("<?php echo $item->value; ?>");
        array_colors_<?php echo $rndm; ?>.push("<?php echo $item->color; ?>");
        array_bcolors_<?php echo $rndm; ?>.push("<?php echo $item->bordercolor; ?>");
    <?php endforeach; ?>
    console.log(array_names_<?php echo $rndm; ?>);
    console.log(array_colors_<?php echo $rndm; ?>);

</script>

<script type="text/javascript">
    var $ = jQuery.noConflict();
    $(document).ready(function(){      
        var ctx = $("#theChart_<?php echo $rndm; ?>");
        var theChart_<?php echo $rndm; ?> = new Chart(ctx, {
            type: '<?php echo $charttype; ?>',
            data: {
                labels: array_names_<?php echo $rndm; ?>,
                datasets: [{
                    //label: array_names_<?php echo $rndm; ?>,
                    data: array_values_<?php echo $rndm; ?>,
                    backgroundColor: array_colors_<?php echo $rndm; ?>,
                    borderColor: array_bcolors_<?php echo $rndm; ?>,
                    borderWidth: 1
                }]
            },
            showScale: false,                               // true or false
            options: {
                animation:{
                    animateScale:<?php echo $animatescale ?>,
                    duration:<?php echo $aniduration ?>
                },
                responsive:false,                                                   // true or false if false width setting will be taken
                scales: {
                    xAxes:[{
                        gridLines: {
                            display:<?php echo $y_displaygridlines; ?>,
                            color: "<?php echo $y_gridlinescolor; ?>",
                            lineWidth:<?php echo $y_gridlineswidth; ?>,
                            <?php if($y_displayzeroline == 1){
                                echo 'zeroLineWidth:'.$y_zerolinewidth.',';
                                echo 'zeroLineColor:"'.$y_zerolinecolor.'",';
                                };
                            ?>
                            drawBorder:<?php echo $drawborder ?>

                        },
                        ticks: {
                            display: <?php echo $displayticks; ?>,                  // Hide Axis Title
                            fontColor:"<?php echo $tickcolor; ?>",                  // Color of the labels
                            min:10,
                            max:500
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display:<?php echo $x_displaygridlines; ?>,
                            color: "<?php echo $x_gridlinescolor; ?>",
                            lineWidth:<?php echo $x_gridlineswidth; ?>,
                            <?php if($x_displayzeroline == 1){
                                echo 'zeroLineWidth:'.$x_zerolinewidth.',';
                                echo 'zeroLineColor:"'.$x_zerolinecolor.'",';
                                };
                            ?>
                            drawBorder:<?php echo $drawborder ?>
                        },
                        ticks: {
                            beginAtZero:<?php echo $beginatzero; ?>,
                            display: <?php echo $displayticks; ?>,                  // Hide Axis Title
                            fontColor:"<?php echo $tickcolor; ?>"                   // Color of the labels
                        }
                    }]
                }
            }
        });
    });

</script>
<div class="nx-container<?php echo $moduleclass_sfx; ?>" style="">
    <?php if ($displaytitle == 1){echo '<'.$headertag.' class="nx-charttitle">'.$charttitle.'</'.$headertag.'>';}; ?>
    <canvas id="theChart_<?php echo $rndm; ?>" style="<?php echo $chartalignment; ?>" width="<?php echo $containerw; ?>" height="<?php echo $containerh; ?>"></canvas>
    <?php if ($displayconfig == 1){
        echo $confprint;
    }?>
</div>