<table>
    <?= $this->Html->tableHeaders(["title", 'name', 'mail'], ['style' => ['background:#006;white']]) ?>
    <?= $this->Html->tableCells(
        [
            ["This is sample", "taro", "taro@yamada"],
            ["Hello!", "hanako", "hanako@flower"],
            ["test,test", "sachiko", "sachi@co.jp"],
            ["last!.", "jiro", "jiro@change"]
        ],
        ['style' => ['background:#ccf']],
        ['style' => ['background:#dff']]
    ) ?>
</table>
<ul>
    <?= $this->Html->nestedList(["first line", 'second line', 'third line' => ['one', 'two', 'three']]) ?>
</ul>