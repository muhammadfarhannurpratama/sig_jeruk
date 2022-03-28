<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php $this->load->view('frontend_partials/_head'); ?>
</head>

<body>
<?php $this->load->view('frontend_partials/_navigation'); ?>

<div class="container-fluid">
    <?php $this->load->view($main_view); ?>
</div>

<?php $this->load->view('frontend_partials/_footer'); ?>
<?php $this->load->view('frontend_partials/_javascript'); ?>

</body>
</html>