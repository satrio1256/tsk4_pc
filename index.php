<?php 
	if (isset($_GET['search']) && empty($_GET['search_cond'])) {
		$search_query = $_GET['search'];
		$search_replace = str_replace(' ', '+', $search_query);
		header ('Location: index.php?menu=search&search='.$search_replace.'&search_cond=true');
	}
?>

<html>
<head>
	<title>The Movie Database Showcase</title>
	<link rel="stylesheet" href="stylesheet/main.css"/>
</head>
<body>
	<div class="menu-container">
		<div class="left">
			<img src="https://www.themoviedb.org/assets/static_cache/2dceae11589334eecd61443249261daf/images/v4/logos/208x226-stacked-green.png"/>
			<div class="menu">
				<ul>
					<li><a href="index.php">Homepage</a></li>
					<li><a href="#">Popular</a></li>
					<li><a href="#">Dunno</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
		</div>
		<div class="right">
			<form method="GET">
				<input name="search" placeholder="Search something here..." required/>
				<button class="btn-search" type="submit"><img src="http://www.fearfuladventurer.com/wp-content/plugins/Fancy%20Gallery/assets/hover%20icons/magnifier.png"/></button>
			</form>
		</div>
	</div>
	<div class="main-container">
		<?php 
			if (empty($_GET['menu']) || isset($_GET['menu']) && $_GET['menu'] == 'home') {
				include ('home.php');
			} else if (isset($_GET['menu'])) {
				if ($_GET['menu'] == 'search') {
					include('search.php');
				} else if ($_GET['menu'] == 'details') {
					include('details.php');
				}
			}
		?>
	</div>
	<div class="footer">
		TMDB &copy; 2017, Indonesia | Sponsored by <a style="color: #fff; text-decoration: none;"href="https://www.themoviedb.org/">TMDb</a>
	</div>
</body>
</html>