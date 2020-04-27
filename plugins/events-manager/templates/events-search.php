<?php
/**
 * Events Search
 *
 * Template for searching events for theme
 *
 * @package WordPress
 * @subpackage community-portal
 * @version 1.0.0
 * @author  Playground Inc.
 */

?>

<?php

	$args = ! empty( $args ) ? $args : array();
?>

<div class="em-search-wrapper row">
	<div class="em-events-search em-search col-lg-7 col-sm-12">
		<?php
			$view               = get_query_var( 'view', $default = '' );
			$args['search_url'] = '/events/?view=' . $view;
			$args['search']     = preg_replace( '/^\"|\"$|^\'|\'$/', '', $args['search'] );
		?>
		<form method="GET" action="
		<?php
		if ( ! empty( $args['search_url'] ) ) {
			echo esc_url_raw( $args['search_url'] );
		} else {
			echo esc_attr( EM_URI );
		}
		?>
			" class="events__form">
			<input type="hidden" name="action" value="<?php echo esc_attr( $args['search_action'] ); ?>" />
			<?php do_action( 'em_template_events_search_form_header' ); // hook in here to add extra fields, text etc. ?>
			<div class="events__input-container">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#737373" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M17.5 17.5L13.875 13.875" stroke="#737373" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<input type="text" name="em_search" class="events__search-input" placeholder="<?php esc_html_e( 'Search events', 'community-portal' ); ?>" value="<?php echo esc_attr( $args['search'] ); ?>" />
			</div>
			<input type="submit" class="events__search-cta" value="<?php esc_html_e( 'Search', 'community-portal' ); ?>" />
		</form>
	</div>
	<?php
	if ( ! empty( $args['ajax'] ) ) :
		?>
		<div class='em-search-ajax'></div><?php endif; ?>
</div>

