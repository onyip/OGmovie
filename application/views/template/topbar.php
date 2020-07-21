
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="<?=base_url()?>" class="header__logo">
								<img src="<?=base_url()?>assets/img/logo.png" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a href="<?=base_url()?>" class="header__nav-link">Movie</a>
								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="header__nav-item">
									<a href="<?=base_url()?>drama" class="header__nav-link">Drama</a>
								</li>
								<!-- end dropdown -->

								<li class="header__nav-item">
									<a href="<?=base_url()?>anime" class="header__nav-link">Anime</a>
								</li>

								<li class="header__nav-item">
									<a href="<?=base_url()?>series" class="header__nav-link">Series</a>
								</li>

							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="<?=base_url($this->controller)?>/search" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" name="search" placeholder="Search what you are looking for" value="<?=@$search?>">

							<button type="submit">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->