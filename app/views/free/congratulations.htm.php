<?php
echo "<pre>";
print_r($usuario);
die("<br /><br />Linha: " . __LINE__);
?>
<div id="config">
    <div id="header">
        <h2><?php echo $usuario["nome"] ?>, congratulations!</h2>
    </div>
    <div id="buttons">
        <ul>
            <li id="time">Time: <?php echo $time ?> (<em>bonus</em>)</li>
            <li id="hits">Hits: <?php echo $hits ?> X 50 points</li>
            <li id="errors">Errors: <?php echo $errors ?> X (-5 points)</li>
            <li id="point">Total: <?php echo $points ?> points</li>
        </ul>
        <a href="<?php echo $base = Mapper::base(); ?>/free" class="button">Play again</a>
    </div>
</div>
