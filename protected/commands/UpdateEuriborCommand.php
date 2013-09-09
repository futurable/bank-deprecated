<?php
class UpdateEuriborCommand extends CConsoleCommand
{
    public function run($args)
    {
        $this->fetchEuriborRates();
    }
    
    /**
     *  Fetch euribor rates as multi-dimensional array
     *  Array structure
     *  [rates]
     *      [360] // act 360
     *          [month]
     *              [{number}] // Number of months
     *          [week]
     *              [{number}] // Number of weeks
     *      [365] // act 365
     *          ..
     */
    
    private function fetchEuriborRates(){
        $feed_url = "http://www.suomenpankki.fi/fi/_layouts/BOF/RSS.ashx/Tilastot/Korot/en";
        
        $content = file_get_contents($feed_url);  
        $xml = new SimpleXmlElement($content);  
        $euriborRates = array();
        
        foreach($xml->channel->item as $item){
            $title = $item->title;
            $parts = explode(" ", $title);
            
            $act = filter_var($parts[3], FILTER_SANITIZE_NUMBER_INT); // The act part (360 or 365)
            $span = trim($parts[2]); // Month or week
            $number = trim($parts[1]); // The number of months / weeks
            $rate = trim($parts[7]); // The actual euribor rate
            
            $euriborRates[$act][$span][$number] = $rate;
        }
        
        return $euriborRates;
    }
}
?>