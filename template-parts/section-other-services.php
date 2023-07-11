<?php
$other_services_heading = get_field('other_services_heading_text', 'option');
?>

<div class="section other-services">
    <div class="row other-services__row">
        <h2 class="other-services__heading">
            <?php echo $other_services_heading; ?>
        </h2>

        <div class="card__items">
            <?php
            // Check if rows exist
            if (have_rows('other_services', 'option')) :

                // Loop through the rows
                while (have_rows('other_services', 'option')) :
                    the_row();

                    // Get the subfield values
                    $service_icon = get_sub_field('single_service_icon');
                    $service_heading = get_sub_field('single_service_heading');
                    $service_description = get_sub_field('single_service_description');

                    // Loop output 
            ?>
                    <div class="card card--service">
                        <div class="card--service__icon">
                            <img src="<?php echo $service_icon['url']; ?>" />
                        </div>

                        <h4 class="card--service__heading">
                            <?php echo $service_heading; ?>
                        </h4>

                        <p class="card--service__content">
                            <?php echo $service_description; ?>
                        </p>
                    </div>

            <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>