<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Edit Address', 'wedevs-academy'); ?></h1>
    <?php
    if (isset($_GET['address-update'])) {
    ?>
        <div class="notice notice-success is-dismissible">
            <?php _e('Address has been updated successfully!', 'wedevs-academy'); ?>
        </div>
    <?php
    }
    ?>
    <form action="" method="POST">
        <table class="form-table">
            <tbody>
                <tr class="row<?php echo $this->has_error('name') ? ' form-invalid' : ''; ?>">
                    <th scope="row">
                        <label for="name"><?php _e('Name:', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr($address->name); ?>">
                        <?php
                        if ($this->has_error('name')) {
                        ?>
                            <p class="description error"><?php echo esc_html($this->get_error('name')); ?></p>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e('Address:', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <textarea name="address" id="address" class="regular-text"><?php echo esc_textarea($address->address); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e('Phone:', 'wedevs-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr($address->phone); ?>">
                        <?php
                        if ($this->has_error('phone')) {
                        ?>
                            <p class="description error"><?php echo esc_html($this->get_error('phone')); ?></p>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="id" value="<?php echo esc_attr($address->id); ?>">
        <?php wp_nonce_field('new-address'); ?>
        <?php submit_button(__('Update Address', 'wedevs-academy'), 'primary', 'submit_address'); ?>
    </form>
</div>