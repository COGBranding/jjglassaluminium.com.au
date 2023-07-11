<?php
// Get the ACF field group
$service_hero = get_field('single_service_hero');

// Get the subfields from the group
$service_hero_image = $service_hero['single_service_hero_image'];
$service_heading_text = $service_hero['single_service_hero_heading_text'];
$service_body_text = $service_hero['single_service_hero_body_text'];
$service_button_text = $service_hero['single_service_hero_button_text'];
$service_button_url = $service_hero['single_service_hero_button_url'];

// Conditional logic for field content
// If the field is not empty, display the field content, else display something else
$title = !empty($service_heading_text) ? $service_heading_text : get_the_title();
$button_text = !empty($service_button_text) ? $service_button_text : "Contact us";
$button_url = !empty($service_button_url) ? $service_button_url : "https://tradehq.com.au/jjglassandaluminium/enquire";
?>

<div class="section hero--service show-for-desktop" style="background-image: url('<?php echo $service_hero_image['url']; ?>')">
    <div class="row hero--service__row">
        <div class="hero--service__content-wrapper">
            <h1 class="hero--service__title">
                <?php echo $title; ?>
            </h1>

            <p class="hero--service__content">
                <?php echo $service_body_text; ?>
            </p>

            <a href="<?php echo $button_url; ?>">
                <button type="button" class="btn btn--aqua">
                    <?php echo $button_text; ?>
                </button>
            </a>
        </div>
    </div>
</div>

<div class="section hero--service show-for-mobile dark-header">
    <div class="row hero--service__row">
        <div class="hero--service__content-wrapper">
            <h1 class="hero--service__title">
                <?php echo $title; ?>
            </h1>

            <p class="hero--service__content">
                <?php echo $service_body_text; ?>
            </p>

            <a href="<?php echo $button_url; ?>">
                <button type="button" class="btn btn--aqua">
                    <?php echo $button_text; ?>
                </button>
            </a>
        </div>

        <div class="hero__image" style="background-image: url('<?php echo $service_hero_image['url']; ?>')"></div>
    </div>
</div>