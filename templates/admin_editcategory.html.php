<form action="" method="post">
    <input type="hidden" name="categoryid" value="<?=$category['id'];?>">
    <label for="categoryname">
        <h5 class="my-2">Type your category name here:</5>
    </label>
    <textarea class="form-control my-2" id="categoryname" name="categoryname" rows="1"><?=$category['categoryname']?></textarea>
    <input type="submit" class="btn btn-outline-primary" name="submit" value="Save">
</form>