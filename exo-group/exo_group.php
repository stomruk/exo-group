<?php

class Form {
    public $form;
    public function  __construct($method) {
           $this->form = "<form method='POST'> <fieldset>";
    }
    public function setText($type,$mot){
            $this -> form.="<input type=$type name=$mot placeholder=$mot>";
    }
    public function setSubmit($submit){
            $this->form.="<input type=$submit value=$submit>";
    }
    public function getForm() {
        return $this->form.='</fieldset> </form>';
    }
}


class Form2 extends Form {
    public function setRadio($type,$name,$value){
            $this->form.="<br><br><label for=$name>$value</label>";
            $this->form.="<input type=$type id=$name name=$name value=$value>";
    }
    public function setBox($type, $value){
            $this->form.="<br><br><label for=$value>$value</label>";
            $this->form.="<input type=$type name=$value value=$value>";
    }
}



$form2 = new Form2('post');
$form2->setText('text','nom');
$form2->setText('text', 'prenom');
$form2->setRadio('radio', 'gender','male');
$form2->setRadio('radio', 'gender', 'female');
$form2->setBox('checkbox','CAP');
$form2->setBox('checkbox','BAC');
$form2->setBox('checkbox','BAC +2');
$form2->setSubmit('submit');
echo $form2->getForm();

var_dump($_POST);


class Form3 extends Form
{
    /**
     *
     * @param string $type
     * @param string $name
     * @param string $label
     * @param string $value
     * @param string $id
     * @return void
     */
    public function setRadioCheckbox(string $type , string $name, string $label, string $value, string $id = ''): void
    {
        $name .= '[]';
        $this -> form .= "<label for='$id'>$label</label>";
        $this-> form .= "<input type='$type' name='$name' id='$id' value='$value'>";
    }
}

$form3 = new Form3("post");
$form3 ->setRadioCheckbox('radio', 'nationality',"FR", 'fr', 'fr');
$form3 -> setRadioCheckbox('radio','nationality',"ENG" , 'eng', 'eng');
$form3 ->setRadioCheckbox('checkbox', 'metier',"dev", 'dev', 'dev');
$form3 -> setRadioCheckbox('checkbox','metier',"mobile" , 'mobile', 'mobile');
$form3 -> setSubmit('submit');
echo $form3 -> getForm();

var_dump($_POST);


