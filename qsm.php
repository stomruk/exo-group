<?php



class Qcm
{
    public $totalQuestions = 1;
    public $note = 0;
    public $noteSur20 = 0;
    public $maxNote = 40;
    public $form;

    public function __construct()
    {
        $this->form = "<form method='post'><fieldset>";
    }

    public function ajouterQuestion(Question $question)
    {
        $this->form .= "<h3 style='color:red'>" . "Question " . $this->totalQuestions . "</h3>";
        $this->form .= "<p>" . $question->question . "</p>";
        foreach ($question->reponses as $reponse) {
            $this->form .= "<label name='reponse'>$reponse->reponse</label>";
            $this->form .= "<input type='radio' name=$question->question value='$reponse->reponse'.' required>";
        }
        $this->totalQuestions++;
    }

    public function generer()
    {
        return $this->form .= "<input type='submit' value='submit'></fieldset></form>";
    }

    public function setAppreciation(array $array){
        if($this->noteSur20== 0){
            $this->form .= "<p>Note : ".$this->noteSur20 ."/20 " . $array[0] ."</p>";
        }
        if($this->noteSur20 == 5){
            $this->form .= "<p>Note : ".$this->noteSur20 ."/20 " . $array[5] ."</p>";
        }
        if($this->noteSur20 == 10){
            $this->form .= "<p>Note : ".$this->noteSur20 ."/20 " . $array[10] ."</p>";
        }
        if($this->noteSur20 == 15){
            $this->form .= "<p>Note : ".$this->noteSur20 ."/20 " . $array[15] ."</p>";
        }
        if($this->noteSur20 == 20){
            $this->form .= "<p>Note : ".$this->noteSur20 ."/20 " . $array[20] ."</p>";
        }
    }

    public function ajouterpoint(){
        $this->note += 10;
        return $this->noteSur20 = $this->note/$this->maxNote*20;
    }

}

class Question
{
    public $question;
    public array $reponses = [];

    function __construct(string $question)
    {
        $this->question = $question;
    }

    function ajouterReponse(Reponse $reponse)
    {
        $this->reponses[] = $reponse;
    }
}

class Reponse
{
    public const BONNE_REPONSE = true;
    public const MAUVAISE_REPONSE = false;

    public $reponse;
    public $result;


    function __construct(string $response, bool $result = Reponse::MAUVAISE_REPONSE)
    {
        $this->reponse = $response;
        $this->result = $result;
    }

}


$notes = array(
    0 => 'NUL !',
    5 => 'pas bon',
    10 => 'ça va',
    15 => 'bon',
    20 => 'GODLIKE !',
);


$qcm = new Qcm();
$question1 = new Question('2+2');
$question1->ajouterReponse(new Reponse('3'));
$question1->ajouterReponse(new Reponse('4', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('5'));
$question2 = new Question('5+2');
$question2->ajouterReponse(new Reponse('4'));
$question2->ajouterReponse(new Reponse('7', Reponse::BONNE_REPONSE));
$question2->ajouterReponse(new Reponse('9'));
$question3 = new Question('1+2');
$question3->ajouterReponse(new Reponse('3', Reponse::BONNE_REPONSE));
$question3->ajouterReponse(new Reponse('1'));
$question3->ajouterReponse(new Reponse('6'));
$question4 = new Question('7+2');
$question4->ajouterReponse(new Reponse('5'));
$question4->ajouterReponse(new Reponse('11'));
$question4->ajouterReponse(new Reponse('9', Reponse::BONNE_REPONSE));
$qcm->ajouterQuestion($question1);
$qcm->ajouterQuestion($question2);
$qcm->ajouterQuestion($question3);
$qcm->ajouterQuestion($question4);


if(isset($_POST) && !empty($_POST)){
    if($_POST[$question1->question] == 4 ){
        $qcm->ajouterpoint();
    }
    if($_POST[$question2->question] == 7 ){
        $qcm->ajouterpoint();
    }
    if($_POST[$question3->question] == 3 ){
        $qcm->ajouterpoint();
    }
    if($_POST[$question4->question] == 9 ){
        $qcm->ajouterpoint();
    }
    $qcm->setAppreciation($notes);
};



echo $qcm->generer();