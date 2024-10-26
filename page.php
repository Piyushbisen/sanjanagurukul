<?php
require_once('header.php');

// Preventing the direct access of this page.
if(!isset($_REQUEST['slug']))
{
	header('location: index.php');
	exit;
}
else
{
	// Check the page slug is valid or not.
	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=? AND status=?");
	$statement->execute(array($_REQUEST['slug'],'Active'));
	$total = $statement->rowCount();
	if( $total == 0 )
	{
		header('location: index.php');
		exit;
	}
}

// Getting the detailed data of a page from page slug
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
$statement->execute(array($_REQUEST['slug']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) 
{
	$page_name    = $row['page_name'];
	$page_slug    = $row['page_slug'];
	$page_content = $row['page_content'];
	$page_layout  = $row['page_layout'];
	$banner       = $row['banner'];
	$status       = $row['status'];
}

// If a page is not active, redirect the user while direct URL press
if($status == 'Inactive')
{
	header('location: index.php');
	exit;
}
?>

<style>
	.blogflagdark {
	clip-path: polygon(100% 0, 90% 50%, 100% 100%, 0 100%, 0 0); background: linear-gradient(to top, rgba(253, 186, 59, 1), rgba(255, 234, 164, 1)); max-width: 40%; height: 60px; position: relative; margin-left:-40px; margin-bottom:30px; margin-top:20px; color: black;
}

.blogflag {
	clip-path: polygon(100% 0, 90% 50%, 100% 100%, 0 100%, 0 0); background-color: #605f5e; max-width: 40%; height: 60px; position: relative; margin-left:-40px; margin-bottom:30px; margin-top:20px; color: white;
}

.blogheading {
	color:black !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	font-size: 25px;
	font-weight: 900;
}

.blogheadingdark {
	color:white !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	font-size: 25px;
	font-weight: 900;
}

.blogp {
	color:black !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	font-size: 18px !important;
}

.blogpdark {
	color:white !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	font-size: 18px !important;
}

.blogbutton {
	color:black !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	border: 2px solid black !important;
}

.blogbuttondark {
	color:white !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
	border: 2px solid #ffeaa4 !important;
}

.blogposted {
	color:black !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
}

.blogposteddark {
	color:white !important; 
	font-family: 'Fraunces', serif !important; 
	text-transform:none !important;
}

</style>
		
		
<!-- Banner Start -->
<?php if ($page_slug != 'photo-gallery') { ?>
<div class="page-banner" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $banner; ?>)">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text">
				<?php if ($page_slug != 'blog') { ?>
					<h1 style="font-family: 'Fraunces', serif; font-size: 50px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s;  color: white;  font-weight: 600;"><?php echo $page_name; ?></h1>
					<?php if ($page_slug == 'faq') { ?>
						<h1 style="font-family: 'Fraunces', serif; font-size: 50px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s;  color: #ffd64a;  font-weight: 600;">Find the Answers <br>You Need</h1>
					<?php } ?>
					<?php if ($page_slug == 'contact-us') { ?>
						<h1 style="font-family: 'Fraunces', serif; font-size: 30px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s;  color: #ffd64a;  font-weight: 600;">Connect with us if you have any queries or questions.</h1>
					<?php } ?>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($page_slug == 'photo-gallery') { ?>
<div class="col-md-12" style="margin-top:50px; margin-bottom: 50px;">
				<div class="banner-text" style="text-align:center">
					<h1 style="font-family: 'Fraunces', serif; font-size: 50px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s;  color: white;  font-weight: 600;"><?php echo $page_name; ?></h1>
			
				</div>
			</div>
			<?php } ?>
<!-- Banner End -->


<?php if($page_layout == 'Full Width Page Layout'): ?>
<section class="about-v2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($page_layout == 'Contact Us Page Layout'): ?>
<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_map_iframe = $row['contact_map_iframe'];
	}
?>
<section class="contact-v1" >
	<div style="background-color:#605f5e">
	<div class="container">
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="heading-normal">
					<h2><?php echo CONTACT_FORM; ?></h2>
				</div>
			</div>
		</div> -->

		<div class="row" style="margin-bottom:50px">
			<!-- <div class="col-md-6">
				<div class="google-map">
					<?php echo $contact_map_iframe; ?>
				</div>	
			</div> -->
			<div class="col-md-12" style="align-items: center;">
				
				<ul >
				<li style="display: flex; align-items: center; text-align: center; padding: 5px; margin-bottom: 30px;">
					<span style="display: flex; justify-content: center; align-items: center; width: 50px; height: 50px; background-color: #f4b609; border-radius: 50%;">
						<i class="fa fa-phone-square" style="color: black; font-size: 25px;"></i>
					</span>
					<span style="margin-left: 30px; color:white; font-size:20px">+27 62 307 1568</span>
				</li>

				<li style="display: flex; align-items: center; padding: 5px; margin-bottom: 60px;">
					<span style="display: flex; justify-content: center; align-items: center; width: 50px; height: 50px; background-color: #f4b609; border-radius: 50%;">
						<i class="fa fa-envelope" style="color: black; font-size: 25px;"></i>
					</span>
					<span style="margin-left: 30px; color:white; font-size:20px">xyz@sanjanagurukul.com</span>
				</li>

				<!-- <li style="display: flex; align-items: center; padding: 5px; margin-bottom: 60px;">
					<span style="display: flex; justify-content: center; align-items: center; width: 50px; height: 50px; background-color: #f4b609; border-radius: 50%;">
						<i class="fa fa-map-marker" style="color: black; font-size: 25px;"></i>
					</span>
					<span style="margin-left: 30px; color:white; font-size:20px">Kyalami Hills, Kyalami Estate Midrand, 1685</span>
				</li> -->

				</ul>
				
				<div class="col-md-12 top-social top-socialbottom" style="margin-bottom:40px">
							<!-- <span style="font-size:20px; color: white; font-family: 'Fraunces', serif; font-weight:700;">Follow Us On: </span> -->
							<ul style="margin-left:0px">
								<?php
								// Getting and showing all the social media icon URL from the database
								$statement = $pdo->prepare("SELECT * FROM tbl_social");
								$statement->execute();
								$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
								foreach ($result as $row) 
								{
									if($row['social_url']!='')
									{
										echo '<li style="background-color:white;  padding:15px; border-radius:50%; "><a href="'.$row['social_url'].'"><i class="'.$row['social_icon'].'"   style="color:black; font-size:20px"></i></a></li>';
									}
								}
								?>
							</ul>
						</div>

			</div>
		</div>
		</div>
		</div>
		<div style="background-color:black">
		<div class="container">
		<div class="row" style="margin-top:60px; margin-bottom:60px">
			<div class="col-md-6">
				<h2 style="font-family: 'Fraunces', serif; color:#ffd64a; font-size:40px; font-weight:900; margin-bottom:40px">
					Still have queries?
				</h2>
				<p style="font-size:25px; line-height:40px; margin-bottom: 50px;">
				leave us your query and we will get back to you soon.
				</p>
				<img src="<?php echo BASE_URL; ?>assets/uploads/file-23.png"  style="width:30%">


			</div>
			<div class="col-md-6" style="border: 2px solid white; border-radius:20px; padding:20px">

			<?php
// After form submit checking everything for email sending
if(isset($_POST['form_contact']))
{
	$error_message = '';
	$success_message = '';

	// $statement = $pdo->prepare("SELECT * FROM tbl_setting_email WHERE id=1");
	// $statement->execute();
	// $result = $statement->fetchAll();                           
	// foreach ($result as $row) {
	//     $send_email_from  = $row['send_email_from'];
	//     $receive_email_to = $row['receive_email_to'];
	//     $smtp_host        = $row['smtp_host'];
	//     $smtp_port        = $row['smtp_port'];
	//     $smtp_username    = $row['smtp_username'];
	//     $smtp_password    = $row['smtp_password'];
	// }

    $valid = 1;

    if(empty($_POST['full_name']))
    {
        $valid = 0;
        $error_message .= FULL_NAME_EMPTY_CHECK.'\n';
    }

    if(empty($_POST['phone']))
    {
        $valid = 0;
        $error_message .= PHONE_EMPTY_CHECK.'\n';
    }


    if(empty($_POST['email']))
    {
        $valid = 0;
        $error_message .= EMAIL_EMPTY_CHECK.'\n';
    }
    else
    {
    	// Email validation check
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message .= EMAIL_VALID_CHECK.'\n';
        }
    }

    if(empty($_POST['enroll']))
    {
        $valid = 0;
        $error_message .= COMMENT_EMPTY_CHECK.'\n';
    }

    if($valid == 1)
    {
		// getting auto increment id
        
        // $error_message .= COMMENT_EMPTY_CHECK.'\n';
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_register'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
		
		// $phoneNumber = $_POST['country_code'] . $_POST['phone'];
    	
		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_contactform (full_name, email,  phone,message) VALUES (?, ?, ?, ?)");
		$statement->execute(array($_POST['full_name'],$_POST['email'], $_POST['phone'], $_POST['message']));
		// echo "<script>alert('cdsvcfvf')</script>";
        $message            =  "New Entry from Feedback page.";
        $page = "<?php echo BASE_URL.'successstories.php' ?>";
        $active  = 1;
    
        // $statement = $pdo->prepare("INSERT INTO tbl_notification (message, page, active) VALUES (?, ?, ?)");
        // $statement->execute(array($message, $page, $active));


    	$success_message = 'Thank You For Your Valuable Feedback.';

    }
}
?>
				
				<?php
				if($error_message != '') {
					echo "<script>alert('".$error_message."')</script>";
				}
				if($success_message != '') {
					echo "<script>alert('".$success_message."')</script>";
				}
				?>

