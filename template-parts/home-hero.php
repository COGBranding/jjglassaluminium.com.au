<?php
// Get the ACF field group
$hero = get_field('hero_section');

// Get subfields from group
$hero_background_image = $hero['hero_background_image'];
$hero_heading_text = $hero['hero_heading_text'];
$hero_body_text = $hero['hero_body_text'];
$hero_primary_button_text = $hero['hero_primary_button_text'];
$hero_primary_button_url = $hero['hero_primary_button_url'];
$hero_secondary_button_text = $hero['hero_secondary_button_text'];
$hero_secondary_button_url = $hero['hero_secondary_button_url'];

// Render desktop layout for 981px and above 
?>
<div class="section hero show-for-desktop" style="background-image: url('<?php echo $hero_background_image['url']; ?>')">
    <div class="hero__overlay"></div>
    <div class="row hero__row">
        <div class="hero__content-wrapper">
            <h1 class="hero__heading">
                <?php echo $hero_heading_text; ?>
            </h1>

            <p class="hero__content">
                <?php echo $hero_body_text; ?>
            </p>

            <div class="btn--wrapper">
                <a href="<?php echo $hero_primary_button_url; ?>">
                    <button type="button" class="btn btn--white">
                        <?php echo $hero_primary_button_text; ?>
                    </button>
                </a>

                <?php if (!empty($hero_secondary_button_text)) : ?>
                    <a href="<?php echo $hero_secondary_button_url; ?>">
                        <button type="button" class="btn btn--white-outline">
                            <?php echo $hero_secondary_button_text; ?>
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <a href="#about">
        <div class="hero__scroll-icon"></div>
    </a>
</div>

<?php // Render mobile layout for 980px and below 
?>
<div class="section hero show-for-mobile dark-header">
    <div class="row hero__row">
        <div class="hero__content-wrapper">
            <h1 class="hero__heading">
                <?php echo $hero_heading_text; ?>
            </h1>

            <p class="hero__content">
                <?php echo $hero_body_text; ?>
            </p>

            <div class="btn--wrapper">
                <a href="<?php echo $hero_primary_button_url; ?>">
                    <button type="button" class="btn btn--white">
                        <?php echo $hero_primary_button_text; ?>
                    </button>
                </a>

                <?php if (!empty($hero_secondary_button_text)) : ?>
                    <a href="<?php echo $hero_secondary_button_url; ?>">
                        <button type="button" class="btn btn--white-outline">
                            <?php echo $hero_secondary_button_text; ?>
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero__image" style="background-image: url('<?php echo $hero_background_image['url']; ?>')"></div>
    </div>
</div>