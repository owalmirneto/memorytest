<div id="config" >
    <div id="header">
        <h2><?php echo $_SESSION["data"]["congratulations"] ?></h2>
    </div>
    <div id="buttons">
        <ul>
            <li id="time">Tempo gasto: <?php echo $_SESSION["data"]["time"] ?> (<em>bonus</em>)</li>
            <li id="hits">Acertos: <?php echo $_SESSION["data"]["hits"] ?> X 50 pontos</li>
            <li id="errors">Erros: <?php echo $_SESSION["data"]["errors"] ?> X (-20 pontos)</li>
            <li id="point">Total de pontos: <?php echo $_SESSION["data"]["points"] ?> points</li>
        </ul>
        <a href="<?php echo $_SESSION["data"]["href"] ?>" class="button"><?php echo $_SESSION["data"]["link"] ?></a>
    </div>
</div>
<?php unset($_SESSION["data"]); ?>