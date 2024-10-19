<!-- Sidebar Container Start -->
<style>
	.blogflagside {
	clip-path: polygon(100% 0, 90% 50%, 100% 100%, 0 100%, 0 0); background-color: #ffeaa4;  max-width: 50%; height: 40px; position: relative; margin-left:-5px; margin-bottom:30px; margin-top:20px; color: white;
}
</style>

<div class="sidebar" >
	<div class="widget widget-search">
		<form action="<?php echo BASE_URL.URL_SEARCH; ?>" method="post">
			<input type="text" name="search_string" placeholder="<?php echo SEARCH; ?>">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<!-- <div class="widget">
		<?php
		$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$total_recent_news_sidebar = $row['total_recent_news_sidebar'];
			$total_popular_news_sidebar = $row['total_popular_news_sidebar'];
		}
		?>
		<h4><?php echo CATEGORIES; ?></h4>
		<ul>
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_category ORDER BY category_name ASC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
			foreach ($result as $row) {
				?>
				<li><a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li>
				<?php
			}
			?>
		</ul>
	</div> -->
	<div class="widget" >
		<h4><?php echo "Recent Blogs..." ?></h4>
		<ul style="border: 3px solid #ffd64a; border-radius: 10px; padding:5px">
			<?php
			$i=0;
			$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
			foreach ($result as $row) {
				$i++;
				if($i>$total_recent_news_sidebar) {break;}
				?>
				<div class="blogflagside">
					<div style="position: absolute; top: 50%; left: 5%; transform: translate(-0%, -50%);  font-size: 10px; color:black; font-weight:900; font-family: 'Lora', serif;">
					<i class="fa fa-edit" ></i>
						HAPPY LEARNERS
					</div>
				</div>
				<li><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>" style="color:white; ;font-family: 'Lora', serif "><i><?php echo $row['news_title']; ?></i></a>
				<!-- <ul class="status"> -->
					<!-- <li><i class="fa fa-tag"></i><?php echo CATEGORY_COLON; ?> <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li> -->
					<p class="" style="font-size:12px"><i class="fa fa-calendar" style="margin-right:5px"></i><i><?php echo POSTED_ON; ?> <?php echo $row['news_date']; ?></i></p>
				</li>
				
				<?php
			}
			?>
		</ul>
	</div>
	<!-- <div class="widget">
		<h4><?php echo POPULAR_NEWS; ?></h4>
		<ul>
			<?php
			$i=0;
			$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY total_view DESC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
			foreach ($result as $row) {
				$i++;
				if($i>$total_popular_news_sidebar) {break;}
				?>
				<li><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></li>
				<?php
			}
			?>
		</ul>
	</div> -->
</div>
<!-- Sidebar Container End -->