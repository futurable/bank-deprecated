<?php
class UpdateEuriborCommand extends CConsoleCommand
{
    private $euriborRates;
    
    public function run($args)
    {
        $euriborRates = $this->fetchEuriborRates();
        $this->updateEuribors();
        echo "Euribors updated.\n";
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
        
        $this->euriborRates = $euriborRates;
    }
    
    private function updateEuribors(){
        $euriborRates = $this->euriborRates;
        // Use act 360 monthly rates
        $AMR = $euriborRates[360]['month'];
        
        // Update 1 month euribor
        $euribor1m = Interest::model()->findByAttributes(array('name'=>'loanEuribor1'));
        $euribor1m->rate = $AMR[1];
        $euribor1m->save();
        
        // Update 3 month euribor
        $euribor3m = Interest::model()->findByAttributes(array('name'=>'loanEuribor3'));
        $euribor3m->rate = $AMR[3];
        $euribor3m->save();
        
        // Update 6 month euribor
        $euribor6m = Interest::model()->findByAttributes(array('name'=>'loanEuribor6'));
        $euribor6m->rate = $AMR[6];
        $euribor6m->save();
        
        // Update 12 month euribor
        $euribor12m = Interest::model()->findByAttributes(array('name'=>'loanEuribor12'));
        $euribor12m->rate = $AMR[12];
        $euribor12m->save();
    }
}
?>