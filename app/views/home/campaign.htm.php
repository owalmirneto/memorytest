<div id="modegame">
    <h2>Campaign</h2>
    <?php foreach ($jogosalvo as $key => $value) { ?>
        <a href="<?php echo $base ?>/start/campaign/<?php echo $value["nivel"]; ?>">
            <div class="active"><?php echo $value["nivel"]; ?></div>
        </a>
        <?php $current = $value["nivel"] + 1 ?>
    <?php } // endforeach; ?>
    <a href="<?php echo $base ?>/start/campaign/<?php echo $current; ?>">
        <div><?php echo $current; ?></div>
    </a>
    <?php for ($i = count($jogosalvo) + 1; $i < 6; $i++) { ?>
        <div class="inactive"><?php echo $i + 1; ?></div>
    <?php } // endfor; ?>
    <br clear="all" />
</div>