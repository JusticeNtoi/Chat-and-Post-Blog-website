<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: index.php");
    }
?>

<?php include_once "header.php"; ?>

<body class="body2">
    <div class="sections-container">
		<section class="section1">
			<div class="nav-bar">
				<?php include "navigation.php"; ?>
			</div>
		</section>
		
		<section class="section2">
			<div class="profile-wrapper">
				<section class="profile-setting">

					<?php
						include_once "php/config.php";
						$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
						if(mysqli_num_rows($sql) > 0) {
							$row = mysqli_fetch_assoc($sql);
						}
					?>

					<div class="profile" >
						<form action="" enctype="multipart/form-data">
							<div class="error-txt"></div>

							<div class="profile-back">
								<label>
									<img src="php/images/<?php echo $row['img'] ?>" class="profile-picture" >
									<input id="inputImage" onchange="display_image(this.files[0])" type="file" name="image"  class="picture-input" disabled>

									<script>
										
										function display_image(file)
										{
											let allowed = ['image/jpeg','image/png','image/webp','image/jpg','image/gif','image/heif','image/svg'];

											if(!allowed.includes(file.type)){
												alert("This file type is not allowed!");
												return;
											}
											let img = document.querySelector(".profile-picture");
											img.src = URL.createObjectURL(file);
										}
									</script>

								</label>
							</div>
							<div class="profile-details" >
								<div class="profile-fullnames" >
									<label class="profle-labels"  >
										First Name:
									</label>
									<input id="inputfield1" placeholder="first name" type="text" name="first_name" class="profile-input" value="<?php echo $row['first_name']?>" readonly>
									<label class="profle-labels"  >
										Last Name:
									</label>
									<input id="inputfield2" placeholder="last name" type="text" name="last_name" class="profile-input" value="<?php echo $row['last_name']?>" readonly>
								</div>
								<div class="profile-info" >
									<label class="profle-labels"  >
										Email:
									</label>
									<input id="inputfield3" placeholder="Email" type="text" name="email" class="profile-input" value="<?php echo $row['email']?>" readonly>
								</div>
								<div class="profile-info" >
									<label class="profle-labels"  >
										Password:
									</label>
									<input id="inputfield4" placeholder="password" type="password" name="password"  class="profile-input" value="<?php echo $row['password']?>" readonly>
								</div>
								<div class="profile-buttons" >
									<input class="profile-save" type="submit" value="Save">
									<button class="profile-edit">Edit</button>
										
								</div>
							</div>

						</form>	
					</div>
				</section>
			</div>
		</section>
	</div>


    <script src="js/edit-profile.js"></script>
	<script src="js/profile-save.js"></script>
</body>
</html>