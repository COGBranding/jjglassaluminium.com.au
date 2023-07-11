<div class="section media-with-text image-<?php echo $args['image_position']; ?> image-<?php echo $args['mobile_image_position']; ?>">
    <div class="row media-with-text__row">
        <div class="media-with-text__col media-with-text__col--image" style="background-image: url('<?php echo $args['image_url']; ?>')"></div>

        <div class="media-with-text__col media-with-text__col--content">
            <?php if ($args['callout_text']) : ?>
                <p class="callout-text">
                    <?php echo $args['callout_text']; ?>
                </p>
            <?php endif; ?>

            <h2 class="media-with-text__heading">
                <?php echo $args['heading_text']; ?>
            </h2>

            <div class="media-with-text__content">
                <?php echo $args['body_text']; ?>
            </div>

            <?php if ($args['show_button'] === true) : ?>
                <a href="<?php echo $args['button_url']; ?>">
                    <button type="button" class="btn btn--aqua">
                        <?php echo $args['button_text']; ?>
                    </button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>