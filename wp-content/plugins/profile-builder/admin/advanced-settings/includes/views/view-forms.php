<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
    $settings = get_option( 'wppb_toolbox_forms_settings' );
?>

<form method="post" action="options.php">

    <?php settings_fields( 'wppb_toolbox_forms_settings' ); ?>

    <table class="form-table">

        <tr>
            <th><?php _e( 'Enable Placeholder Labels', 'profile-builder' ); ?></th>

            <td>
                <input type="hidden" name="wppb_toolbox_forms_settings[placeholder-labels]" value="">
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[placeholder-labels]"<?php echo ( ( isset( $settings['placeholder-labels'] ) && ( $settings['placeholder-labels'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'Replace Labels with Placeholders in Profile Builder forms.', 'profile-builder' ); ?></li>
                </ul>
            </td>
        </tr>

        <tr>
            <th><?php _e( 'Allow or deny email domains from registering', 'profile-builder' ); ?></th>

            <td>
                <ul class="wppb-toolbox-list">
                    <li>
                        <label>
                            <input type="checkbox" name="wppb_toolbox_forms_settings[restricted-email-domains]"<?php echo ( ( isset( $settings['restricted-email-domains'] ) && ( $settings['restricted-email-domains'] == 'on' ) ) ? ' checked' : '' ); ?> value="on" class="wppb-toolbox-switch">
                            <?php _e( 'On', 'profile-builder' ); ?>
                        </label>
                    </li>
                </ul>

                <div class="wppb-toolbox-accordion">
                    <ul class="wppb-toolbox-list">
                        <li class="toolbox-label">
                            <strong><?php _e( 'Type:', 'profile-builder' ); ?></strong>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="wppb_toolbox_forms_settings[restricted-email-domains-type]"<?php echo ( ( isset( $settings['restricted-email-domains-type'] ) && ( $settings['restricted-email-domains-type'] == 'allow' ) ) ? ' checked' : '' ); ?> value="allow">
                                <?php _e( 'Allow', 'profile-builder' ); ?>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="wppb_toolbox_forms_settings[restricted-email-domains-type]"<?php echo ( ( isset( $settings['restricted-email-domains-type'] ) && ( $settings['restricted-email-domains-type'] == 'deny' ) ) ? ' checked' : '' ); ?> value="deny">
                                <?php _e( 'Deny', 'profile-builder' ); ?>
                            </label>
                        </li>
                    </ul>

                    <ul class="wppb-toolbox-list">
                        <li class="toolbox-label">
                            <strong><?php _e( 'Restricted domains:', 'profile-builder' ); ?></strong>
                        </li>
                        <li class="toolbox-select2-container">
                            <select id="toolbox-restricted-emails" class="wppb-select" name="wppb_toolbox_forms_settings[restricted-email-domains-data][]" multiple="multiple">

                                <?php
                                if ( !empty( $settings['restricted-email-domains-data'] ) ) {
                                    foreach( $settings['restricted-email-domains-data'] as $domain ) {
                                        echo '<option value="'.$domain.'" selected>'.$domain.'</option>';
                                    }
                                }
                                ?>

                            </select>
                        </li>
                    </ul>

                    <ul class="wppb-toolbox-list">
                        <li class="toolbox-label">
                            <strong><?php _e( 'Error message:', 'profile-builder' ); ?></strong>
                        </li>
                        <li id="toolbox-restricted-email-domains-message">
                            <input type="text" name="wppb_toolbox_forms_settings[restricted-email-domains-message]" value="<?php echo ( !empty( $settings['restricted-email-domains-message']) ? $settings['restricted-email-domains-message'] : '' ); ?>">
                        </li>
                    </ul>

                </div>

                <ul>
                    <li class="description">
                        <?php _e( 'This option lets you allow registrations only from certain domains or deny registrations from certain domains.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'You should add only the domain in the list from above. eg.: gmail.com', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

        <?php
        $wppb_module_settings = get_option( 'wppb_module_settings' );

        if ( $wppb_module_settings != false && isset( $wppb_module_settings['wppb_multipleRegistrationForms']) && $wppb_module_settings['wppb_multipleRegistrationForms'] == 'show' ) :
        ?>
            <tr>
                <th scope="row"><?php _e( 'Forms that should bypass Email Confirmation', 'profile-builder' ); ?></th>

                <td>
                    <label>
                        <select id="toolbox-bypass-ec" class="wppb-select" name="wppb_toolbox_forms_settings[ec-bypass][]" multiple="multiple">

                            <?php
                            $registration_forms = get_posts( array( 'post_type' => 'wppb-rf-cpt' ) );

                            if ( !empty( $registration_forms ) ) {
                                foreach ( $registration_forms as $form ) {
                                    $form_slug = trim( Wordpress_Creation_Kit_PB::wck_generate_slug( $form->post_title ) );

                                    ?>
                                        <option value="<?php echo $form_slug; ?>" <?php echo ( ( isset( $settings['ec-bypass'] ) && in_array( $form_slug, $settings['ec-bypass'] ) ) ? 'selected' : '' ); ?>>
                                            <?php echo $form->post_title; ?>
                                        </option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </label>

                    <ul>
                        <li class="description">
                            <?php _e( 'Users registering through any of the selected forms will not need to confirm their email address.', 'profile-builder' ); ?>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>

        <?php if ( is_plugin_active( 'pb-add-on-social-connect/index.php' ) ) : ?>
            <tr>
                <th><?php _e( 'Disable Email Confirmation for Social Connect registrations', 'profile-builder' ); ?></th>

                <td>
                    <label><input type="checkbox" name="wppb_toolbox_forms_settings[social-connect-bypass-ec]"<?php echo ( ( isset( $settings['social-connect-bypass-ec'] ) && ( $settings['social-connect-bypass-ec'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                        <?php _e( 'Yes', 'profile-builder' ); ?>
                    </label>

                    <ul>
                        <li class="description">
                            <?php _e( 'If checked, will allow users that register through the Social Connect add-on to bypass the Email Confirmation feature.', 'profile-builder' ); ?>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>
        
        <tr>
            <th><?php _e( 'Remember me checked by default', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[remember-me]"<?php echo ( ( isset( $settings['remember-me'] ) && ( $settings['remember-me'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'Check the \'Remember Me\' checkbox on Login forms, by default.', 'profile-builder' ); ?></li>
                </ul>
            </td>
        </tr>

        <tr>
            <th><?php _e( 'Remove validation from back-end profile page', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[back-end-validation]"<?php echo ( ( isset( $settings['back-end-validation'] ) && ( $settings['back-end-validation'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'When saving the back-end user profile, Profile Builder fields will not be validated anymore. eg.: bypass required attribute', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

        <?php
            $users = count_users();

            if ( $users['total_users'] >= 5000 ) : ?>
                <tr>
                    <th><?php _e( 'Always show edit other users dropdown', 'profile-builder' ); ?></th>

                    <td>
                        <label><input type="checkbox" name="wppb_toolbox_forms_settings[edit-other-users-limit]"<?php echo ( ( isset( $settings['edit-other-users-limit'] ) && ( $settings['edit-other-users-limit'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                            <?php _e( 'Yes', 'profile-builder' ); ?>
                        </label>

                        <ul>
                            <li class="description">
                                <?php _e( 'For perfomance reasons, we disable the select if you have more than 5000 users on your website. This option lets you enable it again.', 'profile-builder' ); ?>
                            </li>
                        </ul>
                    </td>
                </tr>
        <?php endif; ?>

        <tr>
            <th><?php _e( 'Consider \'Anyone can Register\' WordPress option', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[users-can-register]"<?php echo ( ( isset( $settings['users-can-register'] ) && ( $settings['users-can-register'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php
                            $general_settings_url = '<a href="'. admin_url( 'options-general.php' ) .'" target="_blank">' . __( 'setting', 'profile-builder' ) . '</a>';

                            printf( __( 'By default, Profile Builder ignores this %1$s. If you check this option, our registration form will consider it.', 'profile-builder' ), $general_settings_url );
                        ?>
                    </li>
                </ul>
            </td>
        </tr>

        <tr>
            <th><?php _e( 'Modify default Redirect Delay timer', 'profile-builder' ); ?></th>

            <td>
                <input type="text" name="wppb_toolbox_forms_settings[redirect-delay-timer]" value="<?php echo ( ( !empty( $settings['redirect-delay-timer'] ) || ( isset( $settings['redirect-delay-timer'] ) && $settings['redirect-delay-timer'] == 0 ) ) ? $settings['redirect-delay-timer'] : '' ); ?>">

                <ul>
                    <li class="description">
                        <?php _e( 'This allows you to change the amount of seconds it takes for the <strong>\'After Registration\'</strong> redirect to happen.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'The default is 3 seconds. Leave empty if you do not want to change it.', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

        <?php if ( file_exists( WPPB_PLUGIN_DIR.'/features/admin-approval/admin-approval.php' ) ) : ?>
            <tr>
                <th><?php _e( 'Save Admin Approval status in usermeta', 'profile-builder' ); ?></th>

                <td>
                    <label><input type="checkbox" name="wppb_toolbox_forms_settings[save-admin-approval-status]"<?php echo ( ( isset( $settings['save-admin-approval-status'] ) && ( $settings['save-admin-approval-status'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                        <?php _e( 'Yes', 'profile-builder' ); ?>
                    </label>

                    <ul>
                        <li class="description">
                            <?php _e( 'By default, the Admin Approval status is saved as a custom taxonomy that is attached to the user.', 'profile-builder' ); ?>
                        </li>
                        <li class="description">
                            <?php _e( 'If you check this option, the status will also be saved in the \'*_usermeta\' table under the <strong>wppb_approval_status</strong> meta name.', 'profile-builder' ); ?>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>

        <?php if ( file_exists( WPPB_PLUGIN_DIR.'/features/admin-approval/admin-approval.php' ) ) : ?>
            <tr>
                <th><?php _e( 'Redirect \'/author\' page if user is not approved', 'profile-builder' ); ?></th>

                <td>
                    <label><input type="checkbox" name="wppb_toolbox_forms_settings[redirect-author-page]"<?php echo ( ( isset( $settings['redirect-author-page'] ) && ( $settings['redirect-author-page'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                        <?php _e( 'Yes', 'profile-builder' ); ?>
                    </label>

                    <ul>
                        <li class="description">
                            <?php _e( 'By default, users placed in Admin Approval will not be able to login, but the Author pages will be accessible.', 'profile-builder' ); ?>
                        </li>
                        <li class="description">
                            <?php _e( 'Using this option you can redirect these pages, sending users who try to access them to your home page.', 'profile-builder' ); ?>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>

        <tr>
            <th><?php _e( 'Save \'Last Login\' date in usermeta', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[save-last-login]"<?php echo ( ( isset( $settings['save-last-login'] ) && ( $settings['save-last-login'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'By checking this option, each time a user logins, the date and time will be saved in the database.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'The meta name for the field will be <strong>last_login_date</strong>.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'You can <a href="https://www.cozmoslabs.com/docs/profile-builder-2/manage-user-fields/#Manage_existing_custom_fields_with_Profile_Builder" target="_blank">create a field with this meta name</a> in Profile Builder to display it in the Userlisting or Edit Profile forms.', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

        <tr>
            <th><?php _e( 'Save \'Last Profile Update\' date in usermeta', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[save-last-profile-update]"<?php echo ( ( isset( $settings['save-last-profile-update'] ) && ( $settings['save-last-profile-update'] == 'yes' ) ) ? ' checked' : '' ); ?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'By checking this option, each time a modifies his profile the date and time will be saved in the database.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'The meta name for the field will be <strong>last_profile_update_date</strong>.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'You can <a href="https://www.cozmoslabs.com/docs/profile-builder-2/manage-user-fields/#Manage_existing_custom_fields_with_Profile_Builder" target="_blank">create a field with this meta name</a> in Profile Builder to display it in the Userlisting or Edit Profile forms.', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

        <tr>
            <th><?php _e( 'Disable automatic scrolling after submit', 'profile-builder' ); ?></th>

            <td>
                <label><input type="checkbox" name="wppb_toolbox_forms_settings[disable-automatic-scrolling]"<?php echo ( ( isset( $settings['disable-automatic-scrolling'] ) && ( $settings['disable-automatic-scrolling'] == 'yes' ) ) ? ' checked' : '' );?> value="yes">
                    <?php _e( 'Yes', 'profile-builder' ); ?>
                </label>

                <ul>
                    <li class="description">
                        <?php _e( 'By default, after each form submission the page will automatically scroll to the form message.', 'profile-builder' ); ?>
                    </li>
                    <li class="description">
                        <?php _e( 'If you check this option, automatic scrolling will be disabled.', 'profile-builder' ); ?>
                    </li>
                </ul>
            </td>
        </tr>

    </table>

    <?php submit_button( __( 'Save Changes', 'profile-builder' ) ); ?>

</form>
