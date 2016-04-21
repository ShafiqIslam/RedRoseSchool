<?php

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {
	public $components = array(
        'Session', 'RequestHandler','Cookie',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'authError' => 'You are not allowed',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'password')
                )
            )
        )
    );
    
    public function beforeFilter(){
        // set cookie options
        $this->Cookie->key = 'klgjs&*(#fsdfsdfsdf%(54646tqwdsuhf&*^Hjhsdgf5465464';
        $this->Cookie->httpOnly = true;
        if($this->params['admin']){
            $this->layout = 'admin';
        }
        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');
            //print_r($cookie); exit;
            $this->loadModel('User');
            $user = $this->CmsUser->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password'],
                    //'User.role' => 'admin'
                )
            ));

            if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/users/logout'); // destroy session & cookie
            }
        }
        $this->Auth->allow('display');
    }
    
    //upload image
    function _upload($file, $folder = null, $fileName = null){
        App::import('Vendor', 'phpthumb', array('file' => 'phpthumb' . DS . 'phpthumb.class.php'));
        if(is_uploaded_file($file['tmp_name'])){
            $ext  = strtolower(array_pop(explode('.',$file['name'])));
            if($ext == 'txt') $ext = 'jpg';
            $fileName = time() . rand(1,999) . '.' .$ext;
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                $uplodFile = WWW_ROOT.'files'.DS. $folder . DS .$fileName;
                if(move_uploaded_file($file['tmp_name'],$uplodFile)){
                    $dest_small = WWW_ROOT . 'files' . DS . $folder . DS . 'small' . DS . $fileName;                    
                    $this->_orientation($uplodFile, $uplodFile);
                    //@unlink($uplodFile);
                    return $fileName;
                }
            }
        }
    }
    private function _orientation($src, $dest_large){
        $phpThumb = new phpThumb();
        $phpThumb->resetObject();
        $capture_raw_data = false;
        $phpThumb->setSourceFilename($src);
        $phpThumb->setParameter('ar', 'x');     #auto rotate the image, no need to exif()
        $phpThumb->setParameter('f', 'jpeg');   # save output as jpg
        $phpThumb->GenerateThumbnail();
        $phpThumb->RenderToFile($dest_large);
    }
    //image resize
    function _resize($src, $dest_small){
	    $phpThumb = new phpThumb();
	    $phpThumb->resetObject();
	    $capture_raw_data = false;
	    $phpThumb->setSourceFilename($src);
	    $phpThumb->setParameter('w', 500);
	    $phpThumb->setParameter('h', 400);
	    $phpThumb->setParameter('ar', 'x');     #auto rotate the image, no need to exif()
	    $phpThumb->setParameter('f', 'jpeg');   # save output as jpg
	    //$phpThumb->setParameter('zc', 1);
	    $phpThumb->GenerateThumbnail();
	    $phpThumb->RenderToFile($dest_small);
	}

    public function random_string($len, $num=0, $alpha=0, $spec_char=0) {
        $alphabets = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "0123456789";
        $special_characters = "!@#$%^&*()_-+=}{][|:;.,/?";

        $characters = "";
        if($num)
            $characters .= $numbers;
        if($alpha)
            $characters .= $alphabets;
        if($spec_char)
            $characters .= $special_characters;
        if(!$num && !$alpha && !$spec_char)
            $characters .= $numbers.$alphabets.$special_characters;

        $rand_string = '';
        for ($i = 0; $i < $len; $i++) {
            $rand_string .= $characters[mt_rand(0, strlen($characters)-1)];
        }

        return $rand_string;
    }

    function _upload_file($file, $folder = null, $fileName = null) {
        if(is_uploaded_file($file['tmp_name'])){
            $ext  = strtolower(array_pop(explode('.',$file['name'])));
            $fileName = time() . rand(1,999) . '.' .$ext;
            if($ext == 'pdf'){
                $uplodFile = WWW_ROOT.'files'.DS. $folder . DS .$fileName;
                if(move_uploaded_file($file['tmp_name'],$uplodFile)){
                    $dest_small = WWW_ROOT . 'files' . DS . $folder . DS . 'small' . DS . $fileName;
                    return $fileName;
                }
            }
        }
    }

    public function send_sms($phone, $msg) {
        $SmsUrl='http://smsgateway121114.localdnszone.com:8080/bulksms/bulksms';
        $SmsUserName = 'iloc-rosered';
        $SmsPassword = '873R03';
        $SenderDestination = '88' . $phone;
        $SenderNameOrNumber = 'Red%20Rose';
        $SenderMessage = str_replace(" ","%20", trim($msg));;

        $Q = "$SmsUrl?username=$SmsUserName&password=$SmsPassword&type=0&dlr=0&destination=$SenderDestination&source=$SenderNameOrNumber&message=$SenderMessage";
        # http://smsgateway121114.localdnszone.com:8080/bulksms/bulksms?username=YOUR_USER_NAME_HERE&password=YOUR_PASSWORD_HERE&type=0&dlr=0&destination=8801000000000&source=My%20Brand&message=This%20is%20a%20test%20message%20!

        utf8_decode($Q);
        $res = implode ('', file($Q));

        $SmppResult=explode ('|', $res);
        $SmppResult=$SmppResult['0'];

        $success = false;

        switch ($SmppResult) {
            case 1701:
                $success = true;
                $response = "SMS Sent!";
                break;
            case 1702:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid URL Error.";
                break;
            case 1703:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid value in SMPP username or SMPP password field.</b>";
                break;
            case 1704:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid value in 'type' field.</b>";
                break;
            case 1705:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid Message.";
                break;
            case 1706:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid Destination.";
                break;
            case 1707:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid Source (Sender).";
                break;
            case 1708:
                $response = "Error: SMPP Server Result: $SmppResult - Invalid value for 'dlr' field.";
                break;
            case 1709:
                $response = "Error: SMPP Server Result: $SmppResult - User validation failed.";
                break;
            case 1710:
                $response = "Error: SMPP Server Result: $SmppResult - Internal Error.";
                break;
            case 1025:
                $response = "Error: SMPP Server Result: $SmppResult - Insufficient Credit in SMPP Account.";
                break;

            default:
                $response = "Error: SMPP Server Result: $SmppResult - Unknown Error! Please contact to Admin.";

        }

        $data['success'] = $success;
        $data['response'] = $response;
        #AuthComponent::_setTrace($data);
        return $data;
    }
}
