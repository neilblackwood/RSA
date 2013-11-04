<div class="row first-text">
    <div class="col-md-4 col-md-offset-2 bootstrap show hide hidden-xs hidden-sm" style='margin-top: -50px'>
        <img src='/assets/img/landing.gif'>
    </div>

    <div class="col-md-4">
        <p style='width:320px'><?php echo lang('welcome_first_paragraph') ?></p>

        <h2><?php echo lang('welcome_your_language') ?></h2>

        <?php
        if (!isset($_COOKIE['RSAlanguage'])) setcookie('RSAlanguage', 'english');
        ?>

        <div class='selectbox-wrapper'>
          <select id='language-select'>
            <?php
            foreach (available_languages() as $index=>$language)
            {
                if ($language == $_COOKIE['RSAlanguage']) $selected = 'selected="selected"';
                else $selected = null;

                echo "<option " . $selected . " value='" . strtolower($language) . "'>" . ucfirst(lang("welcome_" . strtolower($language))) . "</option>";
            }
            ?>
          </select>
        </div>

        <br/>
        <input type='text' id='email' placeholder="<?php echo lang('welcome_email') ?>" <?php echo isset($_COOKIE['RSAemail']) ? "value='" . $_COOKIE['RSAemail'] . "'" : null ?>>
        <span class="glyphicon glyphicon-ok emailfield success"></span>

        <div class="emailError">
            <span class="glyphicon glyphicon-minus-sign"></span><span> <?php echo lang('welcome_email_error') ?></span>
        </div>

        <br/><br/>
        <input type='text' id='name' placeholder="<?php echo lang('welcome_name') ?>" <?php echo isset($_COOKIE['RSAname']) ? "value='" . $_COOKIE['RSAname'] . "'" : null ?>>
        <span class="glyphicon glyphicon-ok namefield success"></span>

    </div>
</div>

<div class="row buttonRow"  style='display:none'>
        <div class="col-md-2 col-md-offset-8">
            <br/>
            <a href='/choose' class='button' style='width:200px'><?php echo lang('welcome_get_started') ?> &gt;</a>
        </div>
</div>

<div class="row">
    <div class="col-md-2 col-md-offset-6">
        <br/>
        <a href='mailto:corporate.responsibility@gcc.rsagroup.com?subject=Help logging in bepartofCR.rsagroup.com' style='width:200px'><?php echo lang('welcome_help_logging') ?></a>
    </div>
</div>