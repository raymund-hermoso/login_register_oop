<?php
    include_once 'includes/header.php';
?>
<section>
    <?php include_once 'includes/message.php'; ?>
    <div class="form">
        <form action="includes/signup_process.php" method="post">
            <div class="form-group">
                <label for="firsname">Firstname</label>
                <input type="text" class="r-field" name="firstname" value="<?php echo isset($_GET['firstname']) ? $_GET['firstname'] : ""; ?>" autofocus>
            </div>
            <div class="form-group">
                <label for="middlename">Middlename</label>
                <input type="text" class="r-field" name="middlename" value="<?php echo isset($_GET['middlename']) ? $_GET['middlename'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="r-field" name="lastname" value="<?php echo isset($_GET['lastname']) ? $_GET['lastname'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="r-field" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="r-field" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="r-field" name="password">
            </div>
            <div class="form-group">
                <label for="Password">Repeat Password</label>
                <input type="password" class="r-field" name="passwordRpt">
            </div>
            <button type="submit" class="r-btn" name="submit">Signup</button>
            <a href="index.php" class="r-btn">Login</a>
        </form>
    </div>
</section>
<?php
    include_once 'includes/footer.php';
?>