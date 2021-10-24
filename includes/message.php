<?php
    if(isset($_SESSION['msg'])){
?>
        <div class="message">
            <span><?php echo $_SESSION['msg']; ?></span>
        </div>
<?php
        unset($_SESSION['msg']);
    }