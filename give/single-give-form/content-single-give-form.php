<?php
/**
 * The template for displaying product content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * give_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
    echo get_the_password_form();

    return;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php give_get_template_part( 'single-give-form/featured-image' ); ?>

    <?php twentysixteen_excerpt(); ?>

    <div id="give-form-content-<?php the_ID(); ?>">

        <?php
        give_get_donation_form( $args = array() );
        ?>

    </div><!-- #give-form-<?php the_ID(); ?> -->


    <footer class="entry-footer">
        <?php give_get_template_part( 'single-give-form/sidebar' ); ?>
    </footer>


</article>

<?php do_action( 'give_after_single_form' ); ?>
