<?php
// Get the ACF repeater field
$types_of_glass = get_field('types_of_glass', 'option');
?>

<div class="tabs__item tabs__item--types-of-glass">
    <h2 class="tabs__item__heading">Types of glass</h2>

    <div class="tabs__items">
        <?php foreach ($types_of_glass as $type_of_glass) {
        ?>

            <div class="tabs__items__content">
                <h4><?php echo $type_of_glass['heading_text']; ?></h4>
                <p><?php echo $type_of_glass['description_text'] ?></p>
            </div>

        <?php
        }
        ?>
    </div>
</div>