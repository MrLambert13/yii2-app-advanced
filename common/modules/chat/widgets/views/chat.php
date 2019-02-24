<?php

use yii\helpers\Html;

?>

<textarea id="chatMessage" rows="10">

</textarea>

<?=
Html::tag(
    'div',
    Html::input('text', NULL, NULL, ['id' => 'chatSendMessage', 'class' => 'form-control'])
    . Html::tag(
        'div',
        Html::button(
            'Send',
            [
                'class' => 'btn btn-outline-secondary',
                'type' => 'button',
                'id' => 'chatSendButton'
            ]),
        ['class' => 'input-group-append']),
    ['class' => 'input-group'])
?>



