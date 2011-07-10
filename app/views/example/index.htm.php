<!-- 
    Não sei se essa é a forma mais correta de usar  mas não conseguir usar o $this->render
    que é muito parecido com o do Zend mas deve ter suas particularidades
-->
<?php include_once APP . DS . "views" . DS . "example" . DS . "_title.php" ?>
<div id="grid">
    <table cellspacing="0" cellpadding="5" border="0" width="100%">
        <thead>
            <tr>
                <th width="15" class="ui-state-default ui-corner-tl"><input type="checkbox" class="check-all" /></th>
                <th width="30" class="ui-state-default">Id</th>
                <th class="ui-state-default">Nome</th>
                <th width="100" class="ui-state-default ui-corner-tr">Actions</th>
            </tr>
        </thead>
        <tbody style="">
            <!-- 
                Não descobrir como usar o base_url nativo 
                e criei uma constante BASE_URL
            -->
            <?php foreach ($examples as $key => $example) { ?>

                <tr>
                    <td><input type="checkbox" /></td>
                    <td><?php echo $example["id"]; ?></td>
                    <td><?php echo $example["nome"]; ?></td>
                    <td>
                        <ul id="icons" class="ui-list" style="float: right">
                            <a href="<?php echo BASE_URL; ?>/example/view/<?php echo $example["id"]; ?>">
                                <li class="ui-state-default ui-corner-all" title="search">
                                    <span class="ui-icon ui-icon-search" title="search">search</span>
                                </li>
                            </a>
                            <a href="<?php echo BASE_URL; ?>/example/edit/<?php echo $example["id"]; ?>">
                                <li class="ui-state-default ui-corner-all" title="pencil">
                                    <span class="ui-icon ui-icon-pencil" title="pencil">pencil</span>
                                </li>
                            </a>
                            <a href="<?php echo BASE_URL; ?>/example/delete/<?php echo $example["id"]; ?>">
                                <li class="ui-state-default ui-corner-all" title="trash">
                                    <span class="ui-icon ui-icon-trash" title="trash">trash</span>
                                </li>
                            </a>
                        </ul>
                    </td>
                </tr>

            <?php } // endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="ui-state-default">
                <td colspan="100" align="center" class="ui-state-default ui-corner-bottom">
                    <ul id="icons" class="ui-list paginator">
                        <li class="ui-state-default ui-corner-all" title="First">
                            <span class="ui-icon ui-icon-seek-first" title="First">First</span>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="prev">
                            <span class="ui-icon ui-icon-seek-prev" title="prev">prev</span>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="1">
                            <a href="#" title="1">1</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="2">
                            <a href="#" title="2">2</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="3">
                            <a href="#" title="3">3</a>
                        </li>
                        <li class="ui-state-active  ui-corner-all" title="4">
                            <a>4</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="5">
                            <a href="#" title="5">5</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="6">
                            <a href="#" title="6">6</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="7">
                            <a href="#" title="7">7</a>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="next">
                            <span class="ui-icon ui-icon-seek-next" title="next">next</span>
                        </li>
                        <li class="ui-state-default ui-corner-all" title="Last">
                            <span class="ui-icon ui-icon-seek-end" title="Last">Last</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
