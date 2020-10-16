<!doctype html>
<html lang="en">
<head>
    <title>Guest Book</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <header class="text-center py-5">
        <h1 >Welcome to my site</h1>
    </header>

    <section>
        <h2  class="pb-3">Recent articles</h2>
        <form method="post" action="index.php">
            <p>Number of article you want to be display : <input type="text" name="articles_number"></p>
            <p><input type="submit" class="btn btn-primary" name="articles" value="Submit"></p>
        </form>

        <?php for ($i = 0; $i <$numberArticles; $i++): ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $reversePosts[$i]['title'] ?></h3>
                    <h4 class="card-subtitle mb-2 text-muted"> Author
                        : <?php echo $reversePosts[$i]['user'] ?> </h4>
                    <p class="card-text"><?php echo $reversePosts[$i]['content'] ?></p>
                </div>
                <div class="card-footer">
                    <?php echo $reversePosts[$i]['date']->format('Y-m-d'); ?>
                </div>
            </div>
        <?php endfor; ?>
    </section>
    <section class="py-5">
        <h2 class="pb-3">Give your opinion : </h2>

        <?php if (!empty ($alert)) {
            echo '<div class="alert alert-danger" role="alert">' . $alert . '</div>';
        } ?>

        <form method="post" action="index.php">
            <p>Title : <input type="text" name="title"/></p>
            <!-- <p>Date : <input type="date" name="date"/></p> -->
            <p> Comment: <br>
                <textarea name="content" rows="5" cols="40"></textarea></p>
            <p>Name: <input type="text" name="user"></p>
            <p><input type="submit" class="btn btn-primary" name="submit" value="Submit"></p>
        </form>
    </section>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>