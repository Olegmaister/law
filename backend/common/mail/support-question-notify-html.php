<?php
/* @var $message \api\models\SupportMessage */
?>
<div style="text-align: left">
  <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff; margin: auto">
    <tbody>
    <tr>
      <td></td>
      <td style="font-size:20px; text-align:center;">
        <b><?= Yii::t('app', 'Contact technical support') ?> #<?= $message->id ?></b><br><br>
      </td>
    </tr>
    <tr>
      <td width="20" nowrap=""></td>
      <td width="100%" style="color: #000000;font-size:14px;line-height:20px;font-family: 'Montserrat', sans-serif;">
        <span style="line-height:17px;">Name: <?= htmlentities($message->name) ?></span><br>
        <span style="line-height:17px;">Phone: <?= htmlentities($message->phone) ?></span><br>
        <span style="line-height:17px;">Email: <?= htmlentities($message->email) ?></span><br>
        <pre style="white-space: pre-wrap; line-height: 19px"><?= htmlentities($message->message) ?></pre>
          <?php if ($message->info): ?>
            <strong>Questions:</strong>
            <ul>
              <?php foreach ($message->info as $question): ?>
                  <li><?= htmlentities($question) ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
      </td>
      <td width="20" nowrap=""></td>
    </tr>
    </tbody>
  </table>
</div>