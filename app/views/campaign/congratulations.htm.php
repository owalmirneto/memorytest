<!--<form action="http://localhost/memorytest/campaign/congratulations/1/1/2/01-22" method="post">
    <input name="errors" value="1" />
    <input name="hits" value="2" />
    <input name="time" value="01-52" />
    <input type="submit" />
</form>-->

<div id="config">
    <div id="header">
        <h2>
            <?php echo $usuario["nome"] ?> 
            <?php if ($level > 6) { ?>, Congratulations! Well done.<?php } // endif; ?>
        </h2>
    </div>
    <div id="buttons">
        <ul>
            <li id="time">Time: <?php echo $time ?> (<em>bonus</em>)</li>
            <li id="hits">Hits: <?php echo $hits ?> X 50 points</li>
            <li id="errors">Errors: <?php echo $errors ?> X (-5 points)</li>
            <li id="point">Total: <?php echo $points ?> points</li>
        </ul>
        <a href="<?php echo $base = Mapper::base(); ?>/campaign/start/<?php echo $level + 1; ?>" class="button"> 
            <?php if ($level > 6) { ?>Congratulations! Well done<?php } else { ?>Next level<?php } // endif; ?>
        </a>
    </div>
</div>