<!-- <?php echo BASE_URL.'success.php';  ?> -->
				<form action="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" class="form-horizontal cform-1" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="col-sm-12" >
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo FULL_NAME; ?>" name="full_name">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo EMAIL_ADDRESS; ?>" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo PHONE_NUMBER; ?>" name="phone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="enroll" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" cols="30" rows="10" placeholder="<?php echo MESSAGE; ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
	                    <div class="col-sm-12" style="text-align:center">
	                        <input type="submit" value="<?php echo SEND_MESSAGE; ?>" class="btn btn-success" style="background-color:black !important; border-radius:30px; width:40%; border:2px solid #ffd64a !important" name="form_contact">
	                    </div>
	                </div>
				</form>
			</div>
			</div>
			
			
		</div>
	</div>
</section>

<section class="news-v1" style="background-color:#212026">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2 style="text-transform: none; font-family: 'Fraunces', serif; color:white; font-size:50px; color:white !important;">Explore the courses offered</h2>
					<!-- <p style="color:#ffd64a; font-family: 'Fraunces', serif; font-size:40px; font-weight:900; margin-top:20px"><?php echo $home_subtitle_news; ?></p> -->
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- News Carousel Start -->
				<div class="news-carousel">

					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT * FROM tbl_service ORDER BY id DESC");
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
								<h3 style="font-size:24px"><a href="<?php echo BASE_URL.URL_SERVICE.$row['slug']; ?>"><?php echo $row['name']; ?></a></h3>
								<!-- <?php echo $row['news_content_short']; ?> -->
								<p class="about_button" style="margin-top:20px">
								<a style="font-family: 'Fraunces', serif; font-size: 16px; -webkit-transition: all 0.4s ease 0s; -moz-transition: all 0.4s ease 0s; -o-transition: all 0.4s ease 0s; transition: all 0.4s ease 0s; border: 2px solid black; color: black; padding: 10px 20px; border-radius: 35px; font-weight: 600;" href="<?php echo BASE_URL.URL_SERVICE.$row['slug']; ?>" class="btn btn-flat">Read More <i class="fa fa-arrow-circle-right" ></i></a>									
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

