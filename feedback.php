<?php include './include/header.php' ?>

<?php 
    $sql = 'SELECT * FROM feedback';
    $result = mysqli_query($connect, $sql);
    
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);    
    ?>

    <h1 class="mt-5">Feedback</h1>

    <?php if(empty($feedback)): ?>
        <p class="lead">Feedback is empty</p>
    <?php endif; ?>

    <?php foreach($feedback as $item): ?>
        <div
            class="w-75 border shadow p-3 mt-4  text-center"
            style="min-height: 13rem; padding: 10rem;">
            <p class="fs-5"><?php echo $item['body'] ?></p>
            <p class="lead">
                by <?php echo $item['name'] ?>
                on <?php echo $item['date'] ?>
            </p>
        </div>
    <?php endforeach; ?>
    
<?php include './include/footer.php' ?>
