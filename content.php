<div class="futurio-post col-sm-6" >
    <div class="news-item row">
        <?php futurio_thumb_img( 'futurio-med', 'col-md-6' ); ?>
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="news-text-wrap col-md-6">
        <?php } else { ?>
            <div class="news-text-wrap col-md-12">
        <?php } ?>
            <div class="content-date-comments">
                <?php //futurio_widget_date_comments(); ?>
            </div>
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            <?php if ( get_theme_mod( 'blog_archive_author', 'on' ) == 'on' ) { ?>
                <?php futurio_author_meta(); ?>
            <?php } ?>
        </div>
    </div>
</div>