<?php endif; ?>



<?php if($page_layout == 'FAQ Page Layout'): ?>
<section class="faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">			
				
				<?php
				$i=0;
				$j=0;
				$statement = $pdo->prepare("SELECT * FROM tbl_faq_category ORDER BY faq_category_id ASC");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
				foreach ($result as $row) {
					$i++;
					?>
					<h1 style="color:#ffd64a; font-family: 'Fraunces', serif;"><?php echo $row['faq_category_name']; ?></h1>
					<div class="panel-group" id="accordion<?php echo $i; ?>" role="tablist" aria-multiselectable="true">
						<?php
						$statement1 = $pdo->prepare("SELECT * FROM tbl_faq WHERE faq_category_id=?");
						$statement1->execute(array($row['faq_category_id']));
						$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result1 as $row1) {
							$j++;
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading1">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="#collapse<?php echo $j; ?>" aria-expanded="false" aria-controls="collapse<?php echo $j; ?>">
											<?php echo $row1['faq_title']; ?>
										</a>
									</h4>
									
								</div>
								<div id="collapse<?php echo $j; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1" style="">
									<div class="panel-body">
										<?php echo $row1['faq_content']; ?>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>				
			</div>			
		</div>
	</div>
</section>

<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_map_iframe = $row['contact_map_iframe'];
	}
