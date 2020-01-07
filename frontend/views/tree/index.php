<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 07.01.2020
 * Time: 19:07
 */
?>


<div class="tree">
    <div class="crown">
        <?php foreach ($apples as $apple):?>
            <?php if ($apple->status->name === 'hanging'): ?>
            <div class="apple <?=$apple->color->name?>" style="
                top: <?=$apple->pos_y?>px;
                left: <?=$apple->pos_x?>px;
                transform: scale(<?=$apple->size?>);
            ">
            </div>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    <div class="body">

    </div>
    <div class="ground">
        <?php foreach ($apples as $apple):?>
            <?php if ($apple->status->name !== 'hanging'): ?>
                <div class="apple <?=$apple->status->name === 'tainted' ? 'tainted' : $apple->color->name?>" style="
                    top: <?=$apple->pos_y?>px;
                    left: <?=$apple->pos_x?>px;
                    transform: scale(<?=$apple->size?>);
                ">
                </div>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>
