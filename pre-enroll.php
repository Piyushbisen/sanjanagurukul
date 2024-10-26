<?php require_once('header.php'); ?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/file-11.png)">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text aboutus-banner-text">
					<h2 style="color: #ffd64a !important;">Sanjana Gurukul -                     </h2>
                    <h2 >Pre-enrollment form</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->



<section class="contact-v1" style="background-color:black" id="registerform">
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
			
			<div class="col-md-12" style="border: 2px solid white; border-radius:20px; padding:50px">

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

    if(empty($_POST['goal']))
    {
        $valid = 0;
        $error_message .= GOAL_FOR_LEARNING_EMPTY_CHECK.'\n';
    }


    if(empty($_POST['grade']))
    {
        $valid = 0;
        $error_message .= GRADE_EMPTY_CHECK.'\n';
    }
    

    if(empty($_POST['dob']))
    {
        $valid = 0;
        $error_message .= DOB_EMPTY_CHECK.'\n';
    }

    if(empty($_POST['timeslot']))
    {
        $valid = 0;
        $error_message .= 'time slot wont be empty';
    }

    if(empty($_POST['dayslot']))
    {
        $valid = 0;
        $error_message .= 'day slot wont be empty';
    }

    

    if($valid == 1)
    {
		// getting auto increment id
        
        // $error_message .= COMMENT_EMPTY_CHECK.'\n';
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_pre_enroll'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
		
		// $phoneNumber = $_POST['country_code'] . $_POST['phone'];
    	
		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_pre_enroll (full_name, goal, grade,dob, place, timeslot, dayslot) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$statement->execute(array($_POST['full_name'],$_POST['goal'], $_POST['grade'], $_POST['dob'], $_POST['place'],$_POST['timeslot'],$_POST['dayslot']));
		// echo "<script>alert('cdsvcfvf')</script>";
        $message            =  "New Entry from Feedback page.";
        $page = "<?php echo BASE_URL.'successstories.php' ?>";
        $active  = 1;
    
        // $statement = $pdo->prepare("INSERT INTO tbl_notification (message, page, active) VALUES (?, ?, ?)");
        // $statement->execute(array($message, $page, $active));


    	$success_message = 'Thank You For Your Response we will contact you soon.';

    }
}
?>
				
				<?php
				if($error_message != '') {
					echo "<script>alert('".$error_message."')</script>";
				}
				if($success_message != '') {
					echo "<script>alert('thank you for sharing your details. We will get back to you soon.')</script>";
				}
				?>

<!-- <?php echo BASE_URL.'success.php';  ?> -->
				<form action="<?php echo BASE_URL.'pre-enroll.php' ?>" class="form-horizontal cform-1" method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="col-sm-12" >
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="Name of the student  (Who wants to learn Hindi?)" name="full_name">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="What is the main goal for learning Hindi?" name="goal">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="Student’s Grade/ Work Experience:" name="grade">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="Date of Birth of student:" name="dob"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="Place/ Location of student:" name="place"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="What time slots are you looking for to attend the classes?" name="timeslot"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" style="background-color:#605f5e; border-radius:10px; border:none; color:white !important;" class="form-control" placeholder="Which day(s) do you want to attend the classes?" name="dayslot"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" >
                            <input type="checkbox" name="terms" required>
                            <label for="terms" style="color: white;">By clicking "Download," you agree to our [Terms of Service] and [Privacy Policy].</label>
                        </div>
                    </div>
                    <div class="form-group">
	                    <div class="col-sm-12" style="text-align:center">
	                        <input type="submit" value="<?php echo "Submit" ?>" class="btn btn-success" style="background-color:black !important; border-radius:30px; width:40%; border:2px solid #ffd64a !important" name="form_contact">
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




<?php require_once('footer.php'); ?>