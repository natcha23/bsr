<?php
class func{
    public function encrypt($sData, $secretKey){
        $sResult = '';
        for($i=0;$i<strlen($sData);$i++){
            $sChar    = substr($sData, $i, 1);
            $sKeyChar = substr($secretKey, ($i % strlen($secretKey)) - 1, 1);
            $sChar    = chr(ord($sChar) + ord($sKeyChar));
            $sResult .= $sChar;

        }
        return $this->encode_base64($sResult);
    }

    public function decrypt($sData, $secretKey){
        $sResult = '';
        $sData   = $this->decode_base64($sData);
        for($i=0;$i<strlen($sData);$i++){
            $sChar    = substr($sData, $i, 1);
            $sKeyChar = substr($secretKey, ($i % strlen($secretKey)) - 1, 1);
            $sChar    = chr(ord($sChar) - ord($sKeyChar));
            $sResult .= $sChar;
        }
        return $sResult;
    }

    public function encode_base64($sData){
        $sBase64 = base64_encode($sData);
        return str_replace('=', '', strtr($sBase64, '+/', '-_'));
    }

    public function decode_base64($sData){
        $sBase64 = strtr($sData, '-_', '+/');
        return base64_decode($sBase64.'==');
    }
}