<?php
namespace ITF\AdminBundle\Admin\Dashboard\Components;

class C3PieChart implements ChartInterface
{
    private $data;
    private $days_range;
    
    public static function create()
    {
        return new C3PieChart();
    }
    
    public function __construct()
    {
        $this->data = [];
        $this->days_range = 0;
    }
    
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param mixed $data
     *
     * @return C3PieChart
     */
    public function setData($data)
    {
        $this->data = $data;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getDaysRange()
    {
        return $this->days_range;
    }
    
    /**
     * @param $range
     * @return $this
     */
    public function setDaysRange($range)
    {
        $this->days_range = $range;
        
        return $this;
    }
    
    /**
     * @param string $format
     * @return array
     */
    public function getPreparedResult($format = null)
    {
        $data = $this->getData();
        $newData = [];
        
        foreach($data as $key => $entry) {
            $newData[] = [$key, $entry];
        }
        
        switch($format) {
            case 'json':
                return json_encode($newData);
            default:
                return $newData;
        }
    }
}