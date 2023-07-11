<?php
// Get the ACF field group
$service_about = get_field('single_service_about');

// Get subfields from the group
$service_about_content = $service_about['single_service_about_content'];
?>

<div class="tabs__item tabs__item--about">
    <div class="tabs__item__content">
        <?php echo $service_about_content; ?>
    </div>

    <?php
    // Get the media text repeater
    $media_with_text = $service_about['media_with_text'];

    if (!empty($media_with_text)) {

        // Loop through the rows
        foreach ($media_with_text as $section) :
            // Load subfields
            $image_position = (isset($section['media_with_text_image_position']) ? $section['media_with_text_image_position'] : '');
            $image = (isset($section['media_with_text_image']['url']) ? $section['media_with_text_image']['url'] : '');
            $heading_text = (isset($section['media_with_text_heading_text']) ? $section['media_with_text_heading_text'] : '');
            $body_text = (isset($section['media_with_text_body_text']) ? $section['media_with_text_body_text'] : '');
            $button_text = (isset($section['media_with_text_button_text']) ? $section['media_with_text_button_text'] : '');
            $button_url = (isset($section['media_with_text_button_url']) ? $section['media_with_text_button_url'] : '');

            // Loop output
            get_template_part(
                'template-parts/section',
                'media-with-text',
                [
                    'image_position' => $image_position,
                    'mobile_image_position' => 'top',
                    'image_url' => $image,
                    'callout_text' => '',
                    'heading_text' => $heading_text,
                    'body_text' => $body_text,
                    'show_button' => true,
                    'button_url' => $button_url,
                    'button_text' => $button_text,
                ]
            );
        endforeach;
    }
    ?>
</div>