<?php	
	if (isset($_GET['search']) && $_GET['search_cond'] == 'true') {
		$search_clean = str_replace(' ', '+', $_GET['search']);
		$search_url = 'http://api.themoviedb.org/3/search/movie?api_key=1b2f29d43bf2e4f3142530bc6929d341&query='.$search_clean;
		$search_json = file_get_contents($search_url);
		$search_array = json_decode ($search_json, true);
	}
?>

<div class="search-container">
	<div class="search_head">
		Here is the search result for "<?php echo $_GET['search']; ?>"
	</div>
	<?php 
		foreach($search_array['results'] as $sch) { ?>
			<div class="res-container">
				<div class="res-images">
					<img src="<?php echo 'https://image.tmdb.org/t/p/w185'.$sch['poster_path'] ?>">
				</div>
				<div class="res-desc-container">
					<table class="res-table">
						<tr>
							<td class="res-left">Title</td>
							<td><?php echo $sch['title']; ?></td>
						</tr>
						<?php 
							if ($sch['title'] != $sch['original_title']) {
						?>
						<tr>
							<td class="res-left">Original Title</td>
								<td><?php echo $sch['original_title']; ?></td>
						</tr>
						<?php } ?>
						<tr>
							<td class="res-left">Year Release</td>
							<td><?php echo substr($sch['release_date'], 0, 4); ?></td>
						</tr>
						<tr>
							<td class="res-left">Synopsis</td>
							<td><?php echo $sch['overview']; ?></td>
						</tr>
						<tr>
							<td></td>
							<td><a class="btn-details" href="index.php?menu=details&mid=<?php echo $sch['id']; ?>">See Details</a></td>
						</tr>
					</table>
				</div>
			</div>
		<?php }
	?>
</div>
