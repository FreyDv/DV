<?php


namespace ishop\base\type;


class Meta
{
    public string $title;
    public string $description;
    public string $keywords;


    public function __construct($title='',$description='',$keywords='')
    {
        $this->title='<title>'.$title.'</title>';
        $this->description=$description;
        $this->keywords =$keywords;
    }

    public function formatData():string{
        return PHP_EOL.'<title>'.$this->title.'</title>'.PHP_EOL
                .'<meta name="description" content="'.$this->description.'"/>'.PHP_EOL
                .'<meta name="keywords" content="'.$this->keywords.'"/>'.PHP_EOL;
    }

}