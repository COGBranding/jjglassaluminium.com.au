<?php
if (et_theme_builder_overrides_layout(ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE) || et_theme_builder_overrides_layout(ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE)) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}


/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action('et_after_main_content');

if ('on' === et_get_option('divi_back_to_top', 'false')) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

$logo = '/wp-content/uploads/2023/07/JJ-Corporate-Identity-Remastered-No-Tagline.png';
$facebook_link = et_get_option('divi_facebook_url', '#');
$instagram_link = et_get_option('divi_instagram_url', '#');
$mail_icon = '/wp-content/uploads/2023/05/icon-mail.svg';
$phone_icon = '/wp-content/uploads/2023/05/icon-phone.svg';
?>

<div id="newsPost" class="modal newsPost">
    <div class="modal-content">
        <div class="single-post__close-icon"></div>
        <div class="newsPost-content"></div>
    </div>
</div>
<p class="old-title" style="display:none"></p>
<p class="old-url" style="display:none"></p>

<footer class="section footer">
    <div class="row footer__row">
        <div class="footer__col footer__col--company">
            <div class="footer__logo-wrapper">
                <img src="<?php echo $logo; ?>" alt="logo" class="footer__logo">

                <p class="footer__tagline">
                    Sydney-wide glass and aluminium experts.
                </p>
            </div>

            <a href="mailto:accounts@jjglassaluminium.com.au" class="footer__contact">
                <div class="footer__contact__icon-wrapper">
                    <img src="<?php echo $mail_icon; ?>" alt="" class="footer__contact__icon">
                </div>

                <div class="footer__contact__content-wrapper">
                    <p>Drop us a line</p>
                    <p>Email us</p>
                </div>
            </a>

            <a href="tel:61414448315" class="footer__contact">
                <div class="footer__contact__icon-wrapper">
                    <img src="<?php echo $phone_icon; ?>" alt="" class="footer__contact__icon">
                </div>

                <div class="footer__contact__content-wrapper">
                    <p>Give us a call</p>
                    <p>0414 448 315</p>
                </div>
            </a>
        </div>

        <div class="footer__col footer__col--items">
            <div class="footer__items">
                <h4 class="footer__heading">
                    Company
                </h4>

                <?php wp_nav_menu(array(
                    'menu' => 'footer_menu_1',
                    'menu_class' => 'footer__links',
                )); ?>
            </div>

            <div class="footer__items">
                <h4 class="footer__heading">
                    Solutions
                </h4>

                <?php wp_nav_menu(array(
                    'menu' => 'footer_menu_2',
                    'menu_class' => 'footer__links',
                )); ?>
            </div>

            <div class="footer__items">
                <h4 class="footer__heading">
                    Legal
                </h4>

                <?php wp_nav_menu(array(
                    'menu' => 'footer_menu_3',
                    'menu_class' => 'footer__links',
                )); ?>
            </div>
        </div>

        <div class="footer__socket">
            <p class="footer__socket__content">
                © <span id="year">2023</span> J & J Glass and Aluminium <span class="footer__separator">|</span>Website by <a href="https://cogbranding.com.au">COG Branding</a>
            </p>

            <div class="footer__social">
                <?php
                $facebook_link = "https://www.facebook.com/JJGlassandAluminium/";
                $instagram_link = "https://www.instagram.com/jjglassaluminium/?hl=en";
                ?>
                <a href="<?php echo $facebook_link; ?>" class="footer__social__icon footer__social__icon--facebook"></a>
                <a href="<?php echo $instagram_link; ?>" class="footer__social__icon footer__social__icon--instagram"></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>