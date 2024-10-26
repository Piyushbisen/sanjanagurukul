<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$total_recent_news_home_page = $row['total_recent_news_home_page'];
	$home_title_service          = $row['home_title_service'];
	$home_subtitle_service       = $row['home_subtitle_service'];
	$home_status_service         = $row['home_status_service'];
	$home_title_team_member      = $row['home_title_team_member'];
	$home_subtitle_team_member   = $row['home_subtitle_team_member'];
	$home_status_team_member     = $row['home_status_team_member'];
	$home_title_testimonial      = $row['home_title_testimonial'];
	$home_subtitle_testimonial   = $row['home_subtitle_testimonial'];
	$home_photo_testimonial      = $row['home_photo_testimonial'];
	$home_status_testimonial     = $row['home_status_testimonial'];
	$home_title_news             = $row['home_title_news'];
	$home_subtitle_news          = $row['home_subtitle_news'];
	$home_status_news            = $row['home_status_news'];
	$home_title_partner          = $row['home_title_partner'];
	$home_subtitle_partner       = $row['home_subtitle_partner'];
	$home_status_partner         = $row['home_status_partner'];
	$counter_1_title             = $row['counter_1_title'];
    $counter_1_value             = $row['counter_1_value'];
    $counter_2_title             = $row['counter_2_title'];
    $counter_2_value             = $row['counter_2_value'];
    $counter_3_title             = $row['counter_3_title'];
    $counter_3_value             = $row['counter_3_value'];
    $counter_4_title             = $row['counter_4_title'];
    $counter_4_value             = $row['counter_4_value'];
    $counter_photo               = $row['counter_photo'];
    $counter_status              = $row['counter_status'];
}
?>

<!-- Slider Start -->
<section class="main-slider">
	<div class="slider">
	    <div class="container">
	        <div class="static-text" style="margin-top:30px">
				<h2>
				Your Gateway to 
				</h2>
				<h1>Hindi Language</h1>
				<p>
					One-of-a-kind Hindi learning academy overseas open for all ages.
				</p>
				
				<p class="button">
					<a href="<?php echo BASE_URL; ?>page/contact-us" class="btn btn-flat">Contact Us</a>
					<a href="<?php echo BASE_URL; ?>custom-course.php" class="btn btn-flat">Explore Courses</a>

				</p>
								
            </div>
        </div>
		<ul class="bxslider">
				
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_slider WHERE status=? ORDER BY id DESC");
			$statement->execute(array('Active'));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
			foreach ($result as $row) 
			{
				if($row['position']=='Left') {$align='tal';}
				if($row['position']=='Center') {$align='tac';}
				if($row['position']=='Right') {$align='tar';}
				?>
				<li style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>);">
					<div class="overlay"></div>
					<div class="content">
						<div class="inner <?php echo $align; ?>">
							<div class="text">
							
								<!--<?php if($row['heading']!=''): ?>-->
								<!--<h2>-->
								<!--Your Gateway to -->
								<!--</h2>-->
								<!--<h1>Hindi Language</h1>-->
								<!--<?php endif; ?>-->
								
								<!--<?php if($row['content']!=''): ?>-->
								<!--<p>-->
								<!--	<?php echo nl2br($row['content']); ?>-->
								<!--</p>-->
								<!--<?php endif; ?>-->
								
								<!--<?php if($row['button_text']!=''): ?>-->
								<!--<p class="button">-->
								<!--	<a href="<?php echo $row['button_url']; ?>" class="btn btn-flat"><?php echo $row['button_text']; ?></a>-->
								<!--	<a href="<?php echo $row['button_url']; ?>" class="btn btn-flat">Explore Courses</a>-->

								<!--</p>-->
								
								<!--<?php endif; ?>-->

							</div>
						</div>
					</div>
				</li>
				<?php
			}
			?>			
		</ul>
	</div>
</section>
<!-- Slider End -->

