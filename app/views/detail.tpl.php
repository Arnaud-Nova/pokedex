<?php 

$pokemon = $viewVars['pokemon']; 
$types = $viewVars['types'];

if(!$pokemon) :
    echo "Oups, ce pokémon n'existe pas !";
else: ?>
    <div class="main_pokemon">
        <h1>Détails de <?php echo $pokemon['nom'] ?></h1>
        <div class="wrapper">
            <div class="left_side">
                <img class="illustration" src="<?= $_SERVER['BASE_URI'] . '/img/' . $pokemon['numero'] . '.png' ?>" alt="<?= $pokemon['nom'] ?>">
            </div>
            <div class="right_side">
                <h2 class="title"><span>#<?= $pokemon['numero']; ?></span> <?= $pokemon['nom'] ?></h2>
                <div class="types">
                    <ul>
                        <?php 
                        foreach($types as $type):
                            echo "<li class='type' style='background:#".$type['color']."'>" . $type['name'] . "</li>";              
                        endforeach; 
                        ?>
                    </ul>
                </div>
                <div class="stats">
                    <h3>Statistiques</h3>
                    <div class="stat">
                        <div class="label">PV</div>
                        <div class="value"><?php echo $pokemon['pv'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['pv'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque</div>
                        <div class="value"><?php echo $pokemon['attaque'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['attaque'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense</div>
                        <div class="value"><?php echo $pokemon['defense'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['defense'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque Spé.</div>
                        <div class="value"><?php echo $pokemon['attaque_spe'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['attaque_spe'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense spé.</div>
                        <div class="value"><?php echo $pokemon['defense_spe'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['defense_spe'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Vitesse</div>
                        <div class="value"><?php echo $pokemon['vitesse'] ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon['vitesse'] * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back" href="<?= $_SERVER['BASE_URI'] ?>">Revenir à la liste</a>
    </div>
<?php endif;

