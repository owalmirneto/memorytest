<?php $base = Mapper::base(); ?>
<div id="points">
    <div id="errors">Errors: <span>0</span></div>
    <div id="hits">Hits: <span>0</span></div>
    <div id="time">Time: <span>00:00:00</span></div>
</div>
<br clear="all" />
<div class="sponsorListHolder">
    <!--Looping through the array-->
    <?php foreach ($charts as $key => $chart) { ?>
        <div class="sponsor">
            <div class="sponsorFlip" id="close_<?php echo $key; ?>"> 
                <div  title="Clique para virar"> 
                    <?php echo $html->image("sponsors/verso.png"); ?> 
                </div> 
            </div> 
            <div class="sponsorData"> 
                <?php echo $html->image("charts/{$chart["img"]}.png", array("alt" => $chart["img"])); ?> 
            </div> 
        </div>
    <?php } // endforeach; ?>
    <div class="clear"></div>
</div>
<a id="winner" href="<?php echo $base; ?>/home/congratulations" rel="content-600-300" class="pirobox_gall1"></a>
<input type="hidden" id="first" />
<input type="hidden" id="idfirst" />
<input type="hidden" id="second" />
<input type="hidden" id="idsecond" />
<input type="hidden" id="qtdcharts" value="<?php echo count($charts); ?>" />