?>
<section class="contact-v1" style="background-color:black">
	<div style="background-color:black">
	<div class="container">
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="heading-normal">
					<h2><?php echo CONTACT_FORM; ?></h2>
				</div>
			</div>
		</div> -->

	
		<div style="background-color:black">
		<div class="container">
		<div class="row" style="margin-top:60px; margin-bottom:60px">
			<div class="col-md-6">
				<h2 style="font-family: 'Fraunces', serif; color:#ffd64a; font-size:40px; font-weight:900; margin-bottom:40px">
					Still have queries?
				</h2>
				<p style="font-size:25px; line-height:40px; margin-bottom: 50px;">
				leave us your query and we will get back to you soon.
				</p>
				<img src="<?php echo BASE_URL; ?>assets/uploads/file-23.png"  style="width:30%">


			</div>
			<div class="col-md-6" style="border: 2px solid white; border-radius:20px; padding:20px">

			<?php
// After form submit checking everything for email sending
if(isset($_POST['form_contact']))
{
	$error_message = '';
	$success_message = '';

	// $statement = $pdo->prepare("SELECT * FROM tbl_setting_email WHERE id=1");
	// $statement->execute();
	// $result = $statement->fetchAll();                           
	// foreach ($result as $row) {
	//     $send_email_from  = $row['send_email_from'];
	//     $receive_email_to = $row['receive_email_to'];
	//     $smtp_host        = $row['smtp_host'];
	//     $smtp_port        = $row['smtp_port'];
	//     $smtp_username    = $row['smtp_username'];
	//     $smtp_password    = $row['smtp_password'];
	// }

    $valid = 1;

    if(empty($_POST['full_name']))
    {
        $valid = 0;
        $error_message .= FULL_NAME_EMPTY_CHECK.'\n';
    }

    if(empty($_POST['phone']))
    {
        $valid = 0;
        $error_message .= PHONE_EMPTY_CHECK.'\n';
    }


    if(empty($_POST['email']))
    {
        $valid = 0;
        $error_message .= EMAIL_EMPTY_CHECK.'\n';
    }
    else
    {
    	// Email validation check
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message .= EMAIL_VALID_CHECK.'\n';
        }
    }

    if(empty($_POST['enroll']))
    {
        $valid = 0;
        $error_message .= COMMENT_EMPTY_CHECK.'\n';
    }

    if($valid == 1)
    {
		// getting auto increment id
        
        // $error_message .= COMMENT_EMPTY_CHECK.'\n';
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_register'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
		
		// $phoneNumber = $_POST['country_code'] . $_POST['phone'];
    	
		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_contactform (full_name, email,  phone,message) VALUES (?, ?, ?, ?)");
		$statement->execute(array($_POST['full_name'],$_POST['email'], $_POST['phone'], $_POST['message']));
		// echo "<script>alert('cdsvcfvf')</script>";
        $message            =  "New Entry from Feedback page.";
        $page = "<?php echo BASE_URL.'successstories.php' ?>";
        $active  = 1;
    
        // $statement = $pdo->prepare("INSERT INTO tbl_notification (message, page, active) VALUES (?, ?, ?)");
        // $statement->execute(array($message, $page, $active));


    	$success_message = 'Thank You For Your Valuable Feedback.';

    }
}
?>
				
				<?php
				if($error_message != '') {
					echo "<script>alert('".$error_message."')</script>";
				}
				if($success_message != '') {
					echo "<script>alert('".$success_message."')</script>";
				}
				?>

