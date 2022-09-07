<?php
class simple {
    private $text = 'La classe MyClass a été initialisée !';
    public function show() {
        echo $this->text;
    }
}
$text = new Simple();
echo $text->show();
?>
<br>
<br>
<?php
class othersimple {
    private $message;
    private $name;
    function __construct($message, $name) {
        $this->name = $name;
        $this->message = $message;
    }
    public function show() {
        echo $this->message;
        echo $this->name;
    }
    public function set_name($NewName) {
        $this->name = $NewName;
    }
}
$text2 = new othersimple('Hello All, I am', ' Scott');
echo $text2->show();
?>
<br>
<br>
<?php
$text2 = new othersimple('Hello All, I am', ' Xavier');
echo $text2->show();
?>
<br>
<br>
<br>
<?php

class trie {
    private $tableau = [11,-2,4,35,0,8,-9];
    public function show() {
        echo $this->tableau;
    }
}
$table = new trie();
echo trie->show();




