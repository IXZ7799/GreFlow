<form action="" method="post">
	<input type="hidden" name="id" value="<?=$author['id'];?>">
	<label for="authorname">
		<h5 class="my-2">Type your author name here:</h5>
	</label>
	<textarea class="form-control my-2" id="authorname" name="authorname" rows="1" placeholder="Example: Batman"><?=$author['authorname']?></textarea>
	<label for="authoremail">
		<h5 class="my-2">Type your author email here:</h5>
	</label>

	<textarea class="form-control my-2" id="authoremail" name="authoremail" rows="1"
		placeholder="Example: joker@sucks.com"><?=$author['authoremail']?></textarea>
	<input type="submit" class="btn btn-outline-primary" name="submit" value="Save">
</form>