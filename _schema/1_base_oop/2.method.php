<?php


// Класс Метод
/**
 * Class Man
 */
class Man
{
    /**
     * @var string $hair
     * @var string $body
     */
    public $hair = 'Русые';
    public $body = 'Нормальное';


    /**
     * Method eat
     *
     * @param $calories
     */
    public function eat($calories)
    {
        if($calories > 500)
        {
            $this->body = 'Толсьый';
        }else{
            $this->body = 'Худой';
        }
    }
}

$masha = new Man();
$ivan  = new Man();
$petya = new Man();


echo 'Тело Маша - '. $masha->body . '<br>';
echo 'Тело Ивана - '. $ivan->body . '<br>';

$masha->eat(200);
$ivan->eat(2000);

echo 'Волосы Маша - '. $masha->body . '<br>';
echo 'Волосы Ивана - '. $ivan->body . '<br>';
echo 'Волосы Ивана - '. $petya->body . '<br>';