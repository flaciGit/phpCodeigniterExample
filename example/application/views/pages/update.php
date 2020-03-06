<div class="form-wrapper">
	<form id="updateform" method="POST" action="<?php echo base_url() . 'users/updateuser/' . $userToUpdate['id'] ?>">

		<div class="row">
			<label for="name">Name</label>
			<input name="name" type="text" value="<?php echo $userToUpdate['name'];?>"/>
		</div>
		<div class="row">
			<label for="username">Username</label>
			<input name="username" type="text" value="<?php echo $userToUpdate['username'];?>"/>
		</div>
		<div class="row">
			<label for="email">E-mail</label>
			<input name="email" type="email" value="<?php echo $userToUpdate['email'];?>"/>
		</div>
		<div class="row">
			<label for="password">Password</label>
			<input name="password" type="password"/>
		</div>
		<div class="row">
			<label for="intro">Introduction</label>
			<textarea name="intro"><?php echo $userToUpdate['intro'];?></textarea>
		</div>

		<div class="row">
			<input type="submit" value="Submit"/>
			<!-- <input id="submit_create" type="button" value="Submit with ajax"/>
		-->
		</div>

	</form>
</div>



