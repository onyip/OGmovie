<div class="filter section--first:before" style="margin-top: 7rem;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="filter__content">
					<div class="row">
						<a href="<?=base_url($this->controller)?>/genre/Action"><button class="filter__btn" type="button" style="margin: 5px;">Action</button></a>
						<a href="<?=base_url($this->controller)?>/genre/Adventure"><button class="filter__btn" type="button" style="margin: 5px;">Adventure</button></a>
						<a href="<?=base_url($this->controller)?>/genre/Comedy"><button class="filter__btn" type="button" style="margin: 5px;">Comedy</button></a>
						<a href="<?=base_url($this->controller)?>/genre/Sci-Fi"><button class="filter__btn" type="button" style="margin: 5px;">Sci-Fi</button></a>
						<a href="<?=base_url($this->controller)?>/genre/Horror"><button class="filter__btn" type="button" style="margin: 5px;">Horror</button></a>
						<a href="<?=base_url($this->controller)?>/genre/Romance"><button class="filter__btn" type="button" style="margin: 5px;">Romance</button></a>
						<a href="<?=base_url($this->controller)?>/genre/History"><button class="filter__btn" type="button" style="margin: 5px;">History</button></a>
					</div>
					<div class="filter__items">
						<!-- filter item -->
						<div class="filter__item" id="filter__genre">
							<span class="filter__item-label">MORE GENRE:</span>

							<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="ALL GENRE">
								<span></span>
							</div>

							<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
								<a href="<?=base_url($this->controller)?>/genre/Action"><li>Action</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Adventure"><li>Adventure</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Animals"><li>Animals</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Animation"><li>Animation</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Comedy"><li>Comedy</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Documentary"><li>Documentary</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Education"><li>Education</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Family"><li>Family</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Fantasy"><li>Fantasy</li></a>
								<a href="<?=base_url($this->controller)?>/genre/History"><li>History</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Horror"><li>Horror</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Kids"><li>Kids</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Military"><li>Military/War</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Crime"><li>Crime</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Nature"><li>Nature</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Romance"><li>Romance</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Sci"><li>Sci-Fi</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Horror"><li>Horror</li></a>
								<a href="<?=base_url($this->controller)?>/genre/Travel"><li>Travel</li></a>
							</ul>
						</div>
						<!-- end filter item -->
					</div>

					<!-- filter btn -->
					<!-- end filter btn -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end filter -->
<!-- catalog -->
<div class="catalog">
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
								<a href="<?=base_url($this->controller)?>/detail/<?=$v['imdb']?>" class="card__play">
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
			</div>
		<?php endif ?>
	</div>
</div>
<!-- end catalog -->