<section class="service-v1" style="background-color:#212026">
	<div class="container">
	<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;">About <span style="color:#ffd64a; font-family: 'Fraunces', serif;">Sanjana Gurukul</span></h2>
					<p style="font-size:22px;color:white; font-family: 'Fraunces', serif; margin-top:50px">Sanjana Gurukul is more than just an online language academy; it's a community dedicated to preserving and promoting the beauty of the Hindi language. We believe that learning Hindi is not just about acquiring a new skill, but also about connecting with your Indian heritage and culture.
					Beyond the classroom, Sanjana Gurukul is a family of Hindi enthusiasts committed to preserving our mother tongue.</p>
					<p class="about_button" style="margin-top:50px">
						<a style="font-family: 'Fraunces', serif; font-size: 18px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; border: 2px solid #ffd64a; color: white; padding: 10px 20px; border-radius: 15px; font-weight: 600;" href="<?php echo BASE_URL; ?>sanjanagurukul.php" class="btn btn-flat">Know More</a>									
					</p>
				</div>
				
			</div>
		</div>
	</div>


</section>


<?php if($home_status_service == 'Show'): ?>
<!-- Service Start -->
<section class="service-v1" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/file-2.png); background-repeat: no-repeat; -webkit-background-size: cover; background-size: cover; background-position: center center;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;"><?php echo $home_title_service; ?></h2>
					<p style="color:#ffd64a; font-family: 'Fraunces', serif; font-size:40px; font-weight:900; margin-top:20px"><?php echo $home_subtitle_service; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_service ORDER BY id ASC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
			foreach ($result as $row) {
				?>
				<div class="col-sm-6 col-md-6 ser-item wow fadeInUp" >
				<div class="item" style="border-radius:20px; min-height:542px; display: flex; flex-direction: column; justify-content: space-between;">
					<div class="photo" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>); border-radius:20px;"></div>
					<div class="text">
						<h3><a href="<?php echo BASE_URL.URL_SERVICE.$row['slug']; ?>"><?php echo $row['name']; ?></a></h3>
						<?php if($row['id'] =='4' || $row['id'] =='5' || $row['id'] =='6'): ?>
						<p class="duration" style="font-weight: 600; color: black; font-family: 'Fraunces', serif; font-size: 24px; display: flex; align-items: center; margin-top:0px">
							<i class="fa fa-play-circle-o" style="font-size: 34px; margin-right: 2px;"></i> 
							<span style="margin-left:10px; font-size:18px">12 weeks</span>
							<span class="separator" style="background-color:black !important"></span>
							<i class="fa fa-hourglass-half" style="font-size: 24px; margin-right: 2px;"></i> 
							<span style="margin-left:10px; font-size:18px">2 classes per week</span>
						</p> 
						<?php endif; ?>
						<p><?php echo $row['short_description']; ?></p>
					</div>
					<div class="knowmorebtn"> 
						<p class="about_button" style="display:flex; justify-content:end; align-items:bottom; padding-bottom:20px; padding-right:20px; margin-top:0px">
							<a style="font-family: 'Fraunces', serif; font-size: 16px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; border: 2px solid black; color: black; padding: 10px 20px; border-radius: 15px; font-weight: 600;" href="#" class="btn btn-flat">Know More <i class="fa fa-arrow-circle-right"></i></a>									
						</p>
					</div>
				</div>

				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
<!-- Service End -->
<?php endif; ?>

<section class="service-v1" style="background-color:black">
	<div class="container ">
		<div class="image" id="parallaxImage">
			<img class="img-fluid image imagehove" style="width:100%; height: auto;"  src="<?php echo BASE_URL; ?>assets/uploads/file-10.png" alt="">
		</div>
	</div>

</section>



<?php if($counter_status == 'Show'): ?>
<div class="why-us" style="background-color:#989796">
	<div class="overlay"></div>
	<div class="container">
		<div class="row why-us-counter">
			<div class="col-md-4">
				<div class="counter"><?php echo $counter_1_value; ?> </div>
				<div class="title"><?php echo $counter_1_title; ?></div>
			</div>
			<div class="col-md-4">
				<div class="counter"><?php echo $counter_2_value; ?> </div>
				<div class="title"><?php echo $counter_2_title; ?></div>
			</div>
			<div class="col-md-4">
				<div class="counter"><?php echo $counter_3_value; ?> </div>
				<div class="title"><?php echo $counter_3_title; ?></div>
			</div>
			
		</div>
	</div>
