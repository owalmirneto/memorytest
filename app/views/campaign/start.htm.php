<?php $base = Mapper::base(); ?>
<div id="points" style="margin: auto;">
    <div id="errors">Errors: <span>0</span></div>
    <div id="hits">Hits: <span>0</span></div>
    <div id="time">Time: <span>01:00</span></div>
    <div id="modo" style="display:none" >2</div>
</div>
<br clear="all" />
<div class="sponsorListHolder" style="margin: auto;">
    <!--Looping through the array-->
    <?php foreach ($charts as $key => $chart) { ?>
        <div class="sponsor">
            <div class="sponsorFlip" id="close_<?php echo $key; ?>"> 
                <div  title="Clique para virar"> 
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
<div style="text-align: center">
    <div id="navigator" style="display:none"><a id="submit" href="<?php echo $base; ?>/campaign/start/<?php echo $level+1; ?>"><b>Próximo nível!</b></a></div>
</div>

<a id="winner" href="<?php echo $base; ?>/campaign/congratulations/<?php echo $level; ?>" rel="content-400-300" class="pirobox_gall1"></a>
<input type="hidden" id="first" />
<input type="hidden" id="idfirst" />
<input type="hidden" id="second" />
<input type="hidden" id="idsecond" />
<input type="hidden" id="qtdcharts" value="<?php echo count($charts); ?>" />
