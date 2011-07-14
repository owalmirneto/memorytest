<?php $base = Mapper::base(); ?>
<div id="config">
    <div id="header">
        <h2>Highrecords</h2>
    </div>
    <div id="tabs">
        <div>
            <?php if (is_array($modos)) { ?>
                <?php foreach ($modos as $key => $modo) { ?>
                    <div title="<?php echo $modo["nome"]; ?>" alt="<?php echo $modo["id"]; ?>"><a><?php echo $modo["nome"]; ?></a></div>
                <?php } // endforeach; ?>
            <?php } // endif; ?>
        </div>
        <div class="content">Conteudo aqui</div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#tabs div div").click( function () {
            content = $(this).parent("div").siblings("div.content");
            $.post("<?php echo $base; ?>/home/ranking", {modo_id: $(this).attr("alt")}, function (data) {
                content.html(data);
            });
        });
    });
</script>