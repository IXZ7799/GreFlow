<form action="" method="post">
    <input type="hidden" name="questionid" value="<?=$question['id'];?>">
    <label for="question">
    <h5 class="my-2">Type your question here:</label></h5>
        <textarea class="form-control my-2" id="question" name="question"
            rows="1"><?=$question['question']?>
        </textarea>
        <input type="submit" class="btn btn-outline-primary" name="submit" value="Save">
</form>
