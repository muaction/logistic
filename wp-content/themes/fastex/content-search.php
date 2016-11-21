<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thim
 */
?>

<article itemtype="http://schema.org/BlogPosting"id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php thim_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header>
    <!-- .entry-header -->

    <div class="entry-summary" itemprop="text">
        <?php the_excerpt(); ?>
    </div>
    <!-- .entry-summary -->

    <footer class="entry-footer">
        <?php thim_entry_footer(); ?>
    </footer>
    <!-- .entry-footer -->
</article><!-- #post-## -->