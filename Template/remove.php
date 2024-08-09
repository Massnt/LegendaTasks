<div class="page-header">
    <h2><?= t('Legenda') ?></h2>
</div>

<div class="confirm">
    <div class="alert alert-info">
        <?= t('Você desejar remover esta Legenda?')?>

        <br>
        <br>

        <div class="color-picker-square color-<?=$legenda['color_id']?>"></div>
        <div class="color-picker-label"><?=$legenda['nome']?></div>
    </div>

    <?= $this->modal->confirmButtons(
        'LegendaController',
        'remove',
        array('plugin' => 'LegendaTasks','id' => $legenda['id'])
    ) ?>
</div>
