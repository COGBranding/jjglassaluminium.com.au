<?php
// Get the ACF field group
$services = get_field('single_service_about');
// Get the subfields from the group
$service_faqs = $services['single_service_faqs'];
if (!empty($service_faqs)) {
?>
    <div class="tabs__item tabs__item--faqs et_pb_accordion et_pb_accordion_0 service-accordion">
        <h2 class="tabs__item__heading">FAQs</h2>

        <div class="tabs__items">
            <?php

            foreach ($service_faqs as $service_faq) {
            ?>
                <div class="tabs__item__content et_pb_toggle et_pb_accordion_item et_pb_accordion_item_0 et_pb_toggle_close">
                    <h6 class="et_pb_toggle_title"><?php echo $service_faq['faq_question']; ?></h6>

                    <div class="et_pb_toggle_content clearfix" style="display: none;">
                        <?php echo $service_faq['faq_answer'] ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php } ?>