<?php
// Get the ACF field group
$values = get_field('values');

// Get the subfields from the group
$values_callout_text = $values['values_callout_text'];
$values_heading_text = $values['values_heading_text'];
?>

<div class="section values">
    <div class="row values__row">
        <p class="callout-text center">
            <?php echo $values_callout_text; ?>
        </p>

        <h2 class="values__heading">
            <?php echo $values_heading_text; ?>
        </h2>

        <div class="values__items">

            <?php
            $counter = 1;

            foreach ($values['values_items'] as $value) :
                // Load subfields
                $value_heading_text = $value['value_heading_text'];
                $value_body_text = $value['value_body_text'];

                // Loop output 
            ?>
                <div class="values__item">
                    <h2 class="values__item__index">
                        0<?php echo $counter; ?>
                    </h2>

                    <h3 class="values__item__heading">
                        <?php echo $value_heading_text; ?>
                    </h3>

                    <div class="values__item__content">
                        <?php echo $value_body_text; ?>
                    </div>
                </div>

            <?php
                $counter++;
            endforeach;
            ?>
        </div>
    </div>
</div>