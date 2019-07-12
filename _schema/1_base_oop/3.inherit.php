<?php


// Наследование

/**
 * Class GrandFather
 *
 * Дедушка (Uncle)
 */
class GrandFather
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


/**
 * Class Father
 *
 * Отец
 */
class Father extends GrandFather
{


}





$masha = new Father();
$ivan  = new Father();



echo 'Тело Маша - '. $masha->body . '<br>';
echo 'Тело Ивана - '. $ivan->body . '<br>';


$masha->eat(200);
$ivan->eat(2000);

echo 'Волосы Маша - '. $masha->body . '<br>';
echo 'Волосы Ивана - '. $ivan->body . '<br>';

