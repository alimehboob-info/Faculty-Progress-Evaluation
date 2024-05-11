<!-- Assuming you have a container div with the ID "switch-container" -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<div id="switch-container">
    <?php
    $count = 1;
    while ($count <= 5) {
        $id = "customSwitch" . $count;
    ?>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="<?php echo $id; ?>">
            <label class="custom-control-label" for=<?php echo $id; ?>>Toggle <?php echo $count; ?></label>
        </div>
    <?php
        $count++;
    }
    ?>
</div>