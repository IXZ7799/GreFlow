<div class="my-4">
	<h5>Questions</h5>
	<span class="text-muted"><?=$totalquestions?> questions submitted.</span>
</div>

<?php foreach ($questions as $question): ?>
<div class="card container my-2">
	<p>
	<h5 class="card-title"><?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8')?></h5>
	<span class="card-subtitle text-muted"><?=htmlspecialchars($question['categoryname'], ENT_QUOTES, 'UTF-8')?></span>
	<span class="card-text">by <a
			href="mailto:<?=htmlspecialchars($question['authoremail'], ENT_QUOTES, 'UTF-8');?>"><?=htmlspecialchars($question['authorname'], ENT_QUOTES, 'UTF-8');?></a></span>
	</p>
</div>
<?php endforeach;?>