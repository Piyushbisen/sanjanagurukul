<?php require_once('header.php'); ?>

<section class="gallery" style="background-color:black">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<ul class="gallery-menu">
					<li class="filter" data-filter="all" data-role="button">All</li>
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_category_photo WHERE status=?");
					$statement->execute(array('Active'));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						$temp_string = strtolower($row['p_category_name']);
    					$temp_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    					?>
    					<li class="filter" data-filter=".<?php echo $temp_slug; ?>" data-role="button"><?php echo $row['p_category_name']; ?></li>
						<?php
					}
					?>
				</ul>

				<div id="mix-container">
					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT
					                           	t1.photo_id,
												t1.photo_caption,
												t1.photo_name,
												t1.p_category_id,
												t2.p_category_id,
												t2.p_category_name,
												t2.status
					                            FROM tbl_photo t1
					                            JOIN tbl_category_photo t2
					                            ON t1.p_category_id = t2.p_category_id 
					                            ");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						$i++;
						$temp_string = strtolower($row['p_category_name']);
    					$temp_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
						?>
						<div class="col-md-4 mix <?php echo $temp_slug; ?> all" data-my-order="<?php echo $i; ?>">
							<div class="inner">
								<div class="photo" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo_name']; ?>);"></div>
								<div class="overlay"></div>
								<div class="icons">
									<div class="icons-inner">
										<a class="gallery-photo" href="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo_name']; ?>"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>

				</div>

			</div>
		</div>

		
<!-- News Start -->
<section class="news-v1" style="background-color:white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;">Discover our latest insights and tips on</h2>
					<p style="color:#ffd64a; font-family: 'Fraunces', serif; font-size:40px; font-weight:900; margin-top:20px">Hindi language learning</p>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- News Carousel Start -->
				<div class="news-carousel">

					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
					$statement->execute();
					$result = $statement->fetchAll();							
					foreach ($result as $row) {
						$i++;
						?>
						<div class="item wow fadeInUp" >
							<div class="thumb">
								<div class="photo" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>);"></div>
							</div>
							<div class="text">
								<h3><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></h3>
								<!-- <?php echo $row['news_content_short']; ?> -->
								<p class="about_button" style="margin-top:20px">
								<a style="font-family: 'Fraunces', serif; font-size: 16px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; border: 2px solid black; color: black; padding: 10px 20px; border-radius: 35px; font-weight: 600;" href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>" class="btn btn-flat">Read More <i class="fa fa-arrow-circle-right" ></i></a>									
							</p>
							</div>
							
						</div>
						<?php
					}
					?>
					
				</div>
				<!-- News Carousel End -->

			</div>
		</div>
	</div>
</section>
<!-- News End -->

	</div>
</section>


<?php require_once('footer.php'); ?>