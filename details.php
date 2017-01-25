<?php 
	if ($_GET['menu'] == 'details' && isset($_GET['mid'])) {
		$detail_url = 'http://api.themoviedb.org/3/movie/'.$_GET['mid'].'?api_key=1b2f29d43bf2e4f3142530bc6929d341';
		$detail_json = file_get_contents($detail_url);
		$detail_arr = json_decode ($detail_json, true);
	}
?>

<div style="width: 80%;"class="search-container">
	<div class="res-container">
		<div class="res-images">
			<img src="<?php echo 'https://image.tmdb.org/t/p/w185'.$detail_arr['poster_path'] ?>">
		</div>
		<div class="res-desc-container">
			<table class="res-table">
				<tr>
					<td class="res-left">Title</td>
					<td><?php echo $detail_arr['title']; ?></td>
				</tr>
				<?php 
					if ($detail_arr['title'] != $detail_arr['original_title']) {
				?>
				<tr>
					<td class="res-left">Original Title</td>
						<td><?php echo $detail_arr['original_title']; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td class="res-left">Year Release</td>
					<td><?php echo substr($detail_arr['release_date'], 0, 4); ?></td>
				</tr>
				<tr>
					<td class="res-left">Genres</td>
					<td>
					<?php 
						foreach ($detail_arr['genres'] as $genre) {
							echo $genre['name'].' ';
						}
					?>
					</td>
				</tr>
				<tr>
					<td class="res-left">Production Company</td>
					<td>
					<?php
						foreach ($detail_arr['production_companies'] as $prd) {
							echo $prd['name'].' ';
						}
					?></td>
				</tr>
				<tr>
					<td class="res-left">Synopsis</td>
					<td><?php echo $detail_arr['overview']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><a class="btn-details" href="index.php?menu=details&mid=<?php echo $detail_arr['id']; ?>">See Details</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>