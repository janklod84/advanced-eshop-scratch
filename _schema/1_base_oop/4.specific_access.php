<?php

// Спецификация доступа

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

    private $nose = 'Кривой'; // protected



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

    /**
     * Show Grand Father Nose
     */
    public function showGrandFatherNose()
    {
        echo $this->nose;
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



$masha->showGrandFatherNose(). '<br>';


echo 'Тело Маша - '. $masha->body . '<br>';
echo 'Тело Ивана - '. $ivan->body . '<br>';


$masha->eat(200);
$ivan->eat(2000);

echo 'Волосы Маша - '. $masha->body . '<br>';
echo 'Волосы Ивана - '. $ivan->body . '<br>';

