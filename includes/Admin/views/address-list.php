<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Address Book', 'wedevs-academy'); ?></h1>
    <?php
    if (isset($_GET['inserted'])) {
    ?>
        <div class="notice notice-success is-dismissible">
            <?php _e('Address has been added successfully!', 'wedevs-academy'); ?>
        </div>
    <?php
    }
    if (isset($_GET['address-deleted']) && $_GET['address-deleted'] == 'true') {
    ?>
        <div class="notice notice-success is-dismissible">
            <?php _e('Address has been deleted successfully!', 'wedevs-academy'); ?>
        </div>
    <?php
    }
    ?>
    <a href="<?php echo admin_url('admin.php?page=wedevs-academy&action=new'); ?>" class="page-title-action"><?php _e('Add New', 'wedevs-academy'); ?></a>

    <form action="" method="post">
        <?php
        $table = new \WeDevs\Academy\Admin\Address_List();
        $table->prepare_items();
        $table->display();
        ?>
    </form>
</div>