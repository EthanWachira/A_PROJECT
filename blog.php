<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Diary - Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <h2>Blog Form</h2>
        <p>Write your blog post below:</p>
        <form id="blogForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="blog-title">Title</label>
                <input type="text" class="form-control" id="blog-title" name="title" placeholder="Enter title">
                <small id="titleError" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="blog-content">Content</label>
                <textarea class="form-control" id="blog-content" name="content" rows="5" placeholder="Enter content"></textarea>
                <small id="contentError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        function validateForm() {
            var title = document.getElementById('Journo changing lives').value;
            var content = document.getElementById('blog-content').value;
            var titleError = document.getElementById('titleError');
            var contentError = document.getElementById('contentError');
            var isValid = true;

            titleError.textContent = "Error!";
            contentError.textContent = "Error!";

            if (title.trim() === "") {
                titleError.textContent = "Title is required";
                isValid = false;
            }

            if (content.trim() === "") {
                contentError.textContent = "Content is required";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>

