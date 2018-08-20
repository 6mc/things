
			<div role="main" class="main">

				<?php require(__DIR__.'/../parca/baslik.php'); ?>

				<div class="container">

					<div class="row">

						<div class="col-md-4">
							<ul class="nav nav-list mb-xl">
								<?php require(__DIR__.'/../parca/menu.php') ?>
							</ul>
						</div>

						<div class="col-md-6 col-md-offset-2 hidden-xs">
							<?php if(!empty($ayar['sitemap_baslik'])){ ?><h2 class="mb-lg"><strong><?php echo $ayar['sitemap_baslik'] ?></strong></h2><?php } ?>
							<?php if(!empty($ayar['sitemap_aciklama'])){ ?><p class="lead"><?php echo $ayar['sitemap_aciklama'] ?></p><?php } ?>
						</div>

					</div>

				</div>

			</div>
