<!-- details -->
<section class="section details">
	<!-- details background -->
	<div class="details__bg" data-bg="<?=@$main['Poster']?>"></div>
	<!-- end details background -->

	<!-- details content -->
	<div class="container">
		
		<div class="row">
			<!-- title -->
			<div class="col-12">
				<h1 class="details__title"><?=@$main['Title']?></h1>
			</div>
			<!-- end title -->

			<div class="col-10">
				<div class="card card--details card--series">
					<div class="row">
						<!-- card cover -->
						<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
							<div class="card__cover" style="text-align: center;">
								<img src="<?=@$main['Poster']?>" alt="">
							</div>
						</div>
						<!-- end card cover -->

						<!-- card content -->
						<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
							<div class="card__content">
								<div class="card__wrap">
									<span class="card__rate"><i class="icon ion-ios-star"></i><?=@$main['imdbRating']?></span>

									<ul class="card__list">
										<li>HD</li>
									</ul>
								</div>

								<ul class="card__meta">
									<li><span>Genre:</span> <a href="#"><?=@$main['Genre']?></a>
										</li>
										<li><span>Release year:</span> <?=@$main['Year']?></li>
										<li><span>Running time:</span> <?=@$main['Runtime']?></li>
										<li><span>Country:</span> <a href="#"><?=@$main['Country']?></a> </li>
									</ul>

									<div class="b-description_readmore_wrapper js-description_readmore_wrapper" style="max-width: 682.5px;"><div class="card__description card__description--details b-description_readmore_ellipsis" style="min-height: 150px; max-height: 150px; overflow: hidden;">
										<?=@$main['Plot']?>
									</div><div class="b-description_readmore_button"></div></div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
		<!-- player -->
		<div style="text-align: center">
			<iframe src="http://databasegdriveplayer.me/player.php?imdb=<?=@$main['imdbID']?>" frameborder="0" width="70%" height="470px" allowfullscreen="allowfullscreen"> </iframe>
		</div>
		<!-- end player -->
	</section>
	<!-- end details -->