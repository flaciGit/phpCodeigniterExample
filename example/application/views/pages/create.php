<div class="form-wrapper">
	<form id="createform" method="post" action="users/createuser">

		<div class="row">
			<label for="name">Name (this is a front end validationless input)</label>
			<input name="name" type="text"/>
		</div>
		<div class="row">
			<label for="username">Username</label>
			<input name="username" type="text"/>
		</div>
		<div class="row">
			<label for="email">E-mail</label>
			<input name="email" type="email"/>
		</div>
		<div class="row">
			<label for="password">Password</label>
			<input name="password" type="password"/>
		</div>
		<div class="row">
			<label for="intro">Introduction</label>
			<textarea name="intro"></textarea>
		</div>

		<div class="row">
			<input class="btn btn-danger" type="reset" value="Reset"/>
		</div>
		<div class="row">
			<input class="btn btn-success" type="submit" value="Submit"/>
		</div>
	</form>
</div>