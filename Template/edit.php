<div class="page-header">
    <h2><?= t('Legenda') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('LegendaController', 'update', array('plugin' => 'LegendaTasks', 'project_id' => $project['id'], 'id' => $legenda['id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Legenda'), 'nome') ?>
    <?= $this->form->text('nome', $values, $errors, array('autofocus', 'required', 'tabindex="1"')) ?>

    <?= $this->task->renderColorField($values) ?>

    <?= $this->modal->submitButtons() ?>
</form>
