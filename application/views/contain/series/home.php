<!-- catalog -->
<div class="catalog" style="margin-top: 7rem;">
	<div class="container">
		<?php if (@$main == NULL): ?>
			<div class="page-404__wrap">
				<div class="page-404__content">
					<h1 class="page-404__title">404</h1>
					<p class="page-404__text">The movie you are looking for not available!</p>
					<a href="<?=base_url()?>" class="page-404__btn">go back</a>
				</div>
			</div>
		<?php else: ?>
		<div class="row">
			<?php foreach ($main as $k => $v): ?>
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover" style="height: 15rem">
							<img src="<?=$v['poster']?>" alt="" style="height: 100%">
							<a href="<?=base_url($this->controller)?>/detail/<?=$v['id']?>" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title" title="<?=$v['title']?>"><?=$v['title']?></h3>
						</div>
					</div>
				</div>
				<!-- end card -->
			<?php endforeach ?>


			<!-- paginator -->
			<div class="col-12">
				<?php echo $this->pagination->create_links(); ?>
			</div>
			<!-- end paginator -->
		</div>
		<?php endif ?>
	</div>
</div>
<!-- end catalog -->