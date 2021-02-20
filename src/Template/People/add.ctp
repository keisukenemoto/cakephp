<p><?= $msg ?></p>
<?= $this->Form->create($entity, ['type' => 'post', 'url' => ['controller' => 'People', 'action' => 'add']]) ?>
<!-- $entityでエンティティの値が入力フィールドに割り当てられる。エンティティの作成用フォームをフォームヘルパーで作成する場合、エンティティのpインスタンスを第一引数にする。インスタンスは変数なのか -->
<fieldset class="form">
    NAME:<?= $this->Form->error('People.name') ?>
    <?= $this->Form->text('People.name') ?>
    MAIL:<?= $this->Form->error('People.mail') ?>
    <?= $this->Form->text('People.mail') ?>
    AGE:<?= $this->Form->error('People.age') ?>
    <?= $this->Form->text('People.age') ?>
    <?= $this->Form->submit('送信') ?>
</fieldset>
<?= $this->Form->end() ?>