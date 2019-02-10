<?php if(get_theme_mod('adviso_contact_info_enable') =='enable' ): ?>
<div id="contact-info" class="container">
    <?php if (get_theme_mod('adviso_mail_id')) : ?>
        <div class="mail">
            <span class="fa fa-envelope"></span>
            <span class="value"><?php echo esc_html( get_theme_mod('adviso_mail_id') ); ?></span>
        </div>
    <?php endif; ?>
    <?php if (get_theme_mod('adviso_phone')) : ?>
        <div class="phone">
            <span class="fa fa-phone"></span>
            <span class="value"><?php echo esc_html( get_theme_mod('adviso_phone') ); ?></span>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>