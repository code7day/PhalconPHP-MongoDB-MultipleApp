<?php
namespace Hawk;

class RBUtils
{
    /*  Pack sent data using "pack" and "base64"
        @param      - string    - data to pack
        @return     - string    - packed data
    */
    public function packData($data)
    {
        if ($data == '') { return; }
        return base64_encode(pack("a*", $data));
    }

    /*  Unpack data using "pack" and "base64"
        @param      - string    - data to unpack
        @return     - string    - unpacked data
    */
    public function unpackData($data)
    {
        if ($data == '') { return; }
        $u = unpack("a*",base64_decode($data));
        if (!isset($u[1])) { return; }
        return $u[1];
    }

    /*  Normalize a string for comparison or other purposes
        @param      - string    - data to normalize
        @param      - string    - character to use for normalization    - default "_"
        @return     - string    - normalize string
    */
    public function purify($data, $replacer = '') {
        if ($data == '') { return ''; }
        $search = array('&quot;','&#039;','#039;','#39;','`',',',' ','?','.',"'",'&amp;','&','(',')','[',']','{','}','\\','<','>',':',';','"','|','!','@','#','$','%','^','*','+','®','©','™','____','___','__');
        $replace = '_';
        $newString = trim(stripslashes(strip_tags(strtolower($data))));
        $newString = str_replace($search, $replace, $newString);
        $newString = trim($newString, '-');
        if ($replacer != '') {
            $newData = str_replace('_', $replacer, $newString);
        }
        return $newString;
    }

    /*  Create a fuzzy date based on passed time in seconds since 1970
        @param      - int       - time in seconds to fuzzy
        @return     - string    - fuzzyed date, e.g. 20 seconds ago
    */
    public function fuzzyDate($dateINT = 0) {
        $stf = 0;
        $currentTime = (int)strtotime("now");
        $difference = $currentTime - $dateINT;
        $phrase = array('socond', 'minute', 'hour', 'day', 'week', 'month', 'year');
        $length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560);
        $mainSplit = 0;
        foreach($length as $k => $v) {
            if ($v < $difference and intval($difference / $v) > 0) { $mainSplit = $v; $mainSplitKey = $k; }
        }
        
        $left = intval($difference / $mainSplit);
        $singular = '';
        $plural = 's';
        return $left.' '.$phrase[$mainSplitKey].($left == 1 ? $singular : $plural).' ago';
    }
}