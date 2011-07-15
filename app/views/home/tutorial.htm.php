<?php $base = Mapper::base(); ?>
<br clear="all" />
<div class="sponsorListHolder" style="margin: auto;width:225px">
    <!--Looping through the array-->
    <?php foreach ($charts as $key => $chart) { ?>
        <div class="sponsor">
            <div class="sponsorFlip" id="close_<?php echo $key; ?>"> 
                <div  title="Clique para virar">
                    <?php echo $key + 1; ?>
                    <?php echo $html->image("verso.png"); ?> 
                </div> 
            </div> 
            <div class="sponsorData"> 
                <?php echo $html->image("charts/{$chart["tema"]["tema"]}/{$chart["imagem"]}", array("alt" => $chart["descricao"])); ?> 
            </div> 
        </div>
    <?php } // endforeach; ?>
    <div class="clear"></div>
</div>
<a id="winner" href="<?php echo $base; ?>/free/congratulations" rel="content-400-300" class="pirobox_gall1"></a>
<input type="hidden" id="first" />
<input type="hidden" id="idfirst" />
<input type="hidden" id="second" />
<input type="hidden" id="idsecond" />
<input type="hidden" id="qtdcharts" value="<?php echo count($charts); ?>" />
