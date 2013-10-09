<?php
 
class Social extends AppModel {
    
    public $name = 'Social';    

    public $useTable = false;

     /* Other vars */

    public function organizeData($from, $data){

        $array = array();

        foreach($data as $key => $value) :

            switch($from){

                case 'twitter':
                    $temp = array(
                        'date' => (!empty($value->created_at)) ? $value->created_at : '',
                        'text' => (!empty($value->text)) ? $value->text : ''
                    );                
                    break;

                case 'facebook':
                    $temp = array(
                        'date' => (!empty($value['created_time'])) ? $value['created_time'] : '',
                        'picture' => (!empty($value['picture'])) ? $value['picture'] : '',
                        'link' => (!empty($value['link'])) ? $value['link'] : '',
                        'text' => (!empty($value['description'])) ? $value['description'] : '',
                    );                    
                    break;

                case 'youtube':
                    $temp = array(
                        'date' => $value['snippet']['publishedAt'],
                        'picture' => $value['snippet']['thumbnails']['medium']['url'],
                        'title' => $value['snippet']['title'], 
                        'text' => $value['snippet']['description'],
                        'code' => $value['id']['videoId']
                    );
                    break;

                case 'google_plus':
                    $temp = array(
                        'date' => (!empty($value['published'])) ? $value['published'] : '',
                        'title' => (!empty($value['title'])) ? $value['title'] : '',
                        'text' => (!empty($value['object']['content'])) ? $value['object']['content'] : '',
                        'link' => (!empty($value['url'])) ? $value['url'] : ''
                    );
                    break;

                case 'blog_focusnetworks':
                    $temp = array(
                        'date' => (!empty($value['pubDate'])) ? $value['pubDate'] : '',
                        'title' => (!empty($value['title'])) ? $value['title'] : '',
                        'text' => (!empty($value['description'])) ? $value['description'] : '',
                        'link' => (!empty($value['link'])) ? $value['link'] : ''
                    );
                    break;

                case 'slideshare':
                    $temp = array(                        
                        'title' => (!empty($value['Title'])) ? $value['Title'] : '',
                        'picture' => (!empty($value['ThumbnailURL'])) ? $value['ThumbnailURL'] : '',
                        'link' => (!empty($value['URL'])) ? $value['URL'] : ''
                    );
                    break;

            }

        array_push($array, $temp);

        endforeach;

        return $array;

    }

    function getSlideshare(){

        $apiKey = Configure::read("SLIDESHARE_KEY");
        $apiSecret = Configure::read("SLIDESHARE_SECRET");
        $registers = 10;
        $timestamp = time();

        $hash = sha1(Configure::read("SLIDESHARE_SECRET").$timestamp);
        
        $xml = Xml::build('https://www.slideshare.net/api/2/get_slideshows_by_user?username_for=rkiso&limit='.$registers.'&api_key='.$apiKey.'&hash='.$hash.'&ts='.$timestamp);
        $xmlArray = Xml::toArray($xml);

        $xmlArray = $this->organizeData('slideshare', $xmlArray['User']['Slideshow']);

        return $xmlArray;

    }

    function getFacebook(){
        App::import('Vendor', 'Facebook', array('file' => 'facebook/facebook.php'));
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;  

        $facebook = new Facebook(array(
          'appId'  => Configure::read("FB_APP_ID"),
          'secret' => Configure::read("FB_APP_SECRET"),
        ));        

        $result = Cache::read('posts', 'default');

        if(!$result){
            $result = $facebook->api('focusnetworks?fields=posts', 'GET');      
            $result = $this->organizeData('facebook', $result['posts']['data']);      
            Cache::write('posts', $result, 'default');
        }

        return $result;

    }