</div>
<?php endif; ?>

<section class="service-v1" style="background-color:#222121; background-image:url(<?php echo BASE_URL; ?>assets/uploads/file-5.png); background-repeat: no-repeat; -webkit-background-size: cover; background-size: cover; background-position: center center;">
	<div class="container ">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-quote-left" style="font-size:124px; color:#fdba3b"></i>
				<h2 style="color:white; font-family: 'Fraunces', serif; font-size: 66px; font-weight:900"> Our Success Stories</h2>
				<p class="about_button" style="margin-top:10px; ">
					<a style="font-family: 'Fraunces', serif; font-size: 16px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; border: 2px solid #ffd64a; color: white; padding: 20px 40px; border-radius: 15px; font-weight: 600;" href="#" class="btn btn-flat">Read more </a>									
				</p>
				
			</div>
			<div class="col-md-8">
				<div class="col oursuccessitem" >
					<span class="fa fa-star" style="color:black; font-size:35px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span><br><br>
					<p style="color:black; font-family: 'Fraunces', serif; font-size:16px">We were looking for a good Hindi teacher for our 4-year-old and then we came across teacher Sanjana’s flyer on Facebook. After formal discussion we enrolled our son to start with his Hindi base. We would say that has been the best decision we took. The way she has comforted our little one with patience and developed interest in him for the subject is worth appreciation. With covid and limitations of online study practices we were little concerned initially as to how the learning will shape up, but all thanks to her she handled the varnmala phonic and writing so beautifully that we did not miss the actual classroom practice. She gives attention to every kid in the online classroom and makes sure kids have understood. She also understands Kids mood and make them understand the subject sometimes playfully being a kid herself, that is something praiseworthy. We can proudly say that our son is happily learning Hindi and he looks forward for the class and to meet his favourite teacher Sanjana. We as parents know one thing for sure that his love for Hindi learning is going to reach great heights under her expertise.
					</p>
					<br>
					<p style="color:black; font-family: 'Lora', serif; font-size:16px; font-style: italic; font-weight:700">Jyoti & Ashwin Shrivastava</p>

				</div>
				<div class="col oursuccessitem" style="background-color:white">
					<span class="fa fa-star" style="color:black; font-size:35px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span>
					<span class="fa fa-star" style="color:black; font-size:35px; margin-left:5px"></span><br><br>
					<p style="color:black; font-family: 'Fraunces', serif; font-size:16px">I wanted to thank you for your hard work in the Hindi classes that you provide. Your patience and commitment to support my son Sagar during the Hindi lessons really means a lot. Your expertise in teaching Hindi and unique techniques makes it easier for kids to understand the fundamentals and it puts our minds at ease as you not only teach them but you make them practice the lessons as well and all this you do with such great care. I am really grateful to have you as my child’s teacher and wish you were teaching other subjects as well.</p>
					<br>
					<p style="color:black; font-family: 'Lora', serif; font-size:16px; font-style: italic; font-weight:700">Geeta Ruwali<br>Scotland United Kingdom</p>

				</div>

			</div>
		</div>
		
	</div>

</section>




