<?php


/**
 * Class GrandFather
 *
 * Дедушка
 */
abstract class GrandFather
{
    /**
     * @var string $body
     * @var string $borsch
     */
    public  $body = 'Нормальное';
    private $borsch = 'Вкусный';



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
     * getBorsch
     */
    protected function getBorsch()
    {
        return $this->borsch;
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
     * @var string $hair
     */
    protected $hair = 'Русые';


    /**
     * Re Color
     * @param $color
     */
    public function reColor($color)
    {
        $this->hair = $color;
        echo $this->hair;
    }
}


// Object
$masha = new Father();

echo $masha->body;


