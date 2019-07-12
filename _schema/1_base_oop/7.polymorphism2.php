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
     * @var string $borsch
     */
    public  $hair = 'Русые';
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
     * метод getBorsch()
     *
     * Call getBorsch
     */
    public function getBorsch()
    {
        $borsch = parent::getBorsch();
        $borsch .= ' и соленый';
        return $borsch;
    }

}





$masha = new Father();
$ivan  = new Father();



$borsch = $masha->getBorsch();

echo $borsch . ' и сладкий'; // Вкусный и соленый и сладкий


