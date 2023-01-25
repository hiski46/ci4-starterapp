<h1><?php echo lang('Auth.create_user_heading'); ?></h1>
<?php breadcrumb() ?>
<p><?php echo lang('Auth.create_user_subheading'); ?></p>

<div id="infoMessage"><?php echo $message; ?></div>

<?php echo form_open('auth/create_user', ['class' => 'pe-3']); ?>

<div class="row">
      <div class="col-md-6 col-lg-3">
            <div class="form-floating mb-3">
                  <?php echo form_input($first_name, '', ['class' => 'form-control rounded-0', 'placeholder' => 'first name']); ?>
                  <?php echo form_label(icon('people') . ' ' . lang('Auth.create_user_fname_label'), 'first_name', ['for' => 'first_name']); ?>
            </div>
      </div>
      <div class="col-md-6 col-lg-3">
            <div class="form-floating mb-3">
                  <?php echo form_input($last_name, '', ['class' => 'form-control rounded-0', 'placeholder' => 'last name']); ?>
                  <?php echo form_label(lang('Auth.create_user_lname_label'), 'last_name', ['for' => 'last_name']); ?>
            </div>
      </div>

</div>

<?php
if ($identity_column !== 'email') {
      echo '<p>';
      echo form_label(lang('Auth.create_user_identity_label'), 'identity');
      echo '<br />';
      echo \Config\Services::validation()->getError('identity');
      echo form_input($identity);
      echo '</p>';
}
?>
<div class="row">
      <div class="col-md-4 col-lg-3">
            <div class="form-floating mb-3">
                  <?php echo form_input($company, '', ['class' => 'form-control rounded-0', 'placeholder' => 'company']); ?>
                  <?php echo form_label(icon('buildings') . ' ' . lang('Auth.create_user_company_label'), 'company', ['for' => 'company']); ?>
            </div>
      </div>
      <div class="col-md-4 col-lg-2">
            <div class="form-floating mb-3">
                  <?php echo form_input($phone, '', ['class' => 'form-control rounded-0', 'placeholder' => 'phone']); ?>
                  <?php echo form_label(icon('telephone') . ' ' . lang('Auth.create_user_phone_label'), 'phone', ['for' => 'phone']); ?>
            </div>
      </div>
      <div class="col-md-4 col-lg-4">
            <div class="form-floating mb-3">
                  <?php echo form_input($email, '', ['class' => 'form-control rounded-0', 'placeholder' => 'email']); ?>
                  <?php echo form_label(icon('envelope') . ' ' . lang('Auth.create_user_email_label'), 'email', ['for' => 'email']); ?>
            </div>
      </div>
</div>

<div class="row">
      <div class="col-lg-2 col-md-6">
            <div class="form-floating mb-3">
                  <?php echo form_input($password, '', ['class' => 'form-control rounded-0', 'placeholder' => 'password']); ?>
                  <?php echo form_label(icon('key') . ' ' . lang('Auth.create_user_password_label'), 'password', ['for' => 'password']); ?>
            </div>
      </div>
      <div class="col-lg-2 col-md-6">
            <div class="form-floating mb-3">
                  <?php echo form_input($password_confirm, '', ['class' => 'form-control rounded-0', 'placeholder' => 'password_confirm']); ?>
                  <?php echo form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm', ['for' => 'password_confirm']); ?>
            </div>
      </div>
</div>
<button type="submit" class="btn rounded-0 btn-primary"><?= icon('folder-plus') . ' ' . lang('Auth.create_user_submit_btn')    ?></button>

<?php echo form_close(); ?>