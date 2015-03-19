<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">Sermons by Service Type: <?php echo single_cat_title( '', false ); ?></h1>
                <?php render_wpfc_sorting(); ?>
			</header><!-- .archive-header -->

            <div id="wpfc_sermon_tax_description">
            <?php
                /* Image */
                print apply_filters( 'sermon-images-queried-term-image', '', array( 'attr' => array( 'class' => 'alignleft' ), 'after' => '</div>', 'before' => '<div id="wpfc_sermon_image">', 'image_size' => 'thumbnail', ) );
                /* Description */
                $category_description = category_description();
                if ( ! empty( $category_description ) )
                    echo '<div class="archive-meta">' . $category_description . '</div>';
            ?>
            </div>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
