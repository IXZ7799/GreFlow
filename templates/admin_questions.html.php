<div class="my-4">
    <h5>Questions</h5>
    <span class="text-muted"><?=$totalquestions?> questions submitted.</span>
</div>

<?php foreach ($questions as $question): ?>
<div class="card container my-2 pt-2">
    <h5 class="card-title"><?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8')?></h5>
    <div class="row p-2">
        <a class="btn btn-primary col-sm-1 me-2" href="editquestion.php?id=<?=$question['id']?>">Edit</a>
        <form class="px-0 col-sm-1" action="deletequestion.php" method="post">
            <input type="hidden" name="id" value="<?=$question['id']?>">
            <input class="btn btn-danger col-12" type="submit" value="Delete">
        </form>
    </div>
</div>
<?php endforeach;?>