<!-- <?php echo BASE_URL.'success.php';  ?> -->
				<form action="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" class="form-horizontal cform-1" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="col-sm-12" >
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo FULL_NAME; ?>" name="full_name">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo EMAIL_ADDRESS; ?>" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="<?php echo PHONE_NUMBER; ?>" name="phone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="enroll" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" cols="30" rows="10" placeholder="<?php echo MESSAGE; ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
	                    <div class="col-sm-12" style="text-align:center">
	                        <input type="submit" value="<?php echo SEND_MESSAGE; ?>" class="btn btn-success" style="background-color:black !important; border-radius:30px; width:40%; border:2px solid #ffd64a !important" name="form_contact">
	                    </div>
	                </div>
				</form>
			</div>
			</div>
			
			
		</div>
	</div>
</section>
<?php endif; ?>



<?php if($page_layout == 'Photo Gallery Page Layout'): ?>
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

		


	</div>
	<!-- News Start -->
<section class="news-v1" style="background-color:#605f5e; margin-top:50px">
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
</section>
<?php endif; ?>





<?php if($page_layout == 'Video Gallery Page Layout'): ?>
<section class="gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<ul class="gallery-menu">
					<li class="filter" data-filter="all" data-role="button">All</li>
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_category_video WHERE status=?");
					$statement->execute(array('Active'));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						$temp_string = strtolower($row['v_category_name']);
    					$temp_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    					?>
    					<li class="filter" data-filter=".<?php echo $temp_slug; ?>" data-role="button"><?php echo $row['v_category_name']; ?></li>
						<?php
					}
					?>
				</ul>

				<div id="mix-container">
					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT
					                           	t1.video_id,
												t1.video_title,
												t1.video_iframe,
												t1.v_category_id,
												t2.v_category_id,
												t2.v_category_name,
												t2.status
					                            FROM tbl_video t1
					                            JOIN tbl_category_video t2
					                            ON t1.v_category_id = t2.v_category_id 
					                            ");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						$i++;
						$temp_string = strtolower($row['v_category_name']);
    					$temp_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
						?>
						<div class="col-md-4 mix <?php echo $temp_slug; ?> all" data-my-order="<?php echo $i; ?>">
							<div class="inner viframe">
								<?php echo $row['video_iframe']; ?>
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
<?php endif; ?>



<?php if($page_layout == 'Blog Page Layout'): ?>
<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				
				<!-- Blog Classic Start -->
				<div class="blog-grid">
					<div class="row">
						<div class="col-md-12">
							

							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
							$statement->execute();
							$total = $statement->rowCount();
							?>

							<?php if(!$total): ?>
							<p style="color:red;"><?php echo NEWS_EMPTY_CHECK; ?></p>
							<?php else: ?>




