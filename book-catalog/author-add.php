<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    Add Author
</div>
<div class="card-body">
    <form action="process-author-add.php" method="POST">
        <div class="form-group">
            <label for="authorName">Author Name</label>
            <input type="text" name="authorName" id="authorName" class="form-control" placeholder="Author Name" required />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</div>
<?php require_once 'view-comp/footer.php' ?>