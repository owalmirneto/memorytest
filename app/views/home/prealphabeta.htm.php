<h1>Memory Test</h1>
<div id="main">
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
    <input type="hidden" id="first" />
    <input type="hidden" id="idfirst" />
    <input type="hidden" id="second" />
    <input type="hidden" id="idsecond" />
</div>
