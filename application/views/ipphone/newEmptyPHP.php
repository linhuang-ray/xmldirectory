<?php 
/*
Template Name: Parent Services Page
 */
?>
<?php get_header(); ?>

    <div class="block-full bg-color-main content-without-sidebar image-banner" style="background-image: url(<?php echo the_post_thumbnail('full'); ?>)">
	 <?php $imagehead = get_post_meta($post->ID, 'imagehead', true); ?>
	<?php if(!empty($imagehead)): ?>
           <?php echo $imagehead; ?>
        <?php endif; ?>
	<?php $quote = get_post_meta($post->ID, 'quote', true); ?>
        <?php if(!empty($quote)): ?>
            <div class="quote"><div class="pad"><?php print $quote; ?></div></div>
        <?php endif; ?>
    </div>

		<div class="block-full bg-color-main content-without-sidebar">
			<div class="block-inner">
						<?php echo get_option(OM_THEME_PREFIX . 'code_after_portfolio_h1'); ?>
						
						<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						    <?php the_content(); ?>							
						<?php endwhile; endif; ?>
						
						<?php echo get_option(OM_THEME_PREFIX . 'code_after_portfolio_content'); ?>
						
						<?php if( get_previous_post() || get_next_post() ) : ?>
						<div class="navigation-prev-next">
							<div class="navigation-prev"><?php previous_post_link('%link') ?></div>
							<div class="navigation-next"><?php next_post_link('%link') ?></div>
							<div class="clear"></div>
						</div>
						<?php endif; ?>

						<!-- /Content -->

							
			</div>
		</div>

		<?php
			$fb_comments=false;
			if(function_exists('om_facebook_comments') && get_option(OM_THEME_PREFIX . 'fb_comments_portfolio') == 'true') {
					if(get_option(OM_THEME_PREFIX . 'fb_comments_position') == 'after')
						$fb_comments='after';
					else
						$fb_comments='before';
			}
		?>
		
		<?php if($fb_comments == 'before') { om_facebook_comments();	} ?>
				
		<?php if(get_option(OM_THEME_PREFIX . 'hide_comments_portfolio') != 'true') : ?>
			<?php comments_template('',true); ?>
		<?php endif; ?>
		
		<?php if($fb_comments == 'after') { om_facebook_comments();	} ?>
		
		<!-- /Content -->
		
		<div class="clear anti-mar">&nbsp;</div>

	<?php $random_items=get_option(OM_THEME_PREFIX . 'portfolio_single_show_random'); ?>
	<?php if($random_items) { ?>
		<!-- Related portfolio items -->
		<div class="block-full bg-color-main">
			<div class="block-inner">
						
						<div class="widget-header"><?php _e('Random Items','om_theme') ?></div>
			</div>
		</div>
		
		<div class="clear anti-mar">&nbsp;</div>
	<?php } ?>
			
	<?php if($random_items == 'true') { ?>
	
		<div class="portfolio-wrapper">
			<?php 
			$query = new WP_Query( array (
				'post_type' => 'portfolio',
				'orderby' => 'rand',
				'posts_per_page' => 3
			));
			
			while ( $query->have_posts() ) : $query->the_post(); ?>
			
				<?php
				$terms =  get_the_terms( $post->ID, 'portfolio-type' ); 
				$term_list = array();
				if( is_array($terms) ) {
					foreach( $terms as $term ) {
						$term_list[]=urldecode($term->slug);
					}
				}
				$term_list=implode(' ',$term_list);
				?>
			
				<div <?php post_class('portfolio-thumb bg-color-main isotope-item block-3 show-hover-link '.$term_list); ?> id="post-<?php the_ID(); ?>">
					<div class="pic block-h-2">
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
						<?php the_post_thumbnail('portfolio-thumb'); ?>
						<?php } else { echo '&nbsp'; } ?>
					</div>
					<div class="desc block-h-1">
						<div class="title"><?php the_title(); ?></div>
						<div class="tags"><?php the_terms($post->ID, 'portfolio-type', '', ', ', ''); ?></div>
					</div>
					<a href="<?php the_permalink(); ?>" class="link"><span class="after"></span></a>
				</div>
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
			<div class="clear"></div>
		</div>
		<!-- /Related portfolio items -->
		
		<div class="clear anti-mar">&nbsp;</div>
				
	<?php } elseif($random_items == '9x') { ?>
	
		<div class="portfolio-wrapper">
			<?php 
			$query = new WP_Query( array (
				'post_type' => 'portfolio',
				'orderby' => 'rand',
				'posts_per_page' => 9
			));
			
			while ( $query->have_posts() ) : $query->the_post(); ?>
			
				<a href="<?php the_permalink(); ?>" class="portfolio-small-thumb bg-color-main block-1 block-h-1 show-hover-link">
				<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				<?php the_post_thumbnail('portfolio-q-thumb'); ?>
				<?php } else { echo '&nbsp'; } ?><span class="after"></span></a>
					
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
			<div class="clear"></div>
		</div>
		<!-- /Related portfolio items -->
		
		<div class="clear anti-mar">&nbsp;</div>
				
	<?php } ?>
<?php get_footer(); ?>