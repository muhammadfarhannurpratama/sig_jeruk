<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php $this->load->view('backend_partials/head'); ?>
</head>

<body>
    <?php $this->load->view('backend_partials/navigasi'); ?>

    <?php $this->load->view($main_view); ?>


    <?php $this->load->view('backend_partials/footer'); ?>
    <?php $this->load->view('backend_partials/javascript'); ?>



</body>

</html>