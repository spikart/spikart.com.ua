<?php
/*
# SP Portfolio - Simple Portfolio module by JoomShaper.com
# -------------------------------------------------------------
# Author    JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2013 JoomShaper.com. All Rights Reserved.
# @license - GNU/GPL V2 or Later
# Websites: http://www.joomshaper.com
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$count = count($items);
?>
<style type="text/css">
	.sp-portfolio-item,.sp-portfolio{
		display:block !important;
	}
	.tm_portfolio{
		display:none;
	}
	#sp-latest-project-wrapper .tm-portfolio-item a {
		font-size: 40px;
		font-weight: 400;
	}
	#sp-latest-project-wrapper .tm-portfolio-item h4{
		padding-bottom: 15px;
	}
	#sp-latest-project-wrapper .tm-portfolio-item h3{
		padding-bottom: 0px !important;
		font-size: 22px;
	}
	.icon-remove-circle{
		position: absolute;
		right: 10px;
		font-size: 37px;
		margin-top: 40px;
		font-weight: 300;
		background: #fff;
		padding: 5px 7px;
		border-radius: 50%;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0%;
		width: 33px;
		height: 38px;
		cursor: pointer;
	}
	.icon_show{
		display:block !important;
	}
	.icon_hide{
		display:none;
	}
</style>
<?php if( $ajaxRequest ){ ?>
	<?php if( $count>0 ){ ?>

		<?php foreach($items as $index=>$item){ ?>
			<li class="sp-portfolio-item col-<?php echo $column . ' ' . modSPPortfolioJHelper::slug($item->tag); ?>">
				<div class="sp-portfolio-item-inner">

					<div class="sp-portfolio-thumb">
						<img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" />
						<div class="sp-portfolio-overlay">
							<span>
								<h4 class="item-title"><?php echo $item->title; ?></h4>
								<a class="sp-portfolio-preview" rel="lightbox" title="<?php echo $item->title; ?>" href="<?php echo $item->image_full; ?>"><?php echo JText::_('PREVIEW'); ?></a>
								<?php if($show_readmore){ ?>
									<a class="sp-portfolio-link" href="<?php echo $item->link; ?>"><?php echo JText::_('MORE_DETAILS'); ?></a>
								<?php } ?>
							</span>
						</div>
					</div>

					<div class="sp-portfolio-item-details">
						<?php if($show_title){ ?>
							<?php if($linked_title){ ?>
								<h4 class="item-title"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
							<?php }else { ?>
								<h4 class="item-title"><?php echo $item->title; ?></h4>
							<?php } ?>
						<?php } ?>

						<?php if(($item->urls->urla!='') && ($show_url)){ ?>
							<a href="<?php echo $item->urls->urla; ?>"><?php echo $item->urls->urlatext; ?></a>
						<?php } ?>

						<?php if($show_category){ ?>
							<small class="category-name"><?php echo $item->tag; ?></small>
						<?php } ?>		

						<?php if($show_introtext){ ?>
							<div class="sp-portfolio-introtext">
								<?php echo $item->introtext; ?>
							</div>
						<?php } ?>
					</div><!--/.sp-portfolio-item-details-->
					<div style="clear:both"></div>	
				</div><!--/.sp-portfolio-item-inner-->
			</li>
		<?php } //end foreach ?>
	<?php } ?>
	<?php jexit(); ?>
<?php } ?>
<!--/Ajax Load-->

<div id="sp-portfolio-module-<?php echo $uniqid; ?>" class="sp-portfolio default">
	<p class="title_desc"><?php echo $params->get('title_desc') ?></p>
	<?php if($count>0){ ?>
		<?php if($show_filter){ ?>
			<h4 style="float: left;font-weight: 300;font-size: 25px;">PORTFOLIO</h4>
			<ul class="sp-portfolio-filter">
				<li><a class="btn active" href="#" data-filter="*"><?php echo JText::_('Show All'); ?></a></li>
				<?php foreach (modSPPortfolioJHelper::getCategories($catid) as $key => $value) { ?>
					<li>
						<a class="btn" href="#" data-filter=".<?php echo modSPPortfolioJHelper::slug($value) ?>">
							<?php echo ucfirst(trim($value)) ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		<?php } ?>
	<?php } ?>

	<?php if($count>0) { ?>
		<div class="scroll-top" style="height: 1px;display: block;width: 100%;"></div>
		<ul class="sp-portfolio-items">
			<?php foreach($items as $index=>$item){ ?>
			
				<li class="sp-portfolio-item col-<?php echo $column . ' ' . modSPPortfolioJHelper::slug($item->tag); ?> visible">
					<div class="sp-portfolio-item-inner">

						<div class="sp-portfolio-thumb">
							<img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" />
							<div class="sp-portfolio-overlay">
								<span>
									<?php if($show_readmore){ ?>
										<a class="sp-portfolio-link" href="<?php echo $item->link; ?>"><?php echo JText::_('MORE_DETAILS'); ?></a>
									<?php } ?>
								</span>
							</div>
						</div>
						<h4 class="item-title"><?php echo $item->title; ?></h4>
						<div style="clear:both"></div>	
					</div><!--/.sp-portfolio-item-inner-->
				</li>
			<?php } ?>
		</ul><!--/.sp-portfolio-items-->
		
		<?php if(($ajax_loader && $show_filter) && ($count!=$total)) { ?>
			<div class="sp-portfolio-loadmore">
				<a href="#" class="btn btn-primary btn-large">
					<i class="icon-spinner icon-spin"></i>
					<span>Load More</span>
				</a>
			</div>
		<?php } ?>

	<?php } else { ?>
		<p class="alert">No item found!</p>
	<?php } ?>
</div><!--/.sp-portfolio-->
<?php foreach($items as $index=>$item){ ?>
			<div id="tm_portfolio-<?php echo $item->id; ?>" class="tm_portfolio" style="float:left;padding: 40px 30px;">
				<div class="tm-portfolio-item" style="width: 1250px;background: #fff;padding: 20px;">
				<img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" style="float: left;margin-right: 20px;height: 315px;"/>
					<?php if($show_title){ ?>
						<?php if($linked_title){ ?>
							<h4 class="item-title"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
						<?php }else { ?>
							<h4 class="item-title"><?php echo $item->title; ?></h4>
						<?php } ?>
					<?php } ?>

					<?php if(($item->urls->urla!='') && ($show_url)){ ?>
						<a href="<?php echo $item->urls->urla; ?>"><?php echo $item->urls->urlatext; ?></a>
					<?php } ?>

					<?php if($show_category){ ?>
						<small class="category-name"><?php echo $item->tag; ?></small>
					<?php } ?>		

					<?php if($show_introtext){ ?>
						<div class="sp-portfolio-introtext">
							<?php echo $item->introtext; ?>
						</div>
					<?php } ?>
				</div><!--/.sp-portfolio-item-details-->
				
			</div>
			<?php } ?>
			<a id="close_div" class="icon_hide">
				<i class="icon-remove-circle"></i>
			</a>
			<div class="scroll-bottom" style="float: left;"></div> 
<?php if ($show_filter){ ?>

	<script type="text/javascript">
		jQuery.noConflict();
			
			window.addEvent('load', function(){
				jQuery(function($){
				var $gallery = $('.sp-portfolio-items');

				<?php if($rtl) { ?>
					// RTL Support
					$.Isotope.prototype._positionAbs = function( x, y ) {
						return { right: x, top: y };
					};
				<?php } ?>

			$gallery.isotope({
				// options
				itemSelector : 'li',
				layoutMode : 'fitRows'
				<?php if($rtl) { ?>
					,transformsEnabled: false
					<?php } ?>	
				});

				$filter = $('.sp-portfolio-filter');
				$selectors = $filter.find('>li>a');

				$filter.find('>li>a').click(function(){
					var selector = $(this).attr('data-filter');

					$selectors.removeClass('active');
					$(this).addClass('active');

					$gallery.isotope({ filter: selector });
					return false;
				});

				var $currentURL = '<?php echo  JURI::getInstance()->toString(); ?>';
				var $start = <?php echo $limit ?>;  // ajax start from last limit
				var $limit = <?php echo $ajaxlimit ?>;
				var $totalitem = <?php echo $total ?>;

				$('.sp-portfolio-loadmore > a').on('click', function(e){
					var $this = $(this);
					$this.removeClass('done').addClass('loading');
					$.get($currentURL, { moduleID: <?php echo $uniqid?>, start:$start, limit: $limit }, function(data){
						
						$start += $limit;
						var $newItems = $(data);
						$gallery.isotope( 'insert', $newItems );

						if( $totalitem <= $start ){

							$this.removeClass('loading').addClass('hide');

							// AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
							if (!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
								jQuery(function($) {
									$("a[rel^='lightbox']").slimbox({/* Put custom options here */}, null, function(el) {
										return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
									});
								});
							}
							////
							return false;

						} else {
							$this.removeClass('loading').addClass('done');
						
							// AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
							if (!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
								jQuery(function($) {
									$("a[rel^='lightbox']").slimbox({/* Put custom options here */}, null, function(el) {
										return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
									});
								});
							}
						}
					});

					return false;
				});
			});
		});

	</script>
<?php }