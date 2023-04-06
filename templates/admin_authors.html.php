<div class="my-4">
    <h5>Authors</h5>
    <span class="text-muted"><?=$totalAuthors?> authors created.</span>
</div>

<?php foreach ($authors as $author): ?>
<div class="card container my-2 pt-2">
    <h5 class="card-title"><?=htmlspecialchars($author['authorname'], ENT_QUOTES, 'UTF-8')?></h5>
    <span class="card-text"><?=htmlspecialchars($author['authoremail'], ENT_QUOTES, 'UTF-8')?>
        <div class="row p-2">
            <a class="btn btn-primary col-sm-1 me-2" href="editauthors.php?id=<?=$author['id']?>">Edit</a>
            <form class="px-0 col-sm-1" action="deleteauthor.php" method="post">
                <input type="hidden" name="authorid" value="<?=$author['id']?>">
                <input class="btn btn-danger col-12" type="submit" value="Delete">
            </form>
        </div>
    </span>
</div>
<?php endforeach;?>