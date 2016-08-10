<?php
/**
 *  Template Name: Recent Transactions.
 *
 *  This file is designed for use with the "default" twenty sixteen theme, and distributed as a sample
 *  Always test queries before using on production sites.
 *
 *  Also, be sure that you have donor permission to display this information.
 *
 *  For more info, visit https://givewp.com
 *
 *  @link https://givewp.com/
 *  @author ben.meredith@gmail.com
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main give-archive" role="main">

            <?php
            $args = array(
			'post_type'      => 'give_payment',
			'posts_per_page' => 3
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

			<h2>Output latest 3 donations with amount and date</h2>
			<hr/>
			<ul>
				<?php
				while ( $loop->have_posts() ) : $loop->the_post();
					$meta    = get_post_meta( get_the_ID() );
					$form_field_one   = $meta['first_custom_field'][0];
                    $getdate = $meta['_give_completed_date'][0];
					$date    = date( "F j, Y", strtotime( $getdate ) );
					$gateway = $meta['_give_payment_gateway'][0];
					?>

					<li><strong>Donation in memory of <?php echo $form_field_one; ?></strong><br/>
						Was given on <?php echo $date; ?><br/>
						With the <?php echo $gateway; ?> Payment Gateway
					</li>

				<?php endwhile;
				wp_reset_postdata(); // end of Query 1 ?>
			</ul>
		<?php else : ?>
			<!-- If you don't have donations that fit this query -->

			<h2>Sorry you don't have any transactions that fit this query</h2>

		<?php endif;
?>
        </main>

    </div>
<?php get_footer(); ?>