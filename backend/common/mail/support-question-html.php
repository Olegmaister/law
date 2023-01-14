<?php
/* @var $message \api\models\SupportMessage */
?>
<div style="text-align: left">
    <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff; margin: auto">
        <tr>
            <td style="font-size:20px; text-align:center;">
                <b><?= Yii::t('app', 'An Important Message from the staff at ') . Yii::getAlias('@domain') ?> #<?= $message->id ?></b><br><br>
            </td>
        </tr>
        <tr>
            <td width="100%"
                style="color: #000000;font-size:14px;line-height:20px;font-family: 'Montserrat', sans-serif;">
                Dear <?= $message->name ?>.
                <br>
                Thank you for submitting an inquiry expressing interest in receiving help with your FDCPA claim.
                <br><br>
                Your collection harassment case has been sent to an attorney who will call you shortly to review your
                claim for free.
                <br><br>
                This message confirms the fact of receiving your request number #<?= $message->id ?>:<br>
                Message: <span style="line-height:17px;"><?= htmlentities($message->message) ?></span><br>
                <br>
                <strong>When Will We Call?</strong>
                <br><br>
                We will call back as soon as we can during our business hours, though it may take until the next
                business day if you have contacted us overnight or during the weekend.
                <br><br>
                <strong>Please feel free to contact us directly any time at: 877-886-9821</strong>
                <br><br>
                You may leave a message for us any time - 24 hours, 7 days a week, 365 days a year.
                <br>
                Thank you for contacting us, and we will look forward to speaking with you soon.
                <br><br>
                Thanks.
            </td>
        </tr>
    </table>
</div>