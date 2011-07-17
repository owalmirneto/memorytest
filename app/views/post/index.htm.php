<form id="form_post" class="formular" method="post" action="<?php echo Mapper::base(); ?>/post/add">
    <fieldset>
        <legend><h2>Postar Comentário</h2></legend>
        <ul>
            <li>
                <textarea style="width: 100%" name="post" id="post"></textarea>
            </li>
        </ul>
        <div style="text-align: right">
            <input class="submit" type="submit" value="Postar Post"/><hr/>
        </div>
    </fieldset>
</form>
<div style="border: 1px solid;padding: 5px 10px">
    <h2>Comentários</h2>
    <?php if (is_array($posts)) { ?>
        <?php foreach ($posts as $key => $post) { ?>
            <hr />
            <div>
                <div style="float: left;">
                    <b><?php echo $post["usuario"]["nome"]; ?></b> <i>disse:</i>
                </div>
                <div style="clear: both;"><br /><?php echo $post["post"]; ?></div>
            </div>
            
        <?php } // endforeach; ?>
    <?php } else { ?>
        <?php echo $posts; ?>
    <?php } // endif; ?>
</div>
