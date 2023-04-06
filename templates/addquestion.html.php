<form action="" method="post">
    <label for="question">
        <h5 class="my-2">Type your question here:</h5>
    </label>
    <br>
    <textarea class="form-control my-2" id="question" name="question" rows="3" cols="40"
        placeholder="Example: What does the integral of x refer to?" required maxlength="500"></textarea>

    <div class="row justify-content-between">
        <div class="col-sm-6 row">
            <div class="col">
                <select class="form-select" name="authors">
                    <option value="">Select an author</option>
                    <?php foreach ($authors as $author): ?>
                    <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?=htmlspecialchars($author['authorname'], ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col"><select class="form-select" name="categories">
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?=htmlspecialchars($category['categoryname'], ENT_QUOTES, 'UTF-8');?>
                    </option>
                    <?php endforeach;?>
                </select></div>
        </div>
        <div class="col align-items-end">
            <input type="submit" class="btn btn-outline-primary" value="Submit">
        </div>
    </div>
</form>