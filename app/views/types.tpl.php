<p class="main-p">Cliquez sur un type pour voir tous les Pokémon de ce type</p>
<div class="types-list">
    
    <?php
    
    $typesList = $viewVars['typesList'];
    
    foreach ($typesList as $type) : ?>
    <div class="type-item <?= 'c' . $type->getColor() ?>"><a href="./type<?= $type->getId() ?>"><?= $type->getName() ?></a></div>
    <?php
    endforeach;
    ?>
</div>