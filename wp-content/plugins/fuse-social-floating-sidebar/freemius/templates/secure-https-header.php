<?php
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
	 * @since       1.2.1.8
	 *
	 * @var array $VARS
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>
<style type="text/css">
.flash_sale_sm {
    background: #6d21d2;
    color: #fff;
    padding: 10px;
    text-align: center;
}

div#fs_pricing {
    margin-top: 90px;
}
.flash_sale_sm {
    margin-top: 10px;
    font-weight: bold;
    font-size: 14px;
}

strong.sale_off {
    border: 1px dashed #fff;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 20px;
    padding-right: 20px;
    margin-left: 5px;
}

.fs-secure-notice {
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
}

.fs-secure-notice i.dashicons.dashicons-lock {
    margin-left: 16px;
}
</style>
<div class="fs-secure-notice">
	<i class="dashicons dashicons-lock"></i>
	<span><?php
			if ( ! empty( $VARS['message'] ) ) {
				echo esc_html( $VARS['message'] );
			} else {
				/**
				 * @var Freemius $fs
				 */
				$fs = freemius( $VARS['id'] );

				echo  esc_html( sprintf(
						/* translators: %s: Page name */
					     $fs->get_text_inline( 'Secure HTTPS %s page, running from an external domain', 'secure-x-page-header' ),
					     $VARS['page']
				     ) ) .
				     ' - ' .
				     sprintf(
					     '<a class="fs-security-proof" href="%s" target="_blank" rel="noopener">%s</a>',
					     'https://www.mcafeesecure.com/verify?host=' . WP_FS__ROOT_DOMAIN_PRODUCTION,
					     'Freemius Inc. [US]'
				     );
			}
		?></span>
	<div class="coupon-code-50off">
		<div class="coupon-code-inr">
			<div class="flash_sale_sm"><span class="flashit">Sale</span> Get 20% OFF Right Now! Offer only valid for <u>24 Hours</u>. Use coupon code <strong class="sale_off">SALE20OFF</strong></div>
		</div>
	</div>
</div>