<?php if($home_status_team_member == 'Show'): ?>
<!-- Team Member Start -->
<section class="team-member-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2><?php echo $home_title_team_member; ?></h2>
					<p><?php echo $home_subtitle_team_member; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- Team Member Carousel Start -->
				<div class="team-member-carousel">
					<?php
					$statement = $pdo->prepare("SELECT 
												
												t1.id,
												t1.name,
												t1.slug,
												t1.designation_id,
												t1.photo,
												t1.facebook,
												t1.twitter,
												t1.linkedin,
												t1.youtube,
												t1.google_plus,
												t1.instagram,
												t1.flickr,

												t2.designation_id,
												t2.designation_name

					                           FROM tbl_team_member t1
					                           JOIN tbl_designation t2
					                           ON t1.designation_id = t2.designation_id
					                           WHERE t1.status = ?
					                           ");
					$statement->execute(array('Active'));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>
						<div class="item wow fadeInUp">
							<div class="thumb">
								<div class="photo" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>);"></div>
								<div class="overlay"></div>
								<div class="social-icons">
									<ul>
										<?php if($row['facebook']!=''): ?>
											<li><a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>

										<?php if($row['twitter']!=''): ?>
											<li><a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>

										<?php if($row['linkedin']!=''): ?>
											<li><a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<?php endif; ?>

										<?php if($row['youtube']!=''): ?>
											<li><a href="<?php echo $row['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
										<?php endif; ?>

										<?php if($row['google_plus']!=''): ?>
											<li><a href="<?php echo $row['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<?php endif; ?>

										<?php if($row['instagram']!=''): ?>
											<li><a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
										<?php endif; ?>

										<?php if($row['flickr']!=''): ?>
											<li><a href="<?php echo $row['flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div class="text">
								<h3><a href="<?php echo BASE_URL.URL_TEAM.$row['slug']; ?>"><?php echo $row['name']; ?></a></h3>
								<p><?php echo $row['designation_name']; ?></p>
							</div>
						</div>
						<?php
					}
					?>					
				</div>
				<!-- Team Member Carousel End -->

			</div>
		</div>
	</div>
</section>
<!-- Team Members End -->
<?php endif; ?>






<?php if($home_status_news == 'Show'): ?>
<!-- News Start -->
<section class="news-v1" style="background-color:#454545">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;"><?php echo $home_title_news; ?></h2>
					<p style="color:#ffd64a; font-family: 'Fraunces', serif; font-size:40px; font-weight:900; margin-top:20px"><?php echo $home_subtitle_news; ?></p>
				
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
						if($i>$total_recent_news_home_page) {break;}
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
<?php endif; ?>





<?php if($home_status_testimonial == 'Show'): ?>
<!-- Testimonial Start -->
<section class="testimonial-v1" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $home_photo_testimonial; ?>);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo $home_title_testimonial; ?></h2>
					<p><?php echo $home_subtitle_testimonial; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- Testimonial Carousel Start -->
				<div class="testimonial-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial ORDER BY id ASC");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>
						<div class="item">
							<div class="testimonial-wrapper">								
								<div class="content">									
									<div class="author">
										<div class="photo">
											<img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
										</div>
										<div class="text">
											<h3><?php echo $row['name']; ?></h3>
											<h4><?php echo $row['designation']; ?> 
											<?php if($row['company']!=''): ?>
											<span>(<?php echo $row['company']; ?>)</span>
											<?php endif; ?>
											</h4>
										</div>
									</div>	
									<div class="comment">
										<p>
											<?php echo nl2br($row['comment']); ?>
										</p>
										<div class="icon"></div>
									</div>									
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<!-- Testimonial Carousel End -->

			</div>
		</div>
	</div>
</section>
<!-- Testimonial End -->
<?php endif; ?>


<?php if($home_status_partner == 'Show'): ?>
<!-- Partner Start -->
<section class="partner-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo $home_title_partner; ?></h2>
					<p><?php echo $home_subtitle_partner; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="partner-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_partner ORDER BY id ASC");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>
						<div class="item">
							<div class="inner">
								<?php if($row['url']==''): ?>
									<img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
								<?php else: ?>
									<a href="<?php echo $row['url']; ?>" target="_blank"><img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>"></a>
								<?php endif; ?>
								
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Partner End -->
<?php endif; ?>


<section class="service-v1" style="background-color:#232323; background-image: url(<?php echo BASE_URL; ?>assets/uploads/file-6.png);  background-repeat: no-repeat;  background-size: contain;  background-position: center calc(10px + 10%); "> 
	<div class="container ">
		<div class="heading wow fadeInUp" style="margin-top:120px">
			<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;">Start Learning Today!</h2>

			<p class="about_button" style="margin-top:20px">
				<a style="font-family: 'Fraunces', serif; font-size: 16px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; background-color: #ffd64a;  color: black; padding: 10px 20px; border-radius: 15px; font-weight: 600;" href="#" class="btn btn-flat">Contact Us</a>									
			</p>
		</div>
		
	</div>

</section>


<?php require_once('footer.php'); ?>