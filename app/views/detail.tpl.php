<?php
$pokemon = $viewVars ['monPokemon'];
?>
<div class="details">
    <h2>Détails de <?= $pokemon[0]['nom'] ?></h2>
    
    <div class="details-main">
        <div class="details-main-img"><img src="img/<?= $pokemon[0]['numero'] ?>.png" alt="<?= $pokemon[0]['nom'] ?>"></div>
        <div class="details-main-stats">
            <h3><?= '#' . $pokemon[0]['numero'] . ' ' . $pokemon[0]['nom'] ?></h3>
            <div class="powers">
                <?php
                foreach ($pokemon as $type) :
                ?>
                <div class="detail-powers c<?= $type['color'] ?>"><a href="./type<?= $type['type_id'] ?>"><?= $type['name'] ?></a></div>
                <?php
                endforeach;
                ?>
            </div>
            <h5>Statistiques</h5>
            <div>
                <div class="stats">
                    <div class="stat">PV</div>
                    <div class="stat-value"><?= $pokemon[0]['pv'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['pv'] ?>) ">u</div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">Attaque</div>
                    <div class="stat-value"><?= $pokemon[0]['attaque'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['attaque'] ?>) ">u</div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">Défense</div>
                    <div class="stat-value"><?= $pokemon[0]['defense'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['defense'] ?>) ">u</div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">Attaque Spé.</div>
                    <div class="stat-value"><?= $pokemon[0]['attaque_spe'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['attaque_spe'] ?>) ">u</div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">Défense Spé.</div>
                    <div class="stat-value"><?= $pokemon[0]['defense_spe'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['defense_spe'] ?>) ">u</div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">Vitesse</div>
                    <div class="stat-value"><?= $pokemon[0]['vitesse'] ?></div>
                    <div class="stat-bar">
                        <div class="stat-bar-value" style="width: calc((100% / 255) * <?= $pokemon[0]['vitesse'] ?>) ">u</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="back" href="./">Retour à la liste</a>
</div>