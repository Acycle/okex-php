<?php


/**
 * @author lin <465382251@qq.com>
 * 
 * Fill in your key and secret and pass can be directly run
 * 
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/okex-php.git
 * */
use Lin\Okex\OkexFuture;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$okex=new OkexFuture($key,$secret,$passphrase);

//Set the request timeout to 60 seconds by default
//$okex->setTimeOut(10);

//This endpoint supports getting the list of assets(only show pairs with balance larger than 0), the balances, amount available/on hold in spot accounts.
try {
    $result=$okex->account()->getAll();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//This endpoint supports getting the balance, amount available/on hold of a token in spot account.
try {
    $result=$okex->account()->get([
        'currency'=>'BTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//All paginated requests return the latest information (newest) as the first page sorted by newest (in chronological time) first.
try {
    $result=$okex->account()->getLedger([
        'currency'=>'btc',
        'limit'=>2,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
