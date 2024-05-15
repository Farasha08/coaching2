<?php 		$this->view('includes/header');?>

	<div class="container-fluid">
		<form method = "post">
		<div class="p-3 mx-auto shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<h2 class="text-center">LearnEase</h2>
			<br>
			<h3>Add user</h3>

			<?php if(count($errors) > 0):?>
			<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
  				<strong>Error</strong>
  				<?php foreach($errors as $error):?>
  					<br><?=$error?>
  				<?php endforeach;?>
  				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
  				</button>
			</div>
			<?php endif;?>


			<input class="my-2 form-control" value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="First name" >
			<input class="my-2 form-control" value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Last name" >
			<input class="my-2 form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus>

 			<select class="my-2 form-control" name="gender">
 				<option <?=get_select('position','')?> value="">--Select your gender--</option>
 				<option <?=get_select('gender','male')?> value="male">Male</option>
 				<option <?=get_select('gender','female')?> value="female">Female</option>

 			</select>

 			<?php if($mode == 'students'):?>
 				<input type="hidden" value="student" name="position">
 			<?php else:?>

	 			<select class="my-2 form-control" name="position">
	 				<option <?=get_select('position','')?> value="">--Select your Position--</option>
	 				<option <?=get_select('position','student')?> value="student">Student</option>
	 				<option <?=get_select('position','lecturer')?> value="lecturer">Lecturer</option>
	 				<option <?=get_select('position','admin')?> value="admin">Admin</option>


	 			</select>
 			<?php endif;?>

			<input class="my-2 form-control"  value="<?=get_var('password')?>" type="text" name="password" placeholder="Password" >
			<input class="my-2 form-control"  value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password" >
			<br>
			<button class="btn btn-info float-end" >Add user</button>

			<?php if($mode == 'students'):?>
			<a href="<?=ROOT?>/users">
				<button type="button" class="btn btn-danger">Cancel</button>
			</a>
			<?php else:?>

			<a href="<?=ROOT?>/users">
				<button type="button" class="btn btn-danger">Cancel</button>
			</a>
			<?php endif;?>


		</div>
		</form>
	</div>	
<?php 		$this->view('includes/footer');?>

