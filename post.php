<div <?php content_class(); ?>>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); global $elements; ?>
<?php do_action( 'aus_before_post' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article clearfix' ); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?> <?php $elements->edit_button( array( 'class'=>'btn btn-xs btn-default' ) ); ?></h1>
		<div class="entry-meta">
			<time pubdate="pubdate" datetime="<?php the_time('Y-m-d') ?>"><i class="fa fa-calendar"></i> <?php $elements->date() ?></time> | <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
			<?php if( has_category() ) : ?>
				| <i class="fa fa-folder"></i> <?php $elements->categories(); ?>
			<?php endif; ?>
			 | <i class="fa fa-eye"></i> <?php $elements->views(); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer">
		<?php $elements->tags( array( 'class'=>'red-tags' ), false ); ?>
		<?php 
		wp_link_pages( array( 
			'before'=>'<ul class="pagination"><li><span>' . __( 'Pages:', 'aus-basic' )  . '</span></li>', 
			'after'=>'</ul>',
			'link_before'=>'<span>',
			'link_after'=>'</span>',
			'next_or_number'=>'number',
			'separator'=>'',
			'echo' => 1
		) ); 
		?>
	</footer>
	<?php if($post->post_type == 'post') : ?>
		<ul class="pager">
			<li class="previous"><?php previous_post_link('%link', __('&laquo; previous article','aus-basic'), TRUE); ?></li>
			<li class="next"><?php next_post_link('%link', __('next article &raquo;','aus-basic'), TRUE); ?></li>
		</ul>
	<?php endif; ?>
</article>
<?php do_action( 'aus_after_post' ); ?>
<?php comments_template(); ?>
<?php endwhile; //Post while end ?>
<?php endif; ?>
</div>