<table width="100%" border="1">
    <thead>
        <tr>
            <th colspan="2"><?php echo $recordes[0]["modo_id"]; ?></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($recordes)) { ?>
            <?php foreach ($recordes as $key => $recorde) { ?>
                <tr>
                    <td><?php echo $recorde["usuario_id"]; ?></td>
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