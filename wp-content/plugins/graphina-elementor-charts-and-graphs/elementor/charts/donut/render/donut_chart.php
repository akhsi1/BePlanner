<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;

$settings = $this->get_settings();
$title = (string)graphina_get_dynamic_tag_data($settings,'iq_donut_chart_heading');
$description = (string)graphina_get_dynamic_tag_data($settings,'iq_donut_chart_content');
?>

<div class="<?php echo $settings['iq_donut_chart_card_show'] === 'yes' ? 'chart-card' : ''; ?>">
    <div class="">
        <?php if ($settings['iq_donut_is_card_heading_show'] && $settings['iq_donut_chart_card_show']) { ?>
            <h4 class="heading graphina-chart-heading" style="text-align: <?php echo $settings['iq_donut_card_title_align'];?>; color: <?php echo strval($settings['iq_donut_card_title_font_color']);?>;"><?php echo esc_html__(strval($title), 'graphina-lang'); ?></h4>
        <?php }
        if ($settings['iq_donut_is_card_desc_show'] && $settings['iq_donut_chart_card_show']) { ?>
            <p class="sub-heading graphina-chart-sub-heading" style="text-align: <?php echo $settings['iq_donut_card_subtitle_align'];?>; color: <?php echo strval($settings['iq_donut_card_subtitle_font_color']);?>;"><?php echo esc_html__(strval($description), 'graphina-lang'); ?></p>
        <?php } ?>
    </div>
    <div class="<?php echo $settings['iq_donut_chart_border_show'] === 'yes' ? 'chart-box' : ''; ?>">
        <div id="donut-chart" class="chart-texture donut-chart-<?php esc_attr_e($this->get_id()); ?>"></div>
    </div>
</div>