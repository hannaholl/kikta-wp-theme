<?php get_header();
get_template_part('breadcrums'); ?>
<div class="container">
	<div class="row enigma_blog_wrapper">
	<div class="col-md-8">
		<?php get_template_part('post','page'); ?>
		<?php
			$pagenumber = 1;
			$perPage = 5;
			if ($_GET['pagenumber']) $pagenumber = $_GET['pagenumber'];

			$offset = ($pagenumber - 1) * $perPage;
			$args = array( 'posts_per_page' => $perPage , 'offset' => $offset, 'post_status' => 'publish' );
			$lastposts = get_posts( $args );
			foreach ( $lastposts as $post ) :
			  setup_postdata( $post );
				get_template_part('post','content'); ?>
			<?php endforeach;
			wp_reset_postdata(); ?>

			<?php
				$count_posts = wp_count_posts();
				$countPublished = $count_posts->publish;

				if ($countPublished > $offset + $perPage) { ?>
					<a style="float:left;" href="http://<?=$_SERVER['HTTP_HOST']?>/news/?pagenumber=<?=$pagenumber + 1?>">Older posts<a/>
				<?php }

				if ($offset > 0) { ?>
					<a style="float:right;" href="http:///<?=$_SERVER['HTTP_HOST']?>/news/?pagenumber=<?=$pagenumber - 1?>">Newer posts<a/>
			<?php	}
			?>
	</div>

	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
