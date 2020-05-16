<?php require_once 'view-comp/header.php'; ?>
<div class="card-header">
    Search Book
</div>
<div class="card-body">
    <form action="results.php" method="POST">
        <div class="form-group">
            <label for="searchType">Choose Search Type</label>
            <select class="form-control" name="searchType" id="searchType">
                <option value="author">Author</option>
                <option value="title">Title</option>
                <option value="isbn">ISBN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="searchTerm">Search Term</label>
            <input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Search Term" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</div>
<?php require_once 'view-comp/footer.php' ?>