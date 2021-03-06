<div class="box-header">
    <h2><?php echo __d('system', 'Settings'); ?></h2>
    <ol class="breadcrumb">
        <li><a href='<?php echo admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?php echo __d('system', 'Dashboard'); ?></a></li>
        <li><strong><?php echo __d('system', 'Settings'); ?></strong></li>
    </ol>
</div>

<div class="content">

    <?php echo Session::getMessages(); ?>


    <?php if(CONFIG_STORE == 'database'): ?>

        <form class="form-horizontal" action="<?php echo admin_url('settings'); ?>" method="post">
        <input type="hidden" name="csrfToken" value="<?php echo e($csrfToken); ?>" />

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __d('system', 'Site Settings'); ?></h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sitename"><?php echo __d('settings', 'Site Name'); ?></label>
                    <div class="col-sm-8">
                        <input name="siteName" id="siteName" type="text" class="form-control" value="<?php echo e($options['siteName']); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="site_skin"><?php echo __d('system', 'Backend Skin'); ?></label>
                    <div class="col-sm-8">
                        <div class="col-sm-3" style="padding: 0;">
                            <select name="siteSkin" id="siteSkin" class="form-control">
                                <option value="blue"         <?php if ($options['siteSkin'] == 'blue')         { echo "selected='selected'"; } ?> ><?= __d('system', 'Blue'); ?></option>
                                <option value="blue-light"   <?php if ($options['siteSkin'] == 'blue-light')   { echo "selected='selected'"; } ?> ><?= __d('system', 'Blue Light'); ?></option>
                                <option value="black"        <?php if ($options['siteSkin'] == 'black')        { echo "selected='selected'"; } ?> ><?= __d('system', 'Black'); ?></option>
                                <option value="black-light"  <?php if ($options['siteSkin'] == 'black-light')  { echo "selected='selected'"; } ?> ><?= __d('system', 'Black Light'); ?></option>
                                <option value="purple"       <?php if ($options['siteSkin'] == 'purple')       { echo "selected='selected'"; } ?> ><?= __d('system', 'Purple'); ?></option>
                                <option value="purple-light" <?php if ($options['siteSkin'] == 'purple-light') { echo "selected='selected'"; } ?> ><?= __d('system', 'Purple Light'); ?></option>
                                <option value="yellow"       <?php if ($options['siteSkin'] == 'yellow')       { echo "selected='selected'"; } ?> ><?= __d('system', 'Yellow'); ?></option>
                                <option value="yellow-light" <?php if ($options['siteSkin'] == 'yellow-light') { echo "selected='selected'"; } ?> ><?= __d('system', 'Yellow Light'); ?></option>
                                <option value="red"          <?php if ($options['siteSkin'] == 'red')          { echo "selected='selected'"; } ?> ><?= __d('system', 'Red'); ?></option>
                                <option value="red-light"    <?php if ($options['siteSkin'] == 'red-light')    { echo "selected='selected'"; } ?> ><?= __d('system', 'Red Light'); ?></option>
                                <option value="green"        <?php if ($options['siteSkin'] == 'green')        { echo "selected='selected'"; } ?> ><?= __d('system', 'Green'); ?></option>
                                <option value="green-light"  <?php if ($options['siteSkin'] == 'green-light')  { echo "selected='selected'"; } ?> ><?= __d('system', 'Green Light'); ?></option>
                            </select>
                        </div>
                        <div class='clearfix'></div>
                        <small><?php echo __d('system', 'The Skin used by the Site\'s Template.'); ?></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sitename"><?php echo __d('system', 'IP address access list'); ?></label>
                    <div class="col-sm-8">
                        <table class='table table-striped table-hover table-bordered sorted_table'>
                        <tr>
                            <th colspan="2"><?php echo __d('system', 'Users set to office login only will only be able to login from the following IP addresses'); ?></th>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo __d('system', 'You current IP address is'); ?> <?=Request::server('REMOTE_ADDR');?></td>
                        </tr>
                        <tr>
                            <th><?php echo __d('system', 'IP'); ?></th>
                            <th><?php echo __d('system', 'Name'); ?></th>
                        </tr>
                        <tbody id="ipextender">
                            <?php 
                            $i = 0;
                            foreach($options['ipAccessList'] as $ip=>$name) {
                                echo "<tr>
                                <td><input type='text' name='ips[]' value='$ip'  /> </td>
                                <td><input type='text' name='names[]' value='$name' />  <a href='#' class='ipremove'><?php echo __d('system', 'Remove'); ?></a></td>
                                </tr>";
                            $i++;}
                             ?>
                        </tbody>
                        </table>
                        <p><a href="#" id="ipadd" class='btn btn-success'><?php echo __d('system', 'Add Row'); ?></a></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sitename"><?php echo __d('system', 'Developer Email Accounts'); ?></label>
                    <div class="col-sm-8">
                        <table class='table table-striped table-hover table-bordered sorted_table'>
                        <tr>
                            <th colspan="2"><?php echo __d('system', 'Set email accounts for sending error reports to'); ?>.</th>
                        </tr>
                        <tr>
                            <th><?php echo __d('system', 'Email'); ?></th>
                            <th><?php echo __d('system', 'Name'); ?></th>
                        </tr>
                        <tbody id="devemailextender">
                            <?php 
                            $i = 0;
                            foreach($options['devEmails'] as $email=>$name) {
                                echo "<tr>
                                <td><input type='text' name='emails[]' size='50' value='$email'  /> </td>
                                <td><input type='text' name='names[]' value='$name' />  <a href='#' class='devemailremove'><?php echo __d('system', 'Remove'); ?></a></td>
                                </tr>";
                            $i++;}
                             ?>
                        </tbody>
                        </table>
                        <p><a href="#" id="devemailadd" class='btn btn-success'><?php echo __d('system', 'Add Row'); ?></a></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __d('system', 'Mail Settings'); ?></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="mailDriver"><?= __d('settings', 'Mail Driver'); ?></label>
                    <div class="col-sm-8">
                        <div class="col-sm-3" style="padding: 0;">
                            <select name="mailDriver" id="mailDriver" class="form-control">
                                <option value="smtp" <?php if ($options['mailDriver'] == 'smtp') { echo "selected='selected'"; }?>><?= __d('settings', 'SMTP'); ?></option>
                                <option value="mail" <?php if ($options['mailDriver'] == 'mail') { echo "selected='selected'"; }?>><?= __d('settings', 'Mail'); ?></option>
                                <option value="sendmail" <?php if ($options['mailDriver'] == 'sendmail') { echo "selected='selected'"; }?>><?= __d('settings', 'Sendmail'); ?></option>
                            </select>
                        </div>
                        <div class='clearfix'></div>
                        <small><?= __d('settings', 'Whether or not is used a external SMTP Server to send the E-mails.'); ?></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="mailFromAddress"><?= __d('settings', 'E-mail From Address'); ?></label>
                    <div class="col-sm-8">
                        <div class="col-sm-6" style="padding: 0;">
                            <input name="mailFromAddress" id="mailFromAddress" type="text" class="form-control" value="<?= $options['mailFromAddress']; ?>">
                        </div>
                        <div class='clearfix'></div>
                        <small><?= __d('settings', 'The outgoing E-mail address.'); ?></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="mailFromName"><?= __d('settings', 'E-mail From Name'); ?></label>
                    <div class="col-sm-8">
                        <div class="col-sm-6" style="padding: 0;">
                            <input name="mailFromName" id="mailFromName" type="text" class="form-control" value="<?= $options['mailFromName']; ?>">
                        </div>
                        <div class='clearfix'></div>
                        <small><?= __d('settings', 'The From Field of any outgoing e-mails.'); ?></small>
                    </div>
                </div>

                <div class="conditional" data-cond-option="mailDriver" data-cond-value="smtp">

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="mailHost"><?= __d('settings', 'Server Name'); ?></label>
                        <div class="col-sm-8">
                            <div class="col-sm-6" style="padding: 0;">
                                <input name="mailHost" id="mailHost" type="text" class="form-control" value="<?= $options['mailHost']; ?>">
                            </div>
                            <div class='clearfix'></div>
                            <small><?= __d('settings', 'The name of the external SMTP Server.'); ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="mailPort"><?= __d('settings', 'Server Port'); ?></label>
                        <div class="col-sm-8">
                            <div class="col-sm-2" style="padding: 0;">
                                <input name="mailPort" id="mailPort" type="text" class="form-control" value="<?= $options['mailPort']; ?>">
                            </div>
                            <div class='clearfix'></div>
                            <small><?= __d('settings', 'The Port used for connecting to the external SMTP Server.'); ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="mailEncryption"><?= __d('settings', 'Use the Cryptography'); ?></label>
                        <div class="col-sm-8">
                            <div class="col-sm-2" style="padding: 0;">
                                <select name="mailEncryption" id="mailEncryption" class="form-control">
                                    <option value="ssl" <?php if ($options['mailEncryption'] == 'ssl') { echo "selected='selected'"; }?>>SSL</option>
                                    <option value="tls" <?php if ($options['mailEncryption'] == 'tls') { echo "selected='selected'"; }?>>TLS</option>
                                    <option value="" <?php if ($options['mailEncryption'] == '') { echo "selected='selected'"; }?>><?= __d('settings', 'NONE'); ?></option>
                                </select>
                            </div>
                            <div class='clearfix'></div>
                            <small><?= __d('settings', 'Whether or not is used the Cryptography for connecting to the external SMTP Server.'); ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="mailUsername"><?= __d('settings', 'Server Username'); ?></label>
                        <div class="col-sm-8">
                            <div class="col-sm-6" style="padding: 0;">
                                <input name="mailUsername" id="mailUsername" type="text" class="form-control" value="<?= $options['mailUsername']; ?>" autocomplete="offok">
                            </div>
                            <div class='clearfix'></div>
                            <small><?= __d('settings', 'The Username used to connect to the external SMTP Server.'); ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="mailPassword"><?= __d('settings', 'Server Password'); ?></label>
                        <div class="col-sm-8">
                            <div class="col-sm-6" style="padding: 0;">
                                <input name="mailPassword" id="mailPassword" type="password" class="form-control" value="<?= $options['mailPassword']; ?>" autocomplete="offok">
                            </div>
                            <div class='clearfix'></div>
                            <small><?= __d('settings', 'The Password used to connect to the external SMTP Server.'); ?></small>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> <?php echo __d('system', 'Save all Changes'); ?></button>
            </div>
        </div>

        </form>

    <?php else: ?>

        <div class="callout callout-info">
            <?= __d('settings', 'The Settings are not available while the Config Store is on Files Mode.'); ?>
        </div>

    <?php endif; ?>

</div>
