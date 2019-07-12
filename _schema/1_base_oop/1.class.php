<?php


// Класс [ Макет , Шаблон]
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

// Объекты
$masha = new Man();
$ivan  = new Man();

echo 'Волосы Маша - '. $masha->hair . '<br>';
echo 'Волосы Ивана - '. $ivan->hair . '<br>';

$masha->hair = 'Белые';

echo 'Волосы Маша - '. $masha->hair . '<br>';
echo 'Волосы Ивана - '. $ivan->hair . '<br>';