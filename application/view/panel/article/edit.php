<?php $this->include("panel.layouts.header"); ?>

<form action="<?= $this->url('article/update/' . $article['id']) ?>" method="POST">
    <section class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $article['title'] ?>">
    </section>
    <section class="form-group">
        <label for="cat_id">Category</label>
        <select class="form-control" id="cat_id" name="cat_id">
            <?php foreach($categories as $category) {?>
            <option value="<?= $category['id'] ?>" <?php if($category['id'] ==$article['cat_id']) echo 'selected';?>><?= $category['name'] ?></option>
            <?php }?>
        </select>
    </section>
    <section class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" rows="5" name="body"><?= $article['body'] ?></textarea>
    </section>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php $this->include("panel.layouts.footer"); ?>