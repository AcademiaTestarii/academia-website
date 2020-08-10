<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

            <p class="woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                   class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
                       class="button pay"><?php esc_html_e( 'My Account', 'woocommerce' ); ?></a>
				<?php endif; ?>
            </p>

		<?php else : ?>

            <p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>
            <div class="dima-clear"></div>
            <ul class="dima-box woocommerce-thankyou-order-details order_details">
                <li class="order">
					<?php _e( 'Order Number:', 'woocommerce' ); ?>
                    <strong><?php echo $order->get_order_number(); ?></strong>
                </li>
				<?php if ( dima_woocommerce_version_check( '3.0.0' ) ) { ?>
                    <li class="woocommerce-order-overview__date date">
						<?php _e( 'Date:', 'woocommerce' ); ?>
                        <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                    </li>
				<?php } else { ?>
                    <li class="woocommerce-order-overview__date date">
						<?php _e( 'Date:', 'woocommerce' ); ?>
                        <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
                    </li>
				<?php } ?>
                <li class="overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
                    <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                </li>

				<?php
				$payment_method = dima_woocommerce_version_check( '3.0.0' ) ? $order->get_payment_method_title() : $order->payment_method_title;
				if ( $payment_method ) :
					?>

                    <li class="woocommerce-order-overview__payment-method method">
						<?php _e( 'Payment method:', 'woocommerce' ); ?>
                        <strong><?php echo wp_kses_post( $payment_method ); ?></strong>
                    </li>

				<?php endif; ?>
            </ul>
            <div class="clear"></div>

		<?php endif; ?>
		<?php

		$get_payment_method = dima_woocommerce_version_check( '3.0.0' ) ? $order->get_payment_method() : $order->payment_method;
		$get_order_id       = dima_woocommerce_version_check( '3.0.0' ) ? $order->get_id() : $order->id; ?>

		<?php do_action( 'woocommerce_thankyou_' . $get_payment_method, $get_order_id ); ?>
		<?php do_action( 'woocommerce_thankyou', $get_order_id ); ?>

	<?php else : ?>

        <p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>
