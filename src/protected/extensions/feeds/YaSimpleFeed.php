<?php

/**
 * FileDoc: 
 * Widget for YaSimpleWidget.
 * !!! ATTENTION !!! this widget only supports XML format
 *  
 * Usage:
 * 
 * 1. Copy ya-simple-feed directory into the extensions directory
 * 
 * 2. Use the widget in a view specifying 
 * 		a. the url of the feed to grab and
 * 		b. the speed of slideshow (OPTIONAL, default is 5)
 * 		c. the direction of feed (OPTIONAL, default is 'left')
 * 
 * eg.
 * <?php 
 * 	$this->widget(
 * 		'ext.ya-simple-feed.YaSimpleFeed',
 * 		array(
 * 		'feedUrl'=>'http://yourfeedsite.com/page.xml,
 * 		)
 * 	); 
 * ?>
 * 
 * PHP version 5.3
 * 
 * @category Extensions
 * @package  YaSimpleFeed
 * @author   Biagio Tagliaferro <tarab@email.it>
 *
 */
//Yii::import('ext.ya-simple-feed.*');

class YaSimpleFeed extends CWidget {

    /**
     * @var string $feedUrl  - The url of the feed 
     */
    public $feedUrl;

    /**
     * @var int $speed  - The spped of the feed 
     */
    public $total;

    /**
     * @var string $feedDirection  - The direction of the feed 
     * (left, right, up, down)
     */
    public $description;

    private function getFeeds() {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $rawFeed = file_get_contents($this->feedUrl, false, stream_context_create($arrContextOptions));

        // give an XML object to be iterate
        $xml = new SimpleXMLElement($rawFeed);

        // check if 'feedSpeed' is set OR is int

        $news = ($this->description) ? '<div class="news">' : '<ul class="news-list">';
        $i = 0;
        foreach ($xml->channel->item as $item) {

            if ($this->description) {
                $content = strip_tags(CHtml::decode($item->description));
                if (strlen($content) > 500) {
                    $content = substr($content, 0, 500) . '...';
                }
                $news .= '<h3><a href="' . $item->link . '" target="_blank" ref="nofollow">' . $item->title . '</a></h3>';
                $news .='<div class="newcontent">' . CHtml::encode($content) . '</div>';
            } else {
                $news .= '<li><a href="' . $item->link . '" target="_blank" ref="nofollow">' . $item->title . '</a></li>';
            }


            $i++;
            if ($i == $this->total)
                break;
        }
        $news.= ($this->description) ? '</div>' : '</ul>';


        return $news;
    }

    public function run() {
        if ($this->checkConnection())
            echo $feeds = $this->getFeeds();
    }

    /** check if the pc is connected to internet
     * @return TRUE if there is a connection
     */
    private function checkConnection() {
        // Initiates a socket connection to www.google.com at port 80
        $conn = @fsockopen("www.google.com", 80);
        if ($conn) {
            // there is a connection
            fclose($conn);
            return TRUE;
        }

        return FALSE;
    }

}

?>