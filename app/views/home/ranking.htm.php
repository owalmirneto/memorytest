<table width="100%" border="1" cellpadding="5">
    <?php if (is_array($recordes)) { ?>
        <thead>
            <tr>
                <th colspan="5"><?php echo $recordes[0]["modo"]["nome"]; ?></th>
            </tr>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Erros</th>
                <th>Acertos</th>
                <th>Tempo</th>
                <th>Pontos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recordes as $key => $recorde) { ?>
                <tr>
                    <td><?php echo $key+1 ?>º </td>
                    <td> <?php echo $recorde["usuario"]["nome"]; ?></td>
                    <td><?php echo $recorde["erros"]; ?></td>
                    <td><?php echo $recorde["acertos"]; ?></td>
                    <td><?php echo $recorde["tempos"]; ?></td>
                    <td><?php echo $recorde["pontos"]; ?></td>
                </tr>
            <?php } // endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="2"><?php echo $recordes; ?></td>
            </tr>
        <?php } // endif; ?>
    </tbody>
</table>