     function getLikes(){
        App::import('Vendor', 'Facebook', array('file' => 'facebook/facebook.php'));
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;  

        $facebook = new Facebook(array(
          'appId'  => Configure::read("FB_APP_ID"),
          'secret' => Configure::read("FB_APP_SECRET"),
        ));


        $result = Cache::read('likes', 'default');

        if(!$result){
            $result = $facebook->api('focusnetworks?fields=likes', 'GET');            
            Cache::write('likes', $result, 'default');
        }

        return $result;
    }


    function getTwitter(){
        App::import('Vendor', 'twitter', array('file' => 'twitter/codebird.php'));

        $twitter = new Codebird();
        $twitter->setConsumerKey(Configure::read("TWITTER_C_KEY"), Configure::read("TWITTER_C_SECRET"));        

        $cb = $twitter->getInstance();

        $cb->setToken(Configure::read("TWITTER_A_TOKEN"), Configure::read("TWITTER_A_SECRET"));        

        $reply = (array) $cb->statuses_userTimeline('rkiso');        

        $reply = $this->organizeData('twitter', $reply);

        return $reply;
    }

    function getFollowers(){
        App::import('Vendor', 'twitter', array('file' => 'twitter/codebird.php'));

        $twitter = new Codebird();
        $twitter->setConsumerKey(Configure::read("TWITTER_C_KEY"), Configure::read("TWITTER_C_SECRET"));        

        $cb = $twitter->getInstance();

        $cb->setToken(Configure::read("TWITTER_A_TOKEN"), Configure::read("TWITTER_A_SECRET"));        

        $reply = Cache::read('followers', 'default');  

        if(!$reply){
            $reply = (array) $cb->followers_ids('rkiso');
            $reply = $reply['ids'];
            Cache::write('followers', count($reply), 'default');
            $reply = count($reply);
        }        

        return $reply;
        
    }

    function getYoutube(){
        App::import('Vendor', 'youtube', array('file' => 'google/Google_Client.php'));
        App::import('Vendor', 'youtube_client', array('file' => 'google/contrib/Google_YoutubeService.php'));

        $client = new Google_Client();
        $client->setDeveloperKey(Configure::read("GOOGLE_KEY"));

        $youtube = new Google_YoutubeService($client);

        $searchResponse = $youtube->search->listSearch('id,snippet', array(
          'q' => '',
          'maxResults' => 10,
        ));

        $searchResponse = $this->organizeData('youtube', $searchResponse['items']);

        return $searchResponse;
    }

    function getGooglePlus(){
        App::import('Vendor', 'google_plus', array('file' => 'google/Google_Client.php'));
        App::import('Vendor', 'google_plus_client', array('file' => 'google/contrib/Google_PlusService.php'));

        $client = new Google_Client();
        $client->setDeveloperKey(Configure::read("GOOGLE_KEY"));

        $plus = new Google_PlusService($client);

        $activities = $plus->activities->listActivities('104132078588296123287', 'public');

        $activities = $this->organizeData('google_plus', $activities['items']);

        return $activities;
    }

    function getPlusCount(){
        App::import('Vendor', 'google_plus', array('file' => 'google/Google_Client.php'));
        App::import('Vendor', 'google_plus_client', array('file' => 'google/contrib/Google_PlusService.php'));

        $client = new Google_Client();
        $client->setDeveloperKey(Configure::read("GOOGLE_KEY"));

        $plus = new Google_PlusService($client);        

        $counts = Cache::read('google_plus_count', 'default');

        if(!$counts){
            $counts = $plus->people->get('104132078588296123287', array('fields' => 'plusOneCount'));        
            Cache::write('google_plus_count', $counts['plusOneCount'], 'default');
            $counts = $counts['plusOneCount'];
        }
            

        return $counts;
    }



    function getBlogFocusnetworks(){
        $xml = Xml::build('http://feeds.feedburner.com/focusview?format=xml');
        $xmlArray = Xml::toArray($xml);

        $xmlArray = $this->organizeData('blog_focusnetworks', $xmlArray['rss']['channel']['item']);

        return $xmlArray;
    }



}

?>