<?php get_header(); ?>
	<div id="content-wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="content-main">
			<?php $mvp_featured_img = get_option('mvp_featured_img'); if ($mvp_featured_img == "true") { ?>
				<?php if(get_post_meta($post->ID, "mvp_video_embed", true)): ?>
					<?php echo get_post_meta($post->ID, "mvp_video_embed", true); ?>
				<?php else: ?>
					<?php $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_show_hide == "hide") { ?>
					<?php } else { ?>
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
						<div id="featured-image" itemscope itemtype="http://schema.org/Article">
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumb' ); ?>
							<img itemprop="image" src="<?php echo $thumb['0']; ?>" />
							<?php if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
							<span class="photo-credit"><?php echo get_post_meta($post->ID, "mvp_photo_credit", true); ?></span>
							<?php endif; ?>
						</div><!--featured-image-->
						<?php } ?>
					<?php } ?>
				<?php endif; ?>
			<?php } ?>
			<div id="home-main">
				<div id="post-area" itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>
					<h3 class="story-cat"><?php the_category() ?></h3>
					<h1 class="story-title" itemprop="name"><?php the_title(); ?></h1>
					<div id="post-info">
						<?php _e( 'Por', 'mvp-text' ); ?>&nbsp;<span class="author" itemprop="author"><?php the_author_posts_link(); ?></span>&nbsp;|&nbsp;<time class="post-date" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>
						<span class="comments-number"><a href="<?php comments_link(); ?>"><?php comments_number(__( '0 Comments', 'mvp-text'), __('1 Comment', 'mvp-text'), __('% Comments', 'mvp-text')); ?></a></span>
					</div><!--post-info-->
					<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
					<div class="social-box">
						<ul class="post-social">
							<li class="fb-line">
								<div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
							</li>
							<li>
								<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>
							</li>
							<li>
								<g:plusone size="medium" annotation="bubble" width="90"></g:plusone>
							</li>
							<li>
								<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
							</li>
						</ul>
					</div><!--social-box-->
					<?php } ?>
					<div id="content-area">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
                        <?php comments_template(); ?>
					</div><!--content-area-->
				</div><!--post-area-->
					<?php $author = get_option('mvp_author_box'); if ($author == "false") { ?>
					<div id="author-wrapper">
						<div id="author-info">
							<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
							<div id="author-text">
								<span class="author-name"><?php the_author_posts_link(); ?></span>
								<p><?php echo apply_filters('the_content', get_the_author_description()); ?></p>
								<ul>
									<?php $authordesc = get_the_author_meta( 'facebook' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="fb-item">
										<a href="http://www.facebook.com/<?php the_author_meta('facebook'); ?>" alt="Facebook" class="fb-but" target="_blank"></a>
									</li>
									<?php } ?>
									<?php $authordesc = get_the_author_meta( 'twitter' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="twitter-item">
										<a href="http://www.twitter.com/<?php the_author_meta('twitter'); ?>" alt="Twitter" class="twitter-but" target="_blank"></a>
									</li>
									<?php } ?>
									<?php $authordesc = get_the_author_meta( 'pinterest' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="pinterest-item">
										<a href="http://www.pinterest.com/<?php the_author_meta('pinterest'); ?>" alt="Pinterest" class="pinterest-but" target="_blank"></a>
									</li>
									<?php } ?>
									<?php $authordesc = get_the_author_meta( 'googleplus' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="google-item">
										<a href="<?php the_author_meta('googleplus'); ?>" alt="Google Plus" class="google-but" target="_blank"></a>
									</li>
									<?php } ?>
									<?php $authordesc = get_the_author_meta( 'instagram' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="instagram-item">
										<a href="http://www.instagram.com/<?php the_author_meta('instagram'); ?>" alt="Instagram" class="instagram-but" target="_blank"></a>
									</li>
									<?php } ?>
									<?php $authordesc = get_the_author_meta( 'linkedin' ); if ( ! empty ( $authordesc ) ) { ?>
									<li class="linkedin-item">
										<a href="http://www.linkedin.com/company/<?php the_author_meta('linkedin'); ?>" alt="Linkedin" class="linkedin-but" target="_blank"></a>
									</li>
									<?php } ?>
								</ul>
							</div><!--author-text-->
						</div><!--author-info-->
					</div><!--author-wrapper-->
					<?php } ?>
                <!--taboola-->
                <div id="taboola-below-article-thumbnails"></div>
                <div class="OUTBRAIN" data-src="<?php $ID = get_the_ID(); echo get_permalink( $ID ); ?>" data-widget-id="AR_1" data-ob-template="yoamoloszapatos"></div>
                <script>
                        function loadScript(url, callback){

                            var script = document.createElement("script")
                            script.type = "text/javascript";

                            if (script.readyState){  //IE
                                script.onreadystatechange = function(){
                                    if (script.readyState == "loaded" ||
                                            script.readyState == "complete"){
                                        script.onreadystatechange = null;
                                        callback();
                                    }
                                };
                            } else {  //Others
                                script.onload = function(){
                                    callback();
                                };
                            }

                            script.src = url;
                            document.getElementsByTagName("head")[0].appendChild(script);
                        }
                </script>
                <script type="text/javascript">
                    try{
                        tags =dfp_ad_object[0].page_targeting.Tag;
                        if(tags.indexOf('outbrain')!=-1 || false){


                                loadScript("https://widgets.outbrain.com/outbrain.js", function(){
                                    //initialization code
                                    console.log('loaded outbrain');
                                });



                            console.log('here');
                        }
                        console.log('ads targeting outbrain:' + tags);
                    }catch(err){
                        console.log(err);
                        console.log('no ads targeting');
                    }



                </script>
                <script type="text/javascript">

                    function scriptLoader(scripts, callback) {

                        var count = scripts.length;

                        function urlCallback(url) {
                            return function () {
                                console.log(url + ' was loaded (' + --count + ' more scripts remaining).');
                                if (count < 1) {
                                    callback();
                                }
                            };
                        }

                        function loadScript(url) {
                            var s = document.createElement('script');
                            s.setAttribute('src', url);
                            s.async = true;
                            s.onload = urlCallback(url);
                            document.head.appendChild(s);
                        }

                        for (var script of scripts) {
                            loadScript(script);
                        }
                    };

                     scriptLoader(['//a.teads.tv/page/71936/tag'], function() {
                                            // use code from a.js or b.js
                                    });

                    try{
                        tags =dfp_ad_object[0].page_targeting.Tag;
                        if(tags.indexOf('no_taboola')<0){
                        // if(tags.indexOf('taboola')>0){
                              // we generate a random number to decide between taboola and outbrain
                              random = Math.ceil(Math.random() * 10) ;
                              if (random > 10){
                                // outbraing
                                loadScript("https://widgets.outbrain.com/outbrain.js", function(){
                                    //initialization code
                                    console.log('loaded outbrain');
                                });
                              }
                              else if( random>25){

                              }
                              else{
                                // taboola
                                   window._taboola = window._taboola || [];
                                  _taboola.push({
                                    mode: 'thumbnails-a',
                                    container: 'taboola-below-article-thumbnails',
                                    placement: 'Below Article Thumbnails',
                                    target_type: 'mix'
                                  });
                                  console.log('loaded taboola');
                              }

                        }
                        console.log('ads targeting:' + tags);
                    }catch(err){
                        console.log(err);
                        console.log('no ads targeting');
                    }

                </script>
				<?php $prev_next = get_option('mvp_prev_next'); if ($prev_next == "true") { ?>
				<div class="prev-next-wrapper">
					<div class="prev-post">
						<?php previous_post_link('&larr; '.__('Anterior Post', 'mvp-text').' %link', '%title', TRUE); ?>
					</div><!--prev-post-->
					<div class="next-post">
						<?php next_post_link(''.__('Siguiente Post', 'mvp-text').' &rarr; %link', '%title', TRUE); ?>
					</div><!--next-post-->
				</div><!--prev-next-wrapper-->
				<?php } ?>
				<?php getRelatedPosts(); ?>

			</div><!--home-main-->
		</div><!--content-main-->
		<?php get_sidebar(); ?>
		<?php endwhile; endif; ?>
	</div><!--content-wrapper-->
</div><!--main-wrapper-->
<?php get_footer(); ?>
