<?php 
$pokemons = $viewVars['pokemons'];

if(!empty($pokemons)) {
    echo "<ul class='main_list'>";
    foreach($pokemons as $pokemon): ?>
        <li>
            <a href="<?= $_SERVER['BASE_URI']. '/detail/'. $pokemon['numero']; ?>">
                <img class="illustration" src="<?= $_SERVER['BASE_URI'] . '/img/' . $pokemon['numero'] . '.png' ?>" alt="<?= $pokemon['nom'] ?>">
                <div class="name"><span class="number">#<?= $pokemon['numero'] ?></span> <?= $pokemon['nom'] ?></div>
            </a>
        </li>
    <?php endforeach;
    echo "</ul>";
} else {
    echo "Oups, je n'ai rien trouvé !";
}