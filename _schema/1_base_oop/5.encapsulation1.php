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
    protected function showGrandFatherNose()
    {
        return $this->nose;
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


// не возможно вызвать этот метод потому что у нее ограничный доступ
$masha->showGrandFatherNose(). '<br>';