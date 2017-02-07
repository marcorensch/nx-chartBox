<?php
/**
 * Printout File for nx-fields
 * @package     nx-fields
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
                    label: '# of Votes',
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
                responsive:false,                           // true or false if false width setting will be taken
                scales: {
                    xAxes:[{
                        gridLines: {
                            display:<?php echo $displaygridlines; ?>,
                            color: "<?php echo $gridlinescolor; ?>",
                            lineWidth:<?php echo $gridlineswidth; ?>,
                            <?php if($displayzerolines == 1){
                                echo 'zeroLineWidth:'.$zerolinewidth.',';
                                echo 'zeroLineColor:"'.$zerolinecolor.'",';
                                };
                            ?>
                            drawBorder:<?php echo $drawborder ?>

                        },
                        ticks: {
                            display: <?php echo $displayticks; ?>,                  // Hide Axis Title
                            min:10,
                            max:500,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display:<?php echo $displaygridlines; ?>,
                            color: "<?php echo $gridlinescolor; ?>",
                            lineWidth:<?php echo $gridlineswidth; ?>,
                            <?php if($displayzerolines == 1){
                                echo 'zeroLineWidth:'.$zerolinewidth.',';
                                echo 'zeroLineColor:"'.$zerolinecolor.'",';
                                };
                            ?>
                            drawBorder:<?php echo $drawborder ?>
                        },
                        ticks: {
                            beginAtZero:<?php echo $beginatzero; ?>,
                            display: <?php echo $displayticks; ?>                  // Hide Axis Title
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
