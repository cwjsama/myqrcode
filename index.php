<?php

	include './vendor/autoload.php';
	
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\LabelAlignment;

	$address=$_POST['address'];
	$qrsize=$_POST['qrsize'];
	$imgsize=$_POST['imgsize'];

	if(is_uploaded_file($_FILES['inputfile']['tmp_name'])){
		$tmp_name=$_FILES['inputfile']['tmp_name'];
		move_uploaded_file($tmp_name,"./vendor/endroid/qrcode/assets/qrimg.jpg");
	}

	//http://myneeds.cn/#/downfile
	$qrCode = new QrCode($address);
	$qrCode->setSize($qrsize)
	 ->setLogoWidth($imgsize)
	 ->setLogoPath("./vendor/endroid/qrcode/assets/qrimg.jpg");

	header('Content-Type: '.$qrCode->getContentType());
	echo $qrCode->writeString();
