<?php
namespace Webazon\Prng;


class Glob{
	private $GLOBALS =array('x' => 0,'y' => 0, 'z' => 0, 'c' => 0);
	private $INIT=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	
}


class Prng{
	
	function __construct($pass = '') {
			
			$p=iconv('utf-8','windows-1251',$pass);	
			for ($i=0; $i<16; $i++)
				{
				$INIT[$i]=ord(substr($pass,$i,1));

				}

			$GLOBALS['x']=$INIT[3]*16777216+$INIT[2]*65536+$INIT[1]*256+$INIT[0];
			$GLOBALS['y']=$INIT[7]*16777216+$INIT[6]*65536+$INIT[5]*256+$INIT[4];
			$GLOBALS['z']=$INIT[11]*16777216+$INIT[10]*65536+$INIT[9]*256+$INIT[8];
			$GLOBALS['c']=$INIT[15]*16777216+$INIT[14]*65536+$INIT[13]*256+$INIT[12];

			}
function KissRandomIniPasswordPhp($pass)
{
$p=iconv('utf-8','windows-1251',$pass);	
for ($i=0; $i<16; $i++)
	{
	$INIT[$i]=ord(substr($pass,$i,1));

	}

$GLOBALS['x']=$INIT[3]*16777216+$INIT[2]*65536+$INIT[1]*256+$INIT[0];
$GLOBALS['y']=$INIT[7]*16777216+$INIT[6]*65536+$INIT[5]*256+$INIT[4];
$GLOBALS['z']=$INIT[11]*16777216+$INIT[10]*65536+$INIT[9]*256+$INIT[8];
$GLOBALS['c']=$INIT[15]*16777216+$INIT[14]*65536+$INIT[13]*256+$INIT[12];

	
}	
	function KissRandomPhp()
{
	
	$GLOBALS['x'] = 69069*$GLOBALS['x'] + 12345;
	$GLOBALS['x'] = $GLOBALS['x']%4294967296;
	$GLOBALS['y'] = $GLOBALS['y'] ^ ($GLOBALS['y'] << 13);
	$GLOBALS['y'] = $GLOBALS['y']%4294967296;
	$GLOBALS['y'] = $GLOBALS['y'] ^ ($GLOBALS['y'] >> 17);
	$GLOBALS['y'] = $GLOBALS['y']%4294967296;
	$GLOBALS['y'] = $GLOBALS['y'] ^ ($GLOBALS['y'] << 5);
	$GLOBALS['y'] = $GLOBALS['y']%4294967296;
	
	$t = 698769069*$GLOBALS['z'] + $GLOBALS['c'];
	$t = $t%4294967296;
	$GLOBALS['c'] = $t >> 7;
	$GLOBALS['c'] = $GLOBALS['c']%4294967296;
	$GLOBALS['z']=$t;

	$re=$GLOBALS['x']+$GLOBALS['y']+$GLOBALS['z'];
	$re=$re%256;	
	return $re;
	
}



function kiss_encrypt($value)
{
$res = $value ^ $this -> KissRandomPhp();
$GLOBALS['z']=$res*123456;
return $res;
}
function kiss_decrypt($value)
{
$res = $value ^ $this -> KissRandomPhp();
$GLOBALS['z']=$value*123456;
return $res;	
}


function kiss_encrypts($value)
{
if (strlen($value)>0)
	{
	$res='';
	for ($i=0;$i<strlen($value);$i++)
		{
		$res=$res.kiss_encrypt(ord(substr($value,0,1)));	
			
		}
	
	
	}
else {return false;exit;}
return $res;	
	
}

function KissEncrypt($CryptedData,$password='',$isBase64 = false)
{
$res=false;
$a=array();
array_push($a,0x50);array_push($a,0x52);array_push($a,0x4e);array_push($a,0x47);
$l=mb_strlen($CryptedData,'UTF-8');
array_push($a,$l % 256);array_push($a,floor($l / 256));array_push($a,floor($l / 65536));array_push($a,floor($l / 16777216));
$md5d=md5($CryptedData,true);
for ($i=0;$i<16;$i++){array_push($a,ord($md5d[$i]));}
array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));array_push($a,rand(0,255));
$this -> KissRandomIniPasswordPhp($password);
for ($i=24;$i<32;$i++){$a[$i]=$this -> kiss_encrypt($a[$i]);}
for($i=0;$i<strlen($CryptedData);$i++){array_push($a,$this -> kiss_encrypt(ord($CryptedData[$i])));}



for ($i=0;$i<count($a);$i++){$res=$res.chr($a[$i]);};

if ($isBase64){$res=base64_encode($res);}
return $res;
}

function KissDecrypt($CryptedData,$password = '')
{
	$data = $CryptedData;
    if (base64_decode($data, true) === false) {
	} else {
		$CryptedData = base64_decode($CryptedData);

    }	
$res=false;	
$cr=array();
for ($i=0;$i<strlen($CryptedData);$i++){array_push($cr,ord($CryptedData[$i]));}
if ($cr[0]=0x50 && $cr[1]==0x52 && $cr[2]==0x4e && $cr[3]==0x47)
	{
	$md5cr='';
	for ($i=8;$i<24;$i++){$md5cr=$md5cr.chr($cr[$i]);}
	
	
	$this -> KissRandomIniPasswordPhp($password);
	for ($i=24;$i<count($cr);$i++){$cr[$i]=$this -> kiss_decrypt($cr[$i]);}

	$res='';
	for ($i=32;$i<count($cr);$i++){$res=$res.chr($cr[$i]);}
	if ($md5cr==md5($res,true))
		{
		}else{$res=false;}
	}
return $res;
}
	
	
	
}





?>