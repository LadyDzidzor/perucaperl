<?php
/**
 * Search Form Template
 *
 */
?>
<div class="search-widget">
    <form class="search-form" action="<?php echo esc_url( home_url('/') ); ?>" method="get">
		<input type="search" name="s"  placeholder="<?php esc_attr_e( 'Search', 'statum' ); ?>..." value="<?php echo esc_attr( get_search_query() ); ?>"/>
	</form>
</div>