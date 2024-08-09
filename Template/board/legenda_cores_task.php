<?php if(!empty($legendas)) :?>
    <div id="legenda-componente" class="hide">
        <div class="btn-legenda" id="btn-icone"><a class="icone">?</a></div>
        <div class="color-legend hide" id="legenda">
            <h3 style="margin-bottom: 5px">Legenda Chamados</h3>
            <ul style="list-style: none;">
    <?php foreach ($legendas as $legenda): ?>
                    <li><div class="color-picker-square color-<?=$legenda['color_id']?>"></div><div class="color-picker-label"><?=$legenda['nome']?></div></li>
    <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

