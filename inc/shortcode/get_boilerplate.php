<?php
if (!defined('WPINC')) {
    die;
}

function get_boilerplate()
{
    // Get the boilerplate type
    $boilerplate_type = get_field('boilerplate_type');

    // Get the ACF group
    $boilerplate_content = get_field('contact_boilerplate_content');

    // Get the subfields from the group
    $boilerplate_callout_text = (isset($boilerplate_content['contact_boilerplate_callout_text']) ? $boilerplate_content['contact_boilerplate_callout_text'] : '');
    $boilerplate_heading_text = (isset($boilerplate_content['contact_boilerplate_heading_text']) ? $boilerplate_content['contact_boilerplate_heading_text'] : '');
    $boilerplate_show_body_text = (isset($boilerplate_content['contact_boilerplate_show_body_text']) ? $boilerplate_content['contact_boilerplate_show_body_text'] : '');
    $boilerplate_body_text = (isset($boilerplate_content['contact_boilerplate_body_text']) ? $boilerplate_content['contact_boilerplate_body_text'] : '');
    $boilerplate_button_text = (isset($boilerplate_content['contact_boilerplate_button_text']) ? $boilerplate_content['contact_boilerplate_button_text'] : '');
    $boilerplate_button_url = (isset($boilerplate_content['contact_boilerplate_button_url']) ? $boilerplate_content['contact_boilerplate_button_url'] : '');

    $render_section_class = (!$boilerplate_show_body_text === true) ? "no-body" : "";

    if ($boilerplate_type === "contact") {
        // Render the contact component 
?>
        <div class="section boilerplate <?php echo $render_section_class; ?>">
            <div class="row boilerplate__row">
                <div class="boilerplate__content-wrapper">
                    <p class="callout-text">
                        <?php echo $boilerplate_callout_text; ?>
                    </p>

                    <h2 class="boilerplate__heading">
                        <?php echo $boilerplate_heading_text; ?>
                    </h2>

                    <?php // Check if the show body text is ticked/true
                    if ($boilerplate_show_body_text === true) : ?>
                        <p class="boilerplate__content">
                            <?php echo $boilerplate_body_text; ?>
                        </p>
                    <?php endif; ?>

                    <a href="<?php echo $boilerplate_button_url; ?>">
                        <button type="button" class="btn btn--white">
                            <?php echo $boilerplate_button_text; ?>
                        </button>
                    </a>
                </div>

                <div class="boilerplate__graphics">
                    <div class="boilerplate__graphic boilerplate__graphic--jade"></div>
                    <div class="boilerplate__graphic boilerplate__graphic--aqua"></div>
                </div>
            </div>
        </div>
<?php
    }
}

add_shortcode('get_boilerplate', 'get_boilerplate');
