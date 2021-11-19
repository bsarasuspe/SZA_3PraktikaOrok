<!DOCTYPE html>
<html>
<script>
    <?php
        session_start();
        session_destroy();
        header("location: index.php");
    ?>
</script>
 </html>