<?php
/* ===================== Pagination Code Starts ================== */
		$adjacents = 10;	
		
		$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
		$statement->execute();
		$total_pages = $statement->rowCount();
		
		$targetpage = $_SERVER['PHP_SELF'];
		$limit = 5;                                 
		$page = @$_GET['page'];
		if($page) 
			$start = ($page - 1) * $limit;          
		else
			$start = 0;	
		

		$statement = $pdo->prepare("SELECT
									t1.news_id,
								   t1.news_title,
		                           t1.news_slug,
		                           t1.news_content,
		                           t1.news_content_short,
		                           t1.news_date,
		                           t1.photo,
		                           t1.category_id,

		                           t2.category_id,
		                           t2.category_name,
		                           t2.category_slug
		                           FROM tbl_news t1
		                           JOIN tbl_category t2
		                           ON t1.category_id = t2.category_id 		                           
		                           ORDER BY t1.news_id 
		                           LIMIT $start, $limit");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		
		$s1 = $_REQUEST['slug'];
				
		if ($page == 0) $page = 1;                  
		$prev = $page - 1;                          
		$next = $page + 1;                          
		$lastpage = ceil($total_pages/$limit);      
		$lpm1 = $lastpage - 1;   
		$pagination = "";
		if($lastpage > 1)
		{   
			$pagination .= "<div class=\"pagination\">";
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?slug=$s1&page=$prev\">&#171; ".PREVIOUS."</a>";
			else
				$pagination.= "<span class=\"disabled\">&#171; ".PREVIOUS."</span>";    
			if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
			{   
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
			{
				if($page < 1 + ($adjacents * 2))        
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
				}
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
				}
				else
				{
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
					}
				}
			}
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?slug=$s1&page=$next\">".NEXT." &#187;</a>";
			else
				$pagination.= "<span class=\"disabled\">".NEXT." &#187;</span>";
			$pagination.= "</div>\n";       
		}
		/* ===================== Pagination Code Ends ================== */
		?>

							<?php
							foreach ($result as $row) {
								?>
								
								<div class="<?php if ($row['news_id'] % 2 == 0) { echo "post-item"; } else { echo "post-itemcolor"; } ?>">
								<!-- <?php echo $row['news_id']; ?> -->
									<!-- <div class="image-holder">
										<img class="img-responsive" src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['news_title']; ?>">
									</div> -->
									<div class="<?php if ($row['news_id'] % 2 == 0) { echo "blogflagdark"; } else { echo "blogflag"; } ?>">
										<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);  font-size: 13px; font-weight:900; font-family: 'Lora', serif;">
										<i class="fa fa-edit" ></i>
											HAPPY LEARNERS
										</div>
									</div>

									
									<div class="text">
										<div class="inner">
											<h3 ><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>" class="<?php if ($row['news_id'] % 2 == 0) { echo "blogheadingdark"; } else { echo "blogheading"; } ?>"><?php echo $row['news_title']; ?></a></h3>
											
											<p class="<?php if ($row['news_id'] % 2 == 0) { echo "blogpdark"; } else { echo "blogp"; } ?>">
												<?php echo $row['news_content_short']; ?>
											</p>
											<p class="button  ">
												<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>" class="<?php if ($row['news_id'] % 2 == 0) { echo "blogbuttondark"; } else { echo "blogbutton"; } ?>"><?php echo READ_MORE; ?></a>
											</p>
											<ul class="status">
												<!-- <li><i class="fa fa-tag"></i><?php echo CATEGORY_COLON; ?> <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li> -->
												<li class="<?php if ($row['news_id'] % 2 == 0) { echo "blogposteddark"; } else { echo "blogposted"; } ?>"><i class="fa fa-calendar"></i><?php echo POSTED_ON; ?> <?php echo $row['news_date']; ?></li>
											</ul>
										</div>
									</div>
								</div>
								<?php
							}
							?>							
							<?php endif; ?>

						</div>

						<div class="col-md-12">
							<?php if($total): ?>
							<?php echo $pagination; ?>
							<?php endif; ?>
						</div>

					</div>
				</div>
				<!-- Blog Classic End -->

			</div>
			<div class="col-md-3">
				
				<?php require_once('sidebar.php'); ?>
			
			</div>

			


		</div>
	</div>
</section>
<?php endif; ?>



<?php if($page_layout == 'Team Member Page Layout'): ?>
<section class="team-member-v3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<!-- Team Member Container Start -->
				<div class="team-member-inner">
					
					<?php
					$statement = $pdo->prepare("SELECT
												
												t1.id,
												t1.name,
												t1.slug,
												t1.designation_id,
												t1.photo,
												t1.degree,
												t1.detail,
												t1.facebook,
												t1.twitter,
												t1.linkedin,
												t1.youtube,
												t1.google_plus,
												t1.instagram,
												t1.flickr,
												t1.address,
												t1.practice_location,
												t1.phone, 
												t1.email,
												t1.website,
												t1.status,

												t2.designation_id,
												t2.designation_name
						
					                            FROM tbl_team_member t1
					                            JOIN tbl_designation t2
					                            ON t1.designation_id = t2.designation_id
					                            WHERE t1.status=?
					                            ");
					$statement->execute(array('Active'));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>
						<div class="col-md-3 item">
							<div class="inner">
								<div class="thumb">
									<div class="photo" style="background-image:url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
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
									<h4><?php echo $row['designation_name']; ?></h4>
									<p class="button">
										<a href="<?php echo BASE_URL.URL_TEAM.$row['slug']; ?>"><?php echo SEE_FULL_PROFILE; ?></a>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					
				</div>
				<!-- Team Member Container End -->

			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php require_once('footer.php'); ?>