<?php 
	$top_url = 'http://api.themoviedb.org/3/movie/top_rated?api_key=1b2f29d43bf2e4f3142530bc6929d341';
	$top_json = file_get_contents($top_url);
	$top_array = json_decode ($top_json, true);
?>

<div class="p-title">
	Top Rated Movies
</div>
<div class="popular">
	<div class="popular_scroll">
	<?php 
		foreach ($top_array['results'] as $res) { ?>
			<div class="container">
				<div class="container_img">
					<img src="<?php echo 'https://image.tmdb.org/t/p/w185'.$res['poster_path']; ?>">
				</div>
				<div class="container_text">
					<?php echo $res['title'].'<br />'.substr($res['release_date'], 0, 4); ?>
				</div>
			</div>
		<?php }
	?>
	</div>
</div>