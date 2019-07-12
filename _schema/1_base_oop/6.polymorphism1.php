<?php


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

    /**
     * Show Grand Father Nose
     *
     * Мы переопределяем метод showGrandFatherNose
     * и его дополним
     */
    public function showGrandFatherNose()
    {
        $nose = parent::showGrandFatherNose();
        $nose .= ' не очень кривой';
        echo $nose;
    }

}





$masha = new Father();
$ivan  = new Father();



$masha->showGrandFatherNose(). '<br>';


