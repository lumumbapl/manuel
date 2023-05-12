<?php

namespace Manuel;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Fetch statistics from the database.
$manuel_settings = new Manuel_Settings( '1.0' );
$removed_images = $manuel_settings->get_manuel_cron()->get_images_stats();
?>

<div class="wrap">
    <h1><?php esc_html_e( 'Removed Images List', 'manuel' ); ?></h1>

    <table class="widefat">
        <thead>
            <tr>
                <th><?php esc_html_e( 'Post ID', 'manuel' ); ?></th>
                <th><?php esc_html_e( 'Post Title', 'manuel' ); ?></th>
                <th><?php esc_html_e( 'Original Image', 'manuel' ); ?></th>
                <th><?php esc_html_e( 'Time Removed', 'manuel' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $removed_images as $stat ) : ?>
                <tr>
                    <td><?php echo esc_html( $stat['post_id'] ); ?></td>
                    <td><?php echo esc_html( $stat['post_title'] ); ?></td>
                    <td><a href="<?php echo esc_url( $stat['original_image'] ); ?>"><?php echo esc_url( $stat['original_image'] ); ?></a></td>
                    <td><?php echo esc_html( $stat['time_removed'] ); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>