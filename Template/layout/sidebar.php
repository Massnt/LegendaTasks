<li
    <?= $this->app->checkMenuSelection('LegendaController') ?>>
    <?= $this->url->link(t('Legenda de Tarefas'), 'LegendaController', 'show', array('plugin' => 'LegendaTasks', 'project_id' => $project['id'])) ?>
</li>
