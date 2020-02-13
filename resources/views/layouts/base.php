<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $this->e($title); ?></title>
</head>
<body>

<?php echo $this->section('content'); ?>


<?php $this->push('layout-scripts'); ?>
    <script type="text/javascript" src="/base.js"></script>
<?php $this->end(); ?>

<?php $this->push('layout-scripts'); ?>
    <?php echo $this->section('scripts'); ?>
<?php $this->end(); ?>

<?php echo $this->section('layout-scripts'); ?>

</body>
</html>
