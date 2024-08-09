<div class="page-header">
    <h2><?= t('Legenda de Tarefas') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('plus', t('Adicionar legenda'), 'LegendaController', 'create', array('plugin' => 'LegendaTasks', 'project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>

<?php if (! empty($legendas)): ?>
    <h3><?= t('Legendas Existentes') ?></h3>
    <table>
        <?php foreach ($legendas as $legenda): ?>
            <?php if($legenda['project_id'] == $project['id']) : ?>
                <tr>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                            <ul>
                                <li>
                                    <?= $this->modal->medium('edit', t('Edit'), 'LegendaController', 'edit', array('plugin' => 'LegendaTasks','project_id' => $project['id'], 'legenda_id' => $legenda['id'])) ?>
                                </li>
                                <li>
                                    <?= $this->modal->confirm('trash-o', t('Remove'), 'LegendaController', 'confirm', array('plugin' => 'LegendaTasks', 'id' => $legenda['id'])) ?>
                                </li>
                            </ul>
                        </div>
                        <div class="color-picker-square color-<?= $legenda['color_id'] ?>"></div><div class="color-picker-label"><?=$legenda['nome']?></div>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach ?>
    </table>
<?php endif ?>