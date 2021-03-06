<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;

$settings = $this->get_settings();
$title = (string)graphina_get_dynamic_tag_data($settings,'iq_radial_chart_heading');
$description = (string)graphina_get_dynamic_tag_data($settings,'iq_radial_chart_content');
?>

<div class="<?php echo $settings['iq_radial_chart_card_show'] === 'yes' ? 'chart-card' : ''; ?>">
    <div class="">
        <?php if ($settings['iq_radial_is_card_heading_show'] && $settings['iq_radial_chart_card_show']) { ?>
            <h4 class="heading graphina-chart-heading" style="text-align: <?php echo $settings['iq_radial_card_title_align'];?>; color: <?php echo strval($settings['iq_radial_card_title_font_color']);?>;"><?php echo esc_html__(strval($title), 'graphina-lang'); ?></h4>
        <?php }
        if ($settings['iq_radial_is_card_desc_show'] && $settings['iq_radial_chart_card_show']) { ?>
            <p class="sub-heading graphina-chart-sub-heading" style="text-align: <?php echo $settings['iq_radial_card_subtitle_align'];?>; color: <?php echo strval($settings['iq_radial_card_subtitle_font_color']);?>;"><?php echo esc_html__(strval($description), 'graphina-lang'); ?></p>
        <?php } ?>
    </div>
    <div class="<?php echo $settings['iq_radial_chart_border_show'] === 'yes' ? 'chart-box' : ''; ?>">
        <div id="radial-chart" class="chart-texture radial-chart-<?php esc_attr_e($this->get_id()); ?>"></div>
    </div>
</div>