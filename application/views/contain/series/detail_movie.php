<!-- details -->
<section class="section details">
	<!-- details background -->
	<div class="details__bg" data-bg="<?=@$main[0]['poster']?>"></div>
	<!-- end details background -->

	<!-- details content -->
	<div class="container">
		
		<div class="row">
			<!-- title -->
			<div class="col-12">
				<h1 class="details__title"><?=@$main[0]['title']?></h1>
			</div>
			<!-- end title -->

			<div class="col-10">
				<div class="card card--details card--series">
					<div class="row">
						<!-- card cover -->
						<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
							<div class="card__cover" style="text-align: center;">
								<img src="<?=@$main[0]['poster']?>" alt="">
							</div>
						</div>
						<!-- end card cover -->

						<!-- card content -->
						<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
							<div class="card__content">
								<div class="card__wrap">

									<ul class="card__list">
										<li>HD</li>
									</ul>
								</div>

								<ul class="card__meta">
									<li><span>Genre:</span> <a href="#"><?=@$main[0]['genre']?></a>
									</li>
									<li><span>Total Eps:</span> <?=@$main[0]['total_episode']?></li>
									<li><span>Subtitle:</span> <?=@$main[0]['sub']?></li>
								</ul>

								<div class="b-description_readmore_wrapper js-description_readmore_wrapper" style="max-width: 682.5px;"><div class="card__description card__description--details b-description_readmore_ellipsis" style="min-height: 150px; max-height: 150px; overflow: hidden;">
									<?=@$main[0]['summary']?>
								</div><div class="b-description_readmore_button"></div></div>
							</div>
						</div>
						<!-- end card content -->
					</div>
				</div>
			</div>
			<div class="col-12 col-xl-8">

				<iframe src="http://databasegdriveplayer.me/player.php?type=<?=$type?>&id=<?=$main[0]['id']?>&episode=<?=$eps?>" frameborder="0" width="100%" height="400px" allowfullscreen="allowfullscreen"> </iframe>

			</div>
			<div class="col-12 col-xl-4">
				<div class="accordion" id="accordion">
					<div class="accordion__card">

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								<table class="accordion__list">
									<tbody>
										<?php if (@(int)$main[0]['total_episode'] <= 1): ?>
											<tr>
												<td><?=@$main[0]['title']?></td>
											</tr>
											<?php else: ?>
												<?php for ($i= 0; $i < (int)$main[0]['total_episode']; $i++): ?>
													<tr>
															<td><a href="<?=base_url($this->controller)?>/detail/<?=$main[0]['id']?>/<?=$i+1?>"><?=@$main[0]['title']?> eps <?=$i+1?></a></td>
													</tr>
												<?php endfor ?>
											<?php endif ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
		<!-- player -->
		<!-- end player -->
	</section>
	<!-- end details -->