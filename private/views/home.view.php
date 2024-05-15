<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<style>
	h1{
		font-size: 80px;
		color: purple;
	}

	a{
		text-decoration: none;
	}

	.card-header{
		font-weight: bold;
	}

	.card{
		min-width: 250px;
	}
</style>
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	 
	 	<div class="row justify-content-center ">

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/users">
		 			<div class="card-header">STAFF</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-chalkboard-teacher"></i>
		 			</h1>
		 			<div class="card-footer">View all staff members</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/students">
		 			<div class="card-header">STUDENTS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-user-graduate"></i>
		 			</h1>
		 			<div class="card-footer">View all students</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/courses">
		 			<div class="card-header">courses</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-university"></i>
		 			</h1>
		 			<div class="card-footer">View all courses</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/tests">
		 			<div class="card-header">TESTS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-file-signature"></i>
		 			</h1>
		 			<div class="card-footer">View all tests</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/statistics">
		 			<div class="card-header">STATISTICS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-chart-pie"></i>
		 			</h1>
		 			<div class="card-footer">View student statistics</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/settings">
		 			<div class="card-header">SETTINGS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-cogs"></i>
		 			</h1>
		 			<div class="card-footer">View app settings</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/profile">
		 			<div class="card-header">PROFILE</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-id-card"></i>
		 			</h1>
		 			<div class="card-footer">View your profile</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/logout">
		 			<div class="card-header">LOGOUT</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-sign-out-alt"></i>
		 			</h1>
		 			<div class="card-footer">Logout from the system</div>
	 				</a>
		 		</div>

	 	</div>
	</div>
 
<?php $this->view('includes/footer')?>