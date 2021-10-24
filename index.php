<?php
    include_once 'includes/header.php';
?>
<section>
    <?php include_once 'includes/message.php'; ?>
    <div class="form">
        <form action="includes/login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="r-field" name="username" autofocus>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="r-field" name="password">
            </div>
            <button type="submit" class="r-btn">Login</button>
            <a href="signup.php" class="r-btn">Sign Up</a>
        </form>
    </div>
</section>
<?php
    include_once 'includes/footer.php';
?>