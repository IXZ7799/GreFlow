<div class="my-4">
    <h5>Categories</h5>
    <span class="text-muted"><?=$totalCategories?> categories created.</span>
</div>

<?php foreach ($categories as $category): ?>
<div class="card container my-2 pt-2">
    <h5 class="card-title"><?=htmlspecialchars($category['categoryname'], ENT_QUOTES, 'UTF-8')?></h5>
    <div class="row p-2">
        <a class="btn btn-outline-primary col-sm-1 me-2" href="editcategories.php?id=<?=$category['id']?>">Edit</a>
    </div>
</div>
<?php endforeach;?>