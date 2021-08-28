<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Aduan kerosakan</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">
	 <?php include('leftbar.php');?>  
	<div id="page-wrapper">
<?php

//session_start();
//require ('cons.php');

require ('../config/dbconnect.php');

$todaydate = date('Y-m-d');
$todaydate2 = date('d-m-Y');

//$nomykad	= $_GET['nomykad'];			// noic
//$randomno	= $_GET['randomno'];	
$status		= 1;

    $querycheck   	= "SELECT * FROM tablepengguna where nokadpengenalan='$user2'";
	$resultcheck   	= mysql_query($querycheck) or die(mysql_error());
	$totalcheck		= mysql_num_rows($resultcheck);
	
	$datacheck = mysql_fetch_array($resultcheck);

	$fnama = $datacheck['namapemohon'];
	$fnomykad = $datacheck['nokadpengenalan'];
	$fnotel = $datacheck['notel'];
	$fid = $datacheck['id'];
	$fjabatan= $datacheck['jabatan'];


//jabatan
	$queryjabatan   	= "SELECT * FROM tablejabatan where kodjabatan= '$fjabatan'";
	$resultjabatan   	= mysql_query($queryjabatan) or die(mysql_error());
	$totaljabatan		= mysql_num_rows($resultjabatan);
	
	$datajabatan = mysql_fetch_array($resultjabatan);
	
	$fjabat= $datajabatan['kodjabatan'];
// //lokasi
	$querylokasi 	= "SELECT * FROM tbllokasi where l_jabatan = '$fjabatan'";
	$resultlokasi   	= mysql_query($querylokasi) or die(mysql_error());
	$totallokasi		= mysql_num_rows($resultlokasi);
	
	$datalokasi = mysql_fetch_array($resultlokasi);
	
	$flokasi = $datalokasi['l_id'];
	
	
?> 
<?php
if(isset($_POST['HANTAR']) == "HANTAR")
{

$fbangunan		=	$_POST['fbangunan'];
$falamat		=	$_POST['falamat'];
$fjenisbinaan	=	$_POST['fjenisbinaan'];
$fjenisrumah	=	$_POST['fjenisrumah'];
$fjumbil		=	$_POST['fjumbil'];
$fcegahbakar	=	$_POST['fcegahbakar'];
$fperiksa		=	$_POST['fperiksa'];
$ffblanket		=	$_POST['ffblanket'];
$ffext			=	$_POST['ffext'];
$fsoket			=	$_POST['fsoket'];
$fsoketc		=	$_POST['fsoketc'];
$fkipas			=	$_POST['fkipas'];
$fkipasc		=	$_POST['fkipasc'];
$flampu			=	$_POST['flampu'];
$flampuc		=	$_POST['flampuc'];
$fdawai			=	$_POST['fdawai'];
$fdawaic		=	$_POST['fdawaic'];
$flaine			=	$_POST['flaine'];
$ftekananair	=	$_POST['ftekananair'];
$ftekananairc	=	$_POST['ftekananairc'];
$fhawadingin	=	$_POST['fhawadingin'];
$fhawadinginc	=	$_POST['fhawadinginc'];
$ftangkiseptik	=	$_POST['ftangkiseptik'];
$ftangkiseptikc	=	$_POST['ftangkiseptikc'];
$fpambocor		=	$_POST['fpambocor'];
$fpambocorc		=	$_POST['fpambocorc'];
$fsinkibocor	=	$_POST['fsinkibocor'];
$fsinkibocorc	=	$_POST['fsinkibocorc'];
$fpaippecah		=	$_POST['fpaippecah'];
$fpaippecahc	=	$_POST['fpaippecahc'];
$flainm			=	$_POST['flainm'];
$fretak			=	$_POST['fretak'];
$fretakc		=	$_POST['fretakc'];
$fpatah			=	$_POST['fpatah'];
$fpatahc		=	$_POST['fpatahc'];
$fcabut			=	$_POST['fcabut'];
$fcabutc		=	$_POST['fcabutc'];
$fbocor			=	$_POST['fbocor'];
$fbocorc		=	$_POST['fbocorc'];
$fkarat			=	$_POST['fkarat'];
$fkaratc		=	$_POST['fkaratc'];
$freput			=	$_POST['freput'];
$freputc		=	$_POST['freputc'];
$fanai			=	$_POST['fanai'];
$fanaic			=	$_POST['fanaic'];
$fkelawar		=	$_POST['fkelawar'];
$fkelawarc		=	$_POST['fkelawarc'];
$ftutup			=	$_POST['ftutup'];
$ftutupc		=	$_POST['ftutupc'];
$ftanahruntuh	=	$_POST['ftanahruntuh'];
$ftanahruntuhc	=	$_POST['ftanahruntuhc'];
$fteduhan		=	$_POST['fteduhan'];
$fteduhanc		=	$_POST['fteduhanc'];
$ftembok		=	$_POST['ftembok'];
$ftembokc		=	$_POST['ftembokc'];
$ftaman			=	$_POST['ftaman'];
$ftamanc		=	$_POST['ftamanc'];
$fpagar			=	$_POST['fpagar'];
$fpagarc		=	$_POST['fpagarc'];
$flongkang		=	$_POST['flongkang'];
$flongkangc		=	$_POST['flongkangc'];
$fparkir		=	$_POST['fparkir'];
$fparkirc		=	$_POST['fparkirc'];
$flampukawasan	=	$_POST['flampukawasan'];
$flampukawasanc	=	$_POST['flampukawasanc'];
$flamputangga	=	$_POST['flamputangga'];
$flamputanggac	=	$_POST['flamputanggac'];
$ftanggapecah	=	$_POST['ftanggapecah'];
$ftanggapecahc	=	$_POST['ftanggapecahc'];
$flifrosak		=	$_POST['flifrosak'];
$flifrosakc		=	$_POST['flifrosakc'];
$fhangit		=	$_POST['fhangit'];
$fhangitc		=	$_POST['fhangitc'];
$fpercikanapi	=	$_POST['fpercikanapi'];
$fpercikanapic	=	$_POST['fpercikanapic'];
$flainlain		=	$_POST['flainlain'];
$fpintuutama	=	$_POST['fpintuutama'];
$fpintuutamas	=	$_POST['fpintuutamas'];
$fpintuutamac	=	$_POST['fpintuutamac'];
$fbilikutama	=	$_POST['fbilikutama'];
$fbilikutamas	=	$_POST['fbilikutamas'];
$fbilikutamac	=	$_POST['fbilikutamac'];
$fbilikdua		=	$_POST['fbilikdua'];
$fbilikduas		=	$_POST['fbilikduas'];
$fbilikduac		=	$_POST['fbilikduac'];
$fbiliktiga		=	$_POST['fbiliktiga'];
$fbiliktigas	=	$_POST['fbiliktigas'];
$fbiliktigac	=	$_POST['fbiliktigac'];
$fbilikempat	=	$_POST['fbilikempat'];
$fbilikempats	=	$_POST['fbilikempats'];
$fbilikempatc	=	$_POST['fbilikempatc'];
$fstor			=	$_POST['fstor'];
$fstors			=	$_POST['fstors'];
$fstorc			=	$_POST['fstorc'];
$fdapur			=	$_POST['fdapur'];
$fdapurs		=	$_POST['fdapurs'];
$fdapurc		=	$_POST['fdapurc'];
$fruangmakan	=	$_POST['fruangmakan'];
$fruangmakans	=	$_POST['fruangmakans'];
$fruangmakanc	=	$_POST['fruangmakanc'];
$fpantri		=	$_POST['fpantri'];
$fpantris		=	$_POST['fpantris'];
$fpantric		=	$_POST['fpantric'];
$fmetertnb		=	$_POST['fmetertnb'];
$fmetertnbb		=	$_POST['fmetertnbb'];
$fmetertnbc		=	$_POST['fmetertnbc'];
$fmetersaj		=	$_POST['fmetersaj'];
$fmetersajb		=	$_POST['fmetersajb'];
$fmetersajc		=	$_POST['fmetersajc'];
$fpedestal		=	$_POST['fpedestal'];
$fpedestals		=	$_POST['fpedestals'];
$fpedestalc		=	$_POST['fpedestalc'];
$fshower		=	$_POST['fshower'];
$fshowers		=	$_POST['fshowers'];
$fshowerc		=	$_POST['fshowerc'];
$fwashbasin		=	$_POST['fwashbasin'];
$fwashbasins	=	$_POST['fwashbasins'];
$fwashbasinc	=	$_POST['fwashbasinc'];
$fholder		=	$_POST['fholder'];
$fholders		=	$_POST['fholders'];
$fholderc		=	$_POST['fholderc'];
$fsoap			=	$_POST['fsoap'];
$fsoaps			=	$_POST['fsoaps'];
$fsoapc			=	$_POST['fsoapc'];
$fbib			=	$_POST['fbib'];
$fbibs			=	$_POST['fbibs'];
$fbibc			=	$_POST['fbibc'];
$fpedestal2		=	$_POST['fpedestal2'];
$fpedestal2s	=	$_POST['fpedestal2s'];
$fpedestal2c	=	$_POST['fpedestal2c'];
$fshower2		=	$_POST['fshower2'];
$fshower2s		=	$_POST['fshower2s'];
$fshower2c		=	$_POST['fshower2c'];
$fwashbasin2	=	$_POST['fwashbasin2'];
$fwashbasin2s	=	$_POST['fwashbasin2s'];
$fwashbasin2c	=	$_POST['fwashbasin2c'];
$fholder2		=	$_POST['fholder2'];
$fholder2s		=	$_POST['fholder2s'];
$fholder2c		=	$_POST['fholder2c'];
$fsoap2			=	$_POST['fsoap2'];
$fsoap2s		=	$_POST['fsoap2s'];
$fsoap2c		=	$_POST['fsoap2c'];
$fbib2			=	$_POST['fbib2'];
$fbib2s			=	$_POST['fbib2s'];
$fbib2c			=	$_POST['fbib2c'];
$fpedestal3		=	$_POST['fpedestal3'];
$fpedestal3s	=	$_POST['fpedestal3s'];
$fpedestal3c	=	$_POST['fpedestal3c'];
$fshower3		=	$_POST['fshower3'];
$fshower3s		=	$_POST['fshower3s'];
$fshower3c		=	$_POST['fshower3c'];
$fwashbasin3	=	$_POST['fwashbasin3'];
$fwashbasin3s	=	$_POST['fwashbasin3s'];
$fwashbasin3c	=	$_POST['fwashbasin3c'];
$fholder3		=	$_POST['fholder3'];
$fholder3s		=	$_POST['fholder3s'];
$fholder3c		=	$_POST['fholder3c'];
$fsoap3			=	$_POST['fsoap3'];
$fsoap3s		=	$_POST['fsoap3s'];
$fsoap3c		=	$_POST['fsoap3c'];
$fbib3			=	$_POST['fbib3'];
$fbib3s			=	$_POST['fbib3s'];
$fbib3c			=	$_POST['fbib3c'];
$fkitchensink	=	$_POST['fkitchensink'];
$fkitchensinks	=	$_POST['fkitchensinks'];
$fkitchensinkc	=	$_POST['fkitchensinkc'];
$fbibtap		=	$_POST['fbibtap'];
$fbibtaps		=	$_POST['fbibtaps'];
$fbibtapc		=	$_POST['fbibtapc'];
$fbibtapy		=	$_POST['fbibtapy'];
$fbibtapys		=	$_POST['fbibtapys'];
$fbibtapyc		=	$_POST['fbibtapyc'];
$flighting		=	$_POST['flighting'];
$flightings		=	$_POST['flightings'];
$flightingc		=	$_POST['flightingc'];
$ffanpoint		=	$_POST['ffanpoint'];
$ffanpoints		=	$_POST['ffanpoints'];
$ffanpointc		=	$_POST['ffanpointc'];
$fpowerpoint	=	$_POST['fpowerpoint'];
$fpowerpoints	=	$_POST['fpowerpoints'];
$fpowerpointc	=	$_POST['fpowerpointc'];
$fphonepoint	=	$_POST['fphonepoint'];
$fphonepoints	=	$_POST['fphonepoints'];
$fphonepointc	=	$_POST['fphonepointc'];
$ftvpoint		=	$_POST['ftvpoint'];
$ftvpoints		=	$_POST['ftvpoints'];
$ftvpointc		=	$_POST['ftvpointc'];
$fheaterpoint	=	$_POST['fheaterpoint'];
$fheaterpoints	=	$_POST['fheaterpoints'];
$fheaterpointc	=	$_POST['fheaterpointc'];
$faircondpoint	=	$_POST['faircondpoint'];
$faircondpoints	=	$_POST['faircondpoints'];
$faircondpointc	=	$_POST['faircondpointc'];
$fgatepoint		=	$_POST['fgatepoint'];
$fgatepoints	=	$_POST['fgatepoints'];
$fgatepointc	=	$_POST['fgatepointc'];
  
printf("<script> alert('ADUAN ANDA TELAH DI HANTAR.'); window.location ='kendiri.php?nomykad=$fnomykad' </script>");

$querylast = "INSERT into tblkendiri 

(ftarikh,
fbangunan,
falamat,
fjenisbinaan,
fjenisrumah,
fjumbil,
fcegahbakar,
fperiksa,
ffblanket,
ffext,
fsoket,
fsoketc,
fkipas,
fkipasc,
flampu,
flampuc,
fdawai,
fdawaic,
flaine,
ftekananair,
ftekananairc,
fhawadingin,
fhawadinginc,
ftangkiseptik,
ftangkiseptikc,
fpambocor,
fpambocorc,
fsinkibocor,
fsinkibocorc,
fpaippecah,
fpaippecahc,
flainm,
fretak,
fretakc,
fpatah,
fpatahc,
fcabut,
fcabutc,
fbocor,
fbocorc,
fkarat,
fkaratc,
freput,
freputc,
fanai,
fanaic,
fkelawar,
fkelawarc,
ftutup,
ftutupc,
ftanahruntuh,
ftanahruntuhc,
fteduhan,
fteduhanc,
ftembok,
ftembokc,
ftaman,
ftamanc,
fpagar,
fpagarc,
flongkang,
flongkangc,
fparkir,
fparkirc,
flampukawasan,
flampukawasanc,
flamputangga,
flamputanggac,
ftanggapecah,
ftanggapecahc,
flifrosak,
flifrosakc,
fhangit,
fhangitc,
fpercikanapi,
fpercikanapic,
flainlain,
fpintuutama,
fpintuutamas,
fpintuutamac,
fbilikutama,
fbilikutamas,
fbilikutamac,
fbilikdua,
fbilikduas,
fbilikduac,
fbiliktiga,
fbiliktigas,
fbiliktigac,
fbilikempat,
fbilikempats,
fbilikempatc,
fstor,
fstors,
fstorc,
fdapur,
fdapurs,
fdapurc,
fruangmakan,
fruangmakans,
fruangmakanc,
fpantri,
fpantris,
fpantric,
fmetertnb,
fmetertnbb,
fmetertnbc,
fmetersaj,
fmetersajb,
fmetersajc,
fpedestal,
fpedestals,
fpedestalc,
fshower,
fshowers,
fshowerc,
fwashbasin,
fwashbasins,
fwashbasinc,
fholder,
fholders,
fholderc,
fsoap,
fsoaps,
fsoapc,
fbib,
fbibs,
fbibc,
fpedestal2,
fpedestal2s,
fpedestal2c,
fshower2,
fshower2s,
fshower2c,
fwashbasin2,
fwashbasin2s,
fwashbasin2c,
fholder2,
fholder2s,
fholder2c,
fsoap2,
fsoap2s,
fsoap2c,
fbib2,
fbib2s,
fbib2c,
fpedestal3,
fpedestal3s,
fpedestal3c,
fshower3,
fshower3s,
fshower3c,
fwashbasin3,
fwashbasin3s,
fwashbasin3c,
fholder3,
fholder3s,
fholder3c,
fsoap3,
fsoap3s,
fsoap3c,
fbib3,
fbib3s,
fbib3c,
fkitchensink,
fkitchensinks,
fkitchensinkc,
fbibtap,
fbibtaps,
fbibtapc,
fbibtapy,
fbibtapys,
fbibtapyc,
flighting,
flightings,
flightingc,
ffanpoint,
ffanpoints,
ffanpointc,
fpowerpoint,
fpowerpoints,
fpowerpointc,
fphonepoint,
fphonepoints,
fphonepointc,
ftvpoint,
ftvpoints,
ftvpointc,
fheaterpoint,
fheaterpoints,
fheaterpointc,
faircondpoint,
faircondpoints,
faircondpointc,
fgatepoint,
fgatepoints,
fgatepointc,
kidstaff,
kjabatan,
flokasi

)

 VALUES(
'".mysql_real_escape_string($todaydate)."',
'".mysql_real_escape_string($fbangunan)."',
'".mysql_real_escape_string($falamat)."',
'".mysql_real_escape_string($fjenisbinaan)."',
'".mysql_real_escape_string($fjenisrumah)."',
'".mysql_real_escape_string($fjumbil)."',
'".mysql_real_escape_string($fcegahbakar)."',
'".mysql_real_escape_string($fperiksa)."',
'".mysql_real_escape_string($ffblanket)."',
'".mysql_real_escape_string($ffext)."',
'".mysql_real_escape_string($fsoket)."',
'".mysql_real_escape_string($fsoketc)."',
'".mysql_real_escape_string($fkipas)."',
'".mysql_real_escape_string($fkipasc)."',
'".mysql_real_escape_string($flampu)."',
'".mysql_real_escape_string($flampuc)."',
'".mysql_real_escape_string($fdawai)."',
'".mysql_real_escape_string($fdawaic)."',
'".mysql_real_escape_string($flaine)."',
'".mysql_real_escape_string($ftekananair)."',
'".mysql_real_escape_string($ftekananairc)."',
'".mysql_real_escape_string($fhawadingin)."',
'".mysql_real_escape_string($fhawadinginc)."',
'".mysql_real_escape_string($ftangkiseptik)."',
'".mysql_real_escape_string($ftangkiseptikc)."',
'".mysql_real_escape_string($fpambocor)."',
'".mysql_real_escape_string($fpambocorc)."',
'".mysql_real_escape_string($fsinkibocor)."',
'".mysql_real_escape_string($fsinkibocorc)."',
'".mysql_real_escape_string($fpaippecah)."',
'".mysql_real_escape_string($fpaippecahc)."',
'".mysql_real_escape_string($flainm)."',
'".mysql_real_escape_string($fretak)."',
'".mysql_real_escape_string($fretakc)."',
'".mysql_real_escape_string($fpatah)."',
'".mysql_real_escape_string($fpatahc)."',
'".mysql_real_escape_string($fcabut)."',
'".mysql_real_escape_string($fcabutc)."',
'".mysql_real_escape_string($fbocor)."',
'".mysql_real_escape_string($fbocorc)."',
'".mysql_real_escape_string($fkarat)."',
'".mysql_real_escape_string($fkaratc)."',
'".mysql_real_escape_string($freput)."',
'".mysql_real_escape_string($freputc)."',
'".mysql_real_escape_string($fanai)."',
'".mysql_real_escape_string($fanaic)."',
'".mysql_real_escape_string($fkelawar)."',
'".mysql_real_escape_string($fkelawarc)."',
'".mysql_real_escape_string($ftutup)."',
'".mysql_real_escape_string($ftutupc)."',
'".mysql_real_escape_string($ftanahruntuh)."',
'".mysql_real_escape_string($ftanahruntuhc)."',
'".mysql_real_escape_string($fteduhan)."',
'".mysql_real_escape_string($fteduhanc)."',
'".mysql_real_escape_string($ftembok)."',
'".mysql_real_escape_string($ftembokc)."',
'".mysql_real_escape_string($ftaman)."',
'".mysql_real_escape_string($ftamanc)."',
'".mysql_real_escape_string($fpagar)."',
'".mysql_real_escape_string($fpagarc)."',
'".mysql_real_escape_string($flongkang)."',
'".mysql_real_escape_string($flongkangc)."',
'".mysql_real_escape_string($fparkir)."',
'".mysql_real_escape_string($fparkirc)."',
'".mysql_real_escape_string($flampukawasan)."',
'".mysql_real_escape_string($flampukawasanc)."',
'".mysql_real_escape_string($flamputangga)."',
'".mysql_real_escape_string($flamputanggac)."',
'".mysql_real_escape_string($ftanggapecah)."',
'".mysql_real_escape_string($ftanggapecahc)."',
'".mysql_real_escape_string($flifrosak)."',
'".mysql_real_escape_string($flifrosakc)."',
'".mysql_real_escape_string($fhangit)."',
'".mysql_real_escape_string($fhangitc)."',
'".mysql_real_escape_string($fpercikanapi)."',
'".mysql_real_escape_string($fpercikanapic)."',
'".mysql_real_escape_string($flainlain)."',
'".mysql_real_escape_string($fpintuutama)."',
'".mysql_real_escape_string($fpintuutamas)."',
'".mysql_real_escape_string($fpintuutamac)."',
'".mysql_real_escape_string($fbilikutama)."',
'".mysql_real_escape_string($fbilikutamas)."',
'".mysql_real_escape_string($fbilikutamac)."',
'".mysql_real_escape_string($fbilikdua)."',
'".mysql_real_escape_string($fbilikduas)."',
'".mysql_real_escape_string($fbilikduac)."',
'".mysql_real_escape_string($fbiliktiga)."',
'".mysql_real_escape_string($fbiliktigas)."',
'".mysql_real_escape_string($fbiliktigac)."',
'".mysql_real_escape_string($fbilikempat)."',
'".mysql_real_escape_string($fbilikempats)."',
'".mysql_real_escape_string($fbilikempatc)."',
'".mysql_real_escape_string($fstor)."',
'".mysql_real_escape_string($fstors)."',
'".mysql_real_escape_string($fstorc)."',
'".mysql_real_escape_string($fdapur)."',
'".mysql_real_escape_string($fdapurs)."',
'".mysql_real_escape_string($fdapurc)."',
'".mysql_real_escape_string($fruangmakan)."',
'".mysql_real_escape_string($fruangmakans)."',
'".mysql_real_escape_string($fruangmakanc)."',
'".mysql_real_escape_string($fpantri)."',
'".mysql_real_escape_string($fpantris)."',
'".mysql_real_escape_string($fpantric)."',
'".mysql_real_escape_string($fmetertnb)."',
'".mysql_real_escape_string($fmetertnbb)."',
'".mysql_real_escape_string($fmetertnbc)."',
'".mysql_real_escape_string($fmetersaj)."',
'".mysql_real_escape_string($fmetersajb)."',
'".mysql_real_escape_string($fmetersajc)."',
'".mysql_real_escape_string($fpedestal)."',
'".mysql_real_escape_string($fpedestals)."',
'".mysql_real_escape_string($fpedestalc)."',
'".mysql_real_escape_string($fshower)."',
'".mysql_real_escape_string($fshowers)."',
'".mysql_real_escape_string($fshowerc)."',
'".mysql_real_escape_string($fwashbasin)."',
'".mysql_real_escape_string($fwashbasins)."',
'".mysql_real_escape_string($fwashbasinc)."',
'".mysql_real_escape_string($fholder)."',
'".mysql_real_escape_string($fholders)."',
'".mysql_real_escape_string($fholderc)."',
'".mysql_real_escape_string($fsoap)."',
'".mysql_real_escape_string($fsoaps)."',
'".mysql_real_escape_string($fsoapc)."',
'".mysql_real_escape_string($fbib)."',
'".mysql_real_escape_string($fbibs)."',
'".mysql_real_escape_string($fbibc)."',
'".mysql_real_escape_string($fpedestal2)."',
'".mysql_real_escape_string($fpedestal2s)."',
'".mysql_real_escape_string($fpedestal2c)."',
'".mysql_real_escape_string($fshower2)."',
'".mysql_real_escape_string($fshower2s)."',
'".mysql_real_escape_string($fshower2c)."',
'".mysql_real_escape_string($fwashbasin2)."',
'".mysql_real_escape_string($fwashbasin2s)."',
'".mysql_real_escape_string($fwashbasin2c)."',
'".mysql_real_escape_string($fholder2)."',
'".mysql_real_escape_string($fholder2s)."',
'".mysql_real_escape_string($fholder2c)."',
'".mysql_real_escape_string($fsoap2)."',
'".mysql_real_escape_string($fsoap2s)."',
'".mysql_real_escape_string($fsoap2c)."',
'".mysql_real_escape_string($fbib2)."',
'".mysql_real_escape_string($fbib2s)."',
'".mysql_real_escape_string($fbib2c)."',
'".mysql_real_escape_string($fpedestal3)."',
'".mysql_real_escape_string($fpedestal3s)."',
'".mysql_real_escape_string($fpedestal3c)."',
'".mysql_real_escape_string($fshower3)."',
'".mysql_real_escape_string($fshower3s)."',
'".mysql_real_escape_string($fshower3c)."',
'".mysql_real_escape_string($fwashbasin3)."',
'".mysql_real_escape_string($fwashbasin3s)."',
'".mysql_real_escape_string($fwashbasin3c)."',
'".mysql_real_escape_string($fholder3)."',
'".mysql_real_escape_string($fholder3s)."',
'".mysql_real_escape_string($fholder3c)."',
'".mysql_real_escape_string($fsoap3)."',
'".mysql_real_escape_string($fsoap3s)."',
'".mysql_real_escape_string($fsoap3c)."',
'".mysql_real_escape_string($fbib3)."',
'".mysql_real_escape_string($fbib3s)."',
'".mysql_real_escape_string($fbib3c)."',
'".mysql_real_escape_string($fkitchensink)."',
'".mysql_real_escape_string($fkitchensinks)."',
'".mysql_real_escape_string($fkitchensinkc)."',
'".mysql_real_escape_string($fbibtap)."',
'".mysql_real_escape_string($fbibtaps)."',
'".mysql_real_escape_string($fbibtapc)."',
'".mysql_real_escape_string($fbibtapy)."',
'".mysql_real_escape_string($fbibtapys)."',
'".mysql_real_escape_string($fbibtapyc)."',
'".mysql_real_escape_string($flighting)."',
'".mysql_real_escape_string($flightings)."',
'".mysql_real_escape_string($flightingc)."',
'".mysql_real_escape_string($ffanpoint)."',
'".mysql_real_escape_string($ffanpoints)."',
'".mysql_real_escape_string($ffanpointc)."',
'".mysql_real_escape_string($fpowerpoint)."',
'".mysql_real_escape_string($fpowerpoints)."',
'".mysql_real_escape_string($fpowerpointc)."',
'".mysql_real_escape_string($fphonepoint)."',
'".mysql_real_escape_string($fphonepoints)."',
'".mysql_real_escape_string($fphonepointc)."',
'".mysql_real_escape_string($ftvpoint)."',
'".mysql_real_escape_string($ftvpoints)."',
'".mysql_real_escape_string($ftvpointc)."',
'".mysql_real_escape_string($fheaterpoint)."',
'".mysql_real_escape_string($fheaterpoints)."',
'".mysql_real_escape_string($fheaterpointc)."',
'".mysql_real_escape_string($faircondpoint)."',
'".mysql_real_escape_string($faircondpoints)."',
'".mysql_real_escape_string($faircondpointc)."',
'".mysql_real_escape_string($fgatepoint)."',
'".mysql_real_escape_string($fgatepoints)."',
'".mysql_real_escape_string($fgatepointc)."',

'".mysql_real_escape_string($fid)."',
'".mysql_real_escape_string($fjabat)."',
'".mysql_real_escape_string($flokasi)."'



)";
	  
$resultpat = mysql_query($querylast) or die (mysql_error());
$idpat     = mysql_insert_id();


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script>

function showDiv(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfsoketc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfkipasc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivflampuc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfdawaic(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftekananairc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfhawadinginc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftangkiseptikc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfpambocorc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfsinkibocorc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfpaippecahc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfretakc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfpatahc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfcabutc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfbocorc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfkaratc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfreputc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfanaic(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfkelawarc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftutupc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftanahruntuhc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfteduhanc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftembokc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftamanc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfpagarc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivflongkangc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfparkirc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivflampukawasanc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivflamputanggac(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivftanggapecahc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivflifrosakc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfhangitc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfkesanbakarc(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

function showDivfpercikanapic(divId, element)
{ document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';}

</script>

<title>BORANG PEMERIKSAAN KENDIRI KESELAMATAN KUARTERS</title>
<style type="text/css">
.head {
	color: #FFF;
}
.subhead {
	font-weight: bold;
}
.tengah {
	text-align: center;
}

div /*{
	
  	background-color:#FC0;
}*/

.classbg {
	background-color:#FF9;
}

</style>
</head>


<div class="row">
				<!-- <div class="col-lg-12">
					<h4 class="page-header"> SELAMAT DATANG <?php echo  $rnama;?></h4>
				</div> -->
			</div>

			<!-- /.row -->
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading" bgcolor="#FF7F50"></div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group">

<body>
<center><h1>BORANG PEMERIKSAAN KENDIRI KESELAMATAN KUARTERS</h1></center>
		
<form action="" method="POST">
<table width="100%" height="437" border="1" cellpadding="1" align="center" bgcolor="#E1E1FF" bordercolor="#CCCCCC" cellspacing="1">
  <tr>
    <td height="23" colspan="4" align="center" bgcolor="#000000"><strong class="head"><u>BAHAGIAN 1</u></strong></td>
  </tr>
  <tr>
    <td height="34" >Tarikh</td>
    <td>:</td>
    <td colspan="2"><?php echo $todaydate2; ?>&nbsp;</td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="34"> Nama</td>
    <td>:</td>
    <td colspan="2"><input type="text" name="fnama" id="fnama" size="70" value="<?php echo $fnama; ?>" readonly="readonly"/></td>
  </tr>
  
    <tr>
      <td width="242" height="34">No MyKad</td>
      <td width="4">:</td>
      <td><input name="fnomykad" type="text" id="fnomykad" value="<?php echo $fnomykad; ?>" size="20" readonly="readonly"></td>
      <td width="516">No Telefon :
        <input name="fnotelefon" type="text" id="fnotelefon" value="<?php echo $fnotel; ?>" size="20" ></td>
      </tr>
    <tr bgcolor="#CED8FF">
      <td height="34"> No Bangunan</td>
      <td>:</td>
      <td colspan="2">
        <input type="text" name="fbangunan" id="fbangunan" size="70"></td>
    </tr>
    <tr>
      <td height="41">Alamat</td>
      <td>:</td>
      <td colspan="2">
        <textarea name="falamat" cols="70" rows="2" id="falamat" type="text"></textarea>
        </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="31">Reka Bentuk</td>
      <td>:</td>
      <td width="285">Jenis Binaan :
        <?php
            $queryb    = "SELECT * FROM tbljenisbinaan where jbstatus ='$status' order by jbsusun asc";
            $resultb    = mysql_query($queryb) or die(mysql_error());
			
            echo "<select name=fjenisbinaan id=fjenisbinaan>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datab = mysql_fetch_array($resultb))
            {
                echo "<option value = $datab[jbid]>$datab[jbnama]</option>";
            }
            echo "</select>";
        ?></td>
      <td>Jenis Rumah :
         <?php
            $queryr    = "SELECT * FROM tbljenisrumah where jrstatus ='$status' order by jrsusun asc ";
            $resultr    = mysql_query($queryr) or die(mysql_error());
			
            echo "<select name=fjenisrumah id=fjenisrumah>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datar = mysql_fetch_array($resultr))
            {
                echo "<option value = $datar[jrid]>$datar[jrnama]</option>";
            }
            echo "</select>";
        ?></td>
    </tr>
    <tr>
      <td height="31">Jumlah Bilik</td>
      <td>:</td>
      <td colspan="2"><?php
	  
            $queryjb    = "SELECT * FROM tblbilik where bilstatus ='$status' order by bilsusun asc  ";
            $resultjb    = mysql_query($queryjb) or die(mysql_error());
			
            echo "<select name=fjumbil id=fjumbil>";
			
            echo "<option value=''>Sila Pilih</option>";
			
            while($datajb = mysql_fetch_array($resultjb))
            {
              echo "<option value = $datajb[bilid]>$datajb[bilnama]</option>";
            }
            echo "</select>";
        ?></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="31">Adakah anda pernah diberi latihan pencegahan kebakaran ? </td>
      <td>:</td>
      <td colspan="2"><?php
            $querycb   = "SELECT * FROM tblyesno where ynstatus ='$status' order by ynsusun asc ";
            $resultcb   = mysql_query($querycb) or die(mysql_error());
			
            echo "<select name=fcegahbakar id=fcegahbakar>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datacb = mysql_fetch_array($resultcb))
            {
              echo "<option value = $datacb[ynid]>$datacb[ynnama]</option>";
            }
            echo "</select>";
        ?></td>
    </tr>
    <tr>
      <td height="50">Adakah pihak kejuruteraan pernah datang membuat pemeriksaan keselamatan di kuarters anda?</td>
      <td>:</td>
      <td>

<select name="fperiksa" required="required" id="fperiksa" onchange="showDiv('divperiksa',this)">
  
        <?php
            $querype    = "SELECT * FROM tblyesno where ynstatus ='$status' order by ynsusun asc ";
			$resultpe   = mysql_query($querype) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datape = mysql_fetch_array($resultpe))
            {
              echo "<option value = $datape[ynid]>$datape[ynnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divperiksa" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fperiksa2" cols="70" rows="2" id="fperiksa2" type="text"></textarea>
      </div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="34">Adakah  peralatan pemadam api disediakan</td>
      <td>:</td>
      <td>Fire Blanket : 
      <?php
            $queryfbl   = "SELECT * FROM tblyesno where ynstatus ='$status' order by ynsusun asc ";
            $resultfbl   = mysql_query($queryfbl) or die(mysql_error());
			
            echo "<select name=ffblanket id=ffblanket>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datafbl = mysql_fetch_array($resultfbl))
            {
              echo "<option value = $datafbl[ynid]>$datafbl[ynnama]</option>";
            }
            echo "</select>";
        ?></td>
      <td>Fire extinguisher : 
      <?php
            $queryfbex   = "SELECT * FROM tblyesno where ynstatus ='$status' order by ynsusun asc ";
            $resultfbex  = mysql_query($queryfbex) or die(mysql_error());
			
            echo "<select name=ffext id=ffext>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datafbex = mysql_fetch_array($resultfbex))
            {
              echo "<option value = $datafbex[ynid]>$datafbex[ynnama]</option>";
            }
            echo "</select>";
        ?></td>
      </tr>
    
</table>
<table width="100%" border="1" cellpadding="1" align="center" bgcolor="#E1E1FF" bordercolor="#CCCCCC" cellspacing="1">
  <tbody>
    <tr>
      <td colspan="4" align="center" bgcolor="#000000"><strong class="head"><u>BAHAGIAN 2</u></strong></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2A : DALAM RUMAH</b></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#CCCCCC" class="subhead">Elektrikal</td>
    </tr>
    <tr>
      <td >Bil</td>
      <td>Komponen</td>
      <td>Keadaan</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td width="37" >1</td>
      <td>Soket / suis</td>
      <td width="55">
        <select name="fsoket" required="required" id="fsoket" onchange="showDivfsoketc('divfsoketc',this)">
          <?php
            $queryfsoket    = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfsoket   = mysql_query($queryfsoket) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafsoket = mysql_fetch_array($resultfsoket))
            {
              echo "<option value = $datafsoket[stid]>$datafsoket[stnama]</option>";
            }
        ?>
        </select></td>
      <td width="656"><div id="divfsoketc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fsoketc" cols="70" rows="2" id="fsoketc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">2</td>
      <td>Kipas</td>
      <td><select name="fkipas" required="required" id="fkipas" onchange="showDivfkipasc('divfkipasc',this)">
        <?php
            $queryfkipas   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkipas   = mysql_query($queryfkipas) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkipas = mysql_fetch_array($resultfkipas))
            {
              echo "<option value = $datafkipas[stid]>$datafkipas[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div class="classbg" id="divfkipasc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fkipasc" cols="70" rows="2" id="fkipasc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">3</td>
      <td>Lampu</td>
      <td><select name="flampu" required="required" id="flampu" onchange="showDivflampuc('divflampuc',this)">
        <?php
            $queryflampu   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflampu   = mysql_query($queryflampu) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflampu = mysql_fetch_array($resultflampu))
            {
              echo "<option value = $dataflampu[stid]>$dataflampu[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divflampuc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="flampuc" cols="70" rows="2" id="flampuc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">4</td>
      <td>Pendawaian</td>
      <td><select name="fdawai" required="required" id="fdawai" onchange="showDivfdawaic('divfdawaic',this)">
        <?php
            $queryfdawai   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfdawai   = mysql_query($queryfdawai) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafdawai = mysql_fetch_array($resultfdawai))
            {
              echo "<option value = $datafdawai[stid]>$datafdawai[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfdawaic" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fdawaic" cols="70" rows="2" id="fdawaic"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="39">5</td>
      <td width="299">Lain-lain</td>
      <td colspan="2">
        <textarea name="flaine" cols="70" rows="2" id="flaine"></textarea></td>
      </tr>
    <tr>
      <td colspan="4" bgcolor="#CCCCCC" class="subhead">Mekanikal</td>
      </tr>
    <tr>
      <td >6</td>
      <td>Tekanan air rendah/tiada air</td>
      <td><select name="ftekananair" required="required" id="ftekananair" onchange="showDivftekananairc('divftekananairc',this)">
        <?php
            $queryftekananair   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftekananair   = mysql_query($queryftekananair) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftekananair = mysql_fetch_array($resultftekananair))
            {
              echo "<option value = $dataftekananair[stid]>$dataftekananair[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divftekananairc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="ftekananairc" cols="70" rows="2" id="ftekananairc"></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">7</td>
      <td>Alat pendingin hawa</td>
      <td><select name="fhawadingin" required="required" id="fhawadingin" onchange="showDivfhawadinginc('divfhawadinginc',this)">
        <?php
            $queryfhawadingin   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfhawadingin   = mysql_query($queryfhawadingin) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafhawadingin = mysql_fetch_array($resultfhawadingin))
            {
              echo "<option value = $datafhawadingin[stid]>$datafhawadingin[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfhawadinginc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fhawadinginc" cols="70" rows="2" id="fhawadinginc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">8</td>
      <td>Tangki septik tersumbat</td>
      <td><select name="ftangkiseptik" required="required" id="ftangkiseptik" onchange="showDivftangkiseptikc('divftangkiseptikc',this)">
        <?php
            $queryftangkiseptik   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftangkiseptik   = mysql_query($queryftangkiseptik) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftangkiseptik = mysql_fetch_array($resultftangkiseptik))
            {
              echo "<option value = $dataftangkiseptik[stid]>$dataftangkiseptik[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftangkiseptikc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="ftangkiseptikc" cols="70" id="ftangkiseptikc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">9</td>
      <td>Pam tandas rosak/bocor</td>
      <td><select name="fpambocor" required="required" id="fpambocor" onchange="showDivfpambocorc('divfpambocorc',this)">
        <?php
            $queryfpambocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpambocor   = mysql_query($queryfkipas) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpambocor = mysql_fetch_array($resultfpambocor))
            {
              echo "<option value = $datafpambocor[stid]>$datafpambocor[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfpambocorc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fpambocorc" cols="70" id="fpambocorc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">10</td>
      <td>Sinki bocor/tersumbat</td>
      <td><select name="fsinkibocor" required="required" id="fsinkibocor" onchange="showDivfsinkibocorc('divfsinkibocorc',this)">
        <?php
            $queryfsinkibocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfsinkibocor   = mysql_query($queryfsinkibocor) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafsinkibocor = mysql_fetch_array($resultfsinkibocor))
            {
              echo "<option value = $datafsinkibocor[stid]>$datafsinkibocor[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfsinkibocorc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fsinkibocorc" cols="70" id="fsinkibocorc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">11</td>
      <td>Paip pecah/bocor</td>
      <td><select name="fpaippecah" required="required" id="fpaippecah" onchange="showDivfpaippecahc('divfpaippecahc',this)">
        <?php
            $queryfpaippecah   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpaippecah   = mysql_query($queryfpaippecah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpaippecah = mysql_fetch_array($resultfpaippecah))
            {
              echo "<option value = $datafpaippecah[stid]>$datafpaippecah[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfpaippecahc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fpaippecahc" cols="70" id="fpaippecahc"></textarea></div></td>
    </tr>
    <tr>
      <td height="39">12</td>
      <td>Lain-Lain</td>
      <td colspan="2"><textarea name="flainm" cols="70" id="flainm"></textarea></td>
    </tr>
    <tr>
      <td height="31" colspan="4" bgcolor="#CCCCCC" class="subhead">Sivil , Struktur &amp; Seni Bina</td>
      </tr>
    <tr bgcolor="#CED8FF">
      <td >13</td>
      <td>Retak</td>
      <td><select name="fretak" required="required" id="fretak" onchange="showDivfretakc('divfretakc',this)">
        <?php
            $queryfretak   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfretak   = mysql_query($queryfretak) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafretak = mysql_fetch_array($resultfretak))
            {
              echo "<option value = $datafretak[stid]>$datafretak[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divfretakc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fretakc" cols="70" id="fretakc"></textarea></div>
      </td>
    </tr>
    <tr>
      <td >14</td>
      <td>Patah</td>
      <td><select name="fpatah" required="required" id="fpatah" onchange="showDivfpatahc('divfpatahc',this)">
        <?php
            $queryfpatah  = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpatah   = mysql_query($queryfpatah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpatah = mysql_fetch_array($resultfpatah))
            {
              echo "<option value = $datafpatah[stid]>$datafpatah[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfpatahc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fpatahc" cols="70" id="fpatahc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >15</td>
      <td>Tercabut/ Tertanggal</td>
      <td><select name="fcabut" required="required" id="fcabut" onchange="showDivfcabutc('divfcabutc',this)">
        <?php
            $queryfcabut   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfcabut   = mysql_query($queryfcabut) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafcabut = mysql_fetch_array($resultfcabut))
            {
              echo "<option value = $datafcabut[stid]>$datafcabut[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfcabutc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fcabutc" cols="70" id="fcabutc"></textarea></div></td>
    </tr>
    <tr>
      <td >16</td>
      <td>Bocor</td>
      <td><select name="fbocor" required="required" id="fbocor" onchange="showDivfbocorc('divfbocorc',this)">
        <?php
            $queryfbocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfbocor   = mysql_query($queryfbocor) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafbocor = mysql_fetch_array($resultfbocor))
            {
              echo "<option value = $datafbocor[stid]>$datafbocor[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfbocorc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fbocorc" cols="70" id="fbocorc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >17</td>
      <td>Karat</td>
      <td><select name="fkarat" required="required" id="fkarat" onchange="showDivfkaratc('divfkaratc',this)">
        <?php
            $queryfkarat   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkarat   = mysql_query($queryfkarat) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkarat = mysql_fetch_array($resultfkarat))
            {
              echo "<option value = $datafkarat[stid]>$datafkarat[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfkaratc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fkaratc" cols="70" id="fkaratc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">18</td>
      <td>Reput</td>
      <td><select name="freput" required="required" id="freput" onchange="showDivfreputc('divfreputc',this)">
        <?php
            $queryfreput  = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfreput   = mysql_query($queryfreput) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafreput = mysql_fetch_array($resultfreput))
            {
              echo "<option value = $datafreput[stid]>$datafreput[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfreputc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="freputc" cols="70" id="freputc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td>19</td>
      <td>Anai-anai</td>
      <td><label for="anai2"></label>
        <select name="fanai" required="required" id="fanai" onchange="showDivfanaic('divfanaic',this)">
          <?php
            $queryfanai   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfanai   = mysql_query($queryfanai) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafanai = mysql_fetch_array($resultfanai))
            {
              echo "<option value = $datafanai[stid]>$datafanai[stnama]</option>";
            }
        ?>
        </select></td>
      <td>
        <div  class="classbg" id="divfanaic" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fanaic" cols="70" id="fanaic"></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">20</td>
      <td>Kelawar</td>
      <td><select name="fkelawar" required="required" id="fkelawar" onchange="showDivfkelawarc('divfkelawarc',this)">
        <?php
            $queryfkelawar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkelawar   = mysql_query($queryfkelawar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkelawar = mysql_fetch_array($resultfkelawar))
            {
              echo "<option value = $datafkelawar[stid]>$datafkelawar[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div id="divfkelawarc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fkelawarc" cols="70" id="fkelawarc"></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">21</td>
      <td>Tidak boleh ditutup / dikunci (Pintu/Tingkap)</td>
      <td><select name="ftutup" required="required" id="ftutup" onchange="showDivftutupc('divftutupc',this)">
        <?php
            $queryftutup   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftutup   = mysql_query($queryftutup) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftutup = mysql_fetch_array($resultftutup))
            {
              echo "<option value = $dataftutup[stid]>$dataftutup[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftutupc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="ftutupc" cols="70" id="ftutupc"></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2B : LUAR RUMAH &amp; KAWASAN GUNA SAMA</b></td>
    </tr>
    <tr>
      <td height="26">22</td>
      <td>Tanah Runtuh</td>
      <td><select name="ftanahruntuh" required="required" id="ftanahruntuh" onchange="showDivftanahruntuhc('divftanahruntuhc',this)">
        <?php
            $queryftanahruntuh   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftanahruntuh   = mysql_query($queryftanahruntuh) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftanahruntuh = mysql_fetch_array($resultftanahruntuh))
            {
              echo "<option value = $dataftanahruntuh[stid]>$dataftanahruntuh[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div id="divftanahruntuhc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="ftanahruntuhc" cols="50" rows="2" id="ftanahruntuhc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="39">23</td>
      <td>Pokok teduhan reput/mati/berisiko untuk tumbang</td>
      <td><select name="fteduhan" required="required" id="fteduhan" onchange="showDivfteduhanc('divfteduhanc',this)">
        <?php
            $queryfteduhan   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfteduhan   = mysql_query($queryfteduhan) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafteduhan = mysql_fetch_array($resultfteduhan))
            {
              echo "<option value = $datafteduhan[stid]>$datafteduhan[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divfteduhanc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fteduhanc" cols="70" id="fteduhanc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">24</td>
      <td>Tembok penahan retak/pecah</td>
      <td><select name="ftembok" required="required" id="ftembok" onchange="showDivftembokc('divftembokc',this)">
        <?php
            $queryftembok   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftembok   = mysql_query($queryftembok) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftembok = mysql_fetch_array($resultftembok))
            {
              echo "<option value = $dataftembok[stid]>$dataftembok[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divftembokc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="ftembokc" cols="70" id="ftembokc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">25</td>
      <td>Taman permainan/rekreasi rosak/tidak selamat</td>
      <td><select name="ftaman" required="required" id="ftaman" onchange="showDivftamanc('divftamanc',this)">
        <?php
            $queryftaman   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftaman   = mysql_query($queryftaman) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftaman = mysql_fetch_array($resultftaman))
            {
              echo "<option value = $dataftaman[stid]>$dataftaman[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftamanc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="ftamanc" cols="70" id="ftamanc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">26</td>
      <td>Pagar Rosak</td>
      <td><select name="fpagar" required="required" id="fpagar" onchange="showDivfpagarc('divfpagarc',this)">
        <?php
            $queryfpagar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpagar   = mysql_query($queryfpagar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpagar = mysql_fetch_array($resultfpagar))
            {
              echo "<option value = $datafpagar[stid]>$datafpagar[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divfpagarc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fpagarc" cols="70" id="fpagarc"></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">27</td>
      <td>Longkang pecah/banjir/tersumbat/air bertakung</td>
      <td><select name="flongkang" required="required" id="flongkang" onchange="showDivflongkangc('divflongkangc',this)">
        <?php
            $queryflongkang   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflongkang   = mysql_query($queryflongkang) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflongkang = mysql_fetch_array($resultflongkang))
            {
              echo "<option value = $dataflongkang[stid]>$dataflongkang[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divflongkangc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="flongkangc" cols="70" id="flongkangc"></textarea></div></td>
    </tr>
    <tr>
      <td height="26">28</td>
      <td>Parkir pecah/ berlubang</td>
      <td><select name="fparkir" required="required" id="fparkir" onchange="showDivfparkirc('divfparkirc',this)">
        <?php
            $queryfparkir   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfparkir   = mysql_query($queryfparkir) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafparkir = mysql_fetch_array($resultfparkir))
            {
              echo "<option value = $datafparkir[stid]>$datafparkir[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div id="divfparkirc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fparkirc" cols="70" id="fparkirc"></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">29</td>
      <td>Lampu kawasan/parkir rosak</td>
      <td><select name="flampukawasan" required="required" id="flampukawasan" onchange="showDivflampukawasanc('divflampukawasanc',this)">
        <?php
            $queryflampukawasan   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflampukawasan   = mysql_query($queryflampukawasan) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflampukawasan = mysql_fetch_array($resultflampukawasan))
            {
              echo "<option value = $dataflampukawasan[stid]>$dataflampukawasan[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divflampukawasanc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="flampukawasanc" cols="70" id="flampukawasanc"></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">30</td>
      <td>Lampu tangga rosak</td>
      <td><select name="flamputangga" required="required" id="flamputangga" onchange="showDivflamputanggac('divflamputanggac',this)">
        <?php
            $queryflamputangga   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflamputangga   = mysql_query($queryflamputangga) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflamputangga = mysql_fetch_array($resultflamputangga))
            {
              echo "<option value = $dataflamputangga[stid]>$dataflamputangga[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div id="divflamputanggac" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="flamputanggac" cols="70" id="flamputanggac"></textarea></div>
     </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">31</td>
      <td>Tangga pecah/tidak selamat</td>
      <td><select name="ftanggapecah" required="required" id="ftanggapecah" onchange="showDivftanggapecahc('divftanggapecahc',this)">
        <?php
            $queryftanggapecah   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftanggapecah   = mysql_query($queryftanggapecah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftanggapecah = mysql_fetch_array($resultftanggapecah))
            {
              echo "<option value = $dataftanggapecah[stid]>$dataftanggapecah[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
       <div  class="classbg" id="divftanggapecahc" style="display: none;">Nyatakan bila dan kenapa<br />
       <textarea name="ftanggapecahc" cols="70" id="ftanggapecahc"></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">32</td>
      <td>Lif rosak</td>
      <td><select name="flifrosak" required="required" id="flifrosak" onchange="showDivflifrosakc('divflifrosakc',this)">
        <?php
            $queryflifrosak   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflifrosak   = mysql_query($queryflifrosak) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflifrosak = mysql_fetch_array($resultflifrosak))
            {
              echo "<option value = $dataflifrosak[stid]>$dataflifrosak[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div id="divflifrosakc" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="flifrosakc" cols="70" id="flifrosakc"></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2C : KESELAMATAN KEBAKARAN</b></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >33</td>
      <td>Berbau hangit</td>
      <td><select name="fhangit" required="required" id="fhangit" onchange="showDivfhangitc('divfhangitc',this)">
        <?php
            $queryfhangit   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfhangit   = mysql_query($queryfhangit) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafhangit = mysql_fetch_array($resultfhangit))
            {
              echo "<option value = $datafhangit[stid]>$datafhangit[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        
          <div  class="classbg" id="divfhangitc" style="display: none;">Nyatakan bila dan kenapa<br />
          <textarea name="fhangitc" cols="70" id="fhangitc"></textarea></div>
</td>
    </tr>
    <tr>
      <td height="26">34</td>
      <td>Kesan terbakar</td>
      <td><select name="fkesanbakar" required="required" id="fkesanbakar" onchange="showDivfkesanbakarc('divfkesanbakarc',this)">
        <?php
            $queryfkesanbakar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkesanbakar   = mysql_query($queryfkesanbakar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkesanbakar = mysql_fetch_array($resultfkesanbakar))
            {
              echo "<option value = $datafkesanbakar[stid]>$datafkesanbakar[stnama]</option>";
            }
        ?>
      </select></td>
      <td>
        <div id="divfkesanbakarc" style="display: none;">Nyatakan bila dan kenapa<br />
        <textarea name="fkesanbakarc" cols="70" id="fkesanbakarc"></textarea></div>
</td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">35</td>
      <td>Percikan api</td>
      <td><select name="fpercikanapi" required="required" id="fpercikanapi" onchange="showDivfpercikanapic('divfpercikanapic',this)">
        <?php
            $queryfpercikanapi   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpercikanapi   = mysql_query($queryfpercikanapi) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpercikanapi = mysql_fetch_array($resultfpercikanapi))
            {
              echo "<option value = $datafpercikanapi[stid]>$datafpercikanapi[stnama]</option>";
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfpercikanapic" style="display: none;">Nyatakan bila dan kenapa<br />
      <textarea name="fpercikanapic" cols="70" id="fpercikanapic"></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2D : LAIN-LAIN</b></td>
    </tr>
    <tr>
      <td height="39">36</td>
      <td>Lain-lain</td>
      <td colspan="2"><textarea name="flainlain" cols="70" rows="3" id="flainlain"></textarea></td>
    </tr>
    </tbody>
</table>
<table width="100%" height="1464" border="1" cellpadding="1" align="center" bgcolor="#E1E1FF" bordercolor="#CCCCCC" cellspacing="1">
  <tbody>
  </tbody>
  <tr>
    <td height="39" colspan="5" align="center" bgcolor="#000000"><strong class="head"><u>BAHAGIAN 3</u></strong></td>
  </tr>
  <tr>
    <td height="31" colspan="5" class="subhead" bgcolor="#CCCCCC">A. SENARAI KUNCI</td>
  </tr>
  <tr class="subhead">
    <td height="23" colspan="2">SENARAI KUNCI</td>
    <td align="center">KUANTITI</td>
    <td align="center">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td width="19" height="26">1.</td>
    <td width="245">Pintu Utama</td>
    <td width="121" class="tengah">
      <input name="fpintuutama" type="text" id="fpintuutama" size="15" /></td>
    <td width="143" class="tengah">
   <?php
            $queryfpintuutama   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpintuutama    = mysql_query($queryfpintuutama) or die(mysql_error());
			
            echo "<select name=fpintuutamas id=fpintuutamas>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafpintuutama = mysql_fetch_array($resultfpintuutama))
            {
                echo "<option value = $datafpintuutama[pid]>$datafpintuutama[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td width="460"><input type="text" name="fpintuutamac" id="fpintuutamac" size="50" /></td>
  </tr>
  <tr>
    <td height="26">2.</td>
    <td height="26">Bilik Tidur Utama</td>
    <td class="tengah">
      <input name="fbilikutama" type="text" id="fbilikutama" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikutama   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikutama    = mysql_query($queryfbilikutama) or die(mysql_error());
			
            echo "<select name=fbilikutamas id=fbilikutamas>";
			
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbilikutama = mysql_fetch_array($resultfbilikutama))
            {
                echo "<option value = $datafbilikutama[pid]>$datafbilikutama[pnama]</option>";
            }
            echo "</select>";
        ?></td>
  
    <td><input type="text" name="fbilikutamac" id="fbilikutamac" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">3.</td>
    <td height="26">Bilik Tidur 2</td>
    <td class="tengah">
      <input name="fbilikdua" type="text" id="fbilikdua" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikdua   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikdua    = mysql_query($queryfbilikdua) or die(mysql_error());
			
            echo "<select name=fbilikduas id=fbilikduas>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbilikdua = mysql_fetch_array($resultfbilikdua))
            {
                echo "<option value = $datafbilikdua[pid]>$datafbilikdua[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbilikduac" id="fbilikduac"  size="50" /></td>
  </tr>
  <tr>
    <td height="26">4.</td>
    <td height="26">Bilik Tidur 3</td>
    <td class="tengah">
      <input name="fbiliktiga" type="text" id="fbiliktiga" size="15" /></td>
    <td class="tengah"><?php
            $queryfbiliktiga   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbiliktiga    = mysql_query($queryfbiliktiga) or die(mysql_error());
            echo "<select name=fbiliktigas id=fbiliktigas>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbiliktiga = mysql_fetch_array($resultfbiliktiga))
            {
                echo "<option value = $datafbiliktiga[pid]>$datafbiliktiga[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbiliktigac" id="fbiliktigac"  size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">5.</td>
    <td height="26">Bilik Tidur 4</td>
    <td class="tengah">
      <input name="fbilikempat" type="text" id="fbilikempat" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikempat   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikempat    = mysql_query($queryfbilikempat) or die(mysql_error());
            echo "<select name=fbilikempats id=fbilikempats>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbilikempat = mysql_fetch_array($resultfbilikempat))
            {
                echo "<option value = $datafbilikempat[pid]>$datafbilikempat[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbilikempatc" id="fbilikempatc"  size="50"/></td>
  </tr>
  <tr>
    <td height="26">6.</td>
    <td height="26">Stor</td>
    <td class="tengah">
      <input name="fstor" type="text" id="fstor" size="15" /></td>
    <td class="tengah"><?php
            $queryfstor  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc";
            $resultfstor    = mysql_query($queryfstor) or die(mysql_error());
            echo "<select name=fstors id=fstors>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafstor = mysql_fetch_array($resultfstor))
            {
                echo "<option value = $datafstor[pid]>$datafstor[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fstorc" id="fstorc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">7.</td>
    <td height="26">Yard / Dapur</td>
    <td class="tengah">
      <input name="fdapur" type="text" id="fdapur" size="15" /></td>
    <td class="tengah"><?php
            $queryfdapur   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfdapur    = mysql_query($queryfdapur) or die(mysql_error());
            echo "<select name=fdapurs id=fdapurs>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafdapur = mysql_fetch_array($resultfdapur))
            {
                echo "<option value = $datafdapur[pid]>$datafdapur[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fdapurc" id="fdapurc" size="50" /></td>
  </tr>
  <tr>
    <td height="26">8.</td>
    <td height="26">Ruang Makan / Ruang Tamu </td>
    <td class="tengah">
      <input name="fruangmakan" type="text" id="fruangmakan" size="15" /></td>
    <td class="tengah"><?php
            $queryfruangmakan  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfruangmakan    = mysql_query($queryfruangmakan) or die(mysql_error());
            echo "<select name=fruangmakans id=fruangmakans>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafruangmakan = mysql_fetch_array($resultfruangmakan))
            {
                echo "<option value = $datafruangmakan[pid]>$datafruangmakan[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fruangmakanc" id="fruangmakanc"  size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">9. </td>
    <td height="26">Pantri</td>
    <td class="tengah"><label for="pantri"></label>
      <input name="fpantri" type="text" id="fpantri" size="15" /></td>
    <td class="tengah"><?php
            $queryfpantri   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpantri    = mysql_query($queryfpantri) or die(mysql_error());
            echo "<select name=fpantris id=fpantris>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpantri = mysql_fetch_array($resultfpantri))
            {
                echo "<option value = $datafpantri[pid]>$datafpantri[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fpantric" id="fpantric"  size="50" /></td>
  </tr>
  <tr>
    <td height="31" colspan="5" class="subhead" bgcolor="#CCCCCC">B. SENARAI SEMAK ELEKTRIK DAN SANITARI</td>
  </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B1</td>
    <td height="23">METER</td>
    <td class="tengah">NO METER</td>
    <td class="tengah">BACAAN METER</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td height="26">1.</td>
    <td height="26">Meter Elektrik TNB</td>
    <td class="tengah"><input name="fmetertnb" type="text" id="fmetertnb" size="15" /></td>
    <td class="tengah"><input name="fmetertnbb" type="text" id="fmetertnbb" size="15" /></td>
    <td><input type="text" name="fmetertnbc" id="fmetertnbc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">2.</td>
    <td height="26">Meter Air SAJR</td>
    <td class="tengah"><input name="fmetersaj" type="text" id="fmetersaj" size="15" /></td>
    <td class="tengah"><input name="fmetersajb" type="text" id="fmetersajb" size="15" /></td>
    <td><input type="text" name="fmetersajc" id="fmetersajc" size="50" /></td>
  </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="31">B2</td>
    <td height="31">MASTER BATHROOM</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td height="31">1.</td>
    <td height="31">Pedestal WC</td>
    <td class="tengah"><input name="fpedestal" type="text" id="fpedestal" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal    = mysql_query($queryfpedestal) or die(mysql_error());
            echo "<select name=fpedestals id=fpedestals>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpedestal = mysql_fetch_array($resultfpedestal))
            {
                echo "<option value = $datafpedestal[pid]>$datafpedestal[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fpedestalc" id="fpedestalc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">2.</td>
    <td height="31">Shower rose</td>
    <td class="tengah"><input name="fshower" type="text" id="fshower" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower    = mysql_query($queryfshower) or die(mysql_error());
            echo "<select name=fshowers id=fshowers>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafshower = mysql_fetch_array($resultfshower))
            {
                echo "<option value = $datafshower[pid]>$datafshower[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fshowerc" id="fshowerc" size="50" /></td>
  </tr>
  <tr>
    <td height="31">3.</td>
    <td height="31">Wash basin</td>
    <td class="tengah"><input name="fwashbasin" type="text" id="fwashbasin" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin    = mysql_query($queryfwashbasin) or die(mysql_error());
            echo "<select name=fwashbasins id=fwashbasins>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafwashbasin = mysql_fetch_array($resultfwashbasin))
            {
                echo "<option value = $datafwashbasin[pid]>$datafwashbasin[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fwashbasinc" id="fwashbasinc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">4.</td>
    <td height="31">Toilet paper holder</td>
    <td class="tengah"><input name="fholder" type="text" id="fholder" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder    = mysql_query($queryfholder) or die(mysql_error());
            echo "<select name=fholders id=fholders>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafholder = mysql_fetch_array($resultfholder))
            {
                echo "<option value = $datafholder[pid]>$datafholder[pnama]</option>";
            }
            echo "</select>";
        ?></td>
  <td><input type="text" name="fholderc" id="fholderc" size="50" /></td>
  </tr>
  <tr>
    <td height="31">5.</td>
    <td height="31">Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap" type="text" id="fsoap" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap    = mysql_query($queryfsoap) or die(mysql_error());
            echo "<select name=fsoaps id=fsoaps>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafsoap = mysql_fetch_array($resultfsoap))
            {
                echo "<option value = $datafsoap[pid]>$datafsoap[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fsoapc" id="fsoapc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">6</td>
    <td height="31">Bib tap</td>
    <td class="tengah"><input name="fbib" type="text" id="fbib" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib    = mysql_query($queryfbib) or die(mysql_error());
            echo "<select name=fbibs id=fbibs>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbib = mysql_fetch_array($resultfbib))
            {
                echo "<option value = $datafbib[pid]>$datafbib[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbibc" id="fbibc" size="50" /></td>
  </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="31">B3</td>
    <td height="31">BATHROOM 2</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td>1.</td>
    <td height="31">Pedestal WC</td>
    <td class="tengah"><input name="fpedestal2" type="text" id="fpedestal2" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal2    = mysql_query($queryfpedestal2) or die(mysql_error());
            echo "<select name=fpedestal2s id=fpedestal2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpedestal2 = mysql_fetch_array($resultfpedestal2))
            {
                echo "<option value = $datafpedestal2[pid]>$datafpedestal2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fpedestal2c" id="fpedestal2c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>2.</td>
    <td height="31">Shower rose</td>
    <td class="tengah"><input name="fshower2" type="text" id="fshower2" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower2    = mysql_query($queryfshower2) or die(mysql_error());
            echo "<select name=fshower2s id=fshower2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafshower2 = mysql_fetch_array($resultfshower2))
            {
                echo "<option value = $datafshower2[pid]>$datafshower2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fshower2c" id="fshower2c" size="50" /></td>
    </tr>
  <tr>
    <td>3.</td>
    <td height="26">Wash basin</td>
    <td class="tengah"><input name="fwashbasin2" type="text" id="fwashbasin2" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin2  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin2    = mysql_query($queryfwashbasin2) or die(mysql_error());
            echo "<select name=fwashbasin2s id=fwashbasin2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafwashbasin2 = mysql_fetch_array($resultfwashbasin2))
            {
                echo "<option value = $datafwashbasin2[pid]>$datafwashbasin2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fwashbasin2c" id="fwashbasin2c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>4.</td>
    <td height="26">Toilet paper holder</td>
    <td class="tengah"><input name="fholder2" type="text" id="fholder2" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder2    = mysql_query($queryfholder2) or die(mysql_error());
            echo "<select name=fholder2s id=fholder2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafholder2 = mysql_fetch_array($resultfholder2))
            {
                echo "<option value = $datafholder2[pid]>$datafholder2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fholder2c" id="fholder2c" size="50" /></td>
    </tr>
  <tr>
    <td>5.</td>
    <td height="26">Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap2" type="text" id="fsoap2" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap2    = mysql_query($queryfsoap2) or die(mysql_error());
            echo "<select name=fsoap2s id=fsoap2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafsoap2 = mysql_fetch_array($resultfsoap2))
            {
                echo "<option value = $datafsoap2[pid]>$datafsoap2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fsoap2c" id="fsoap2c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>6</td>
    <td height="26">Bib tap</td>
    <td class="tengah"><input name="fbib2" type="text" id="fbib2" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib2    = mysql_query($queryfbib2) or die(mysql_error());
            echo "<select name=fbib2s id=fbib2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbib2 = mysql_fetch_array($resultfbib2))
            {
                echo "<option value = $datafbib2[pid]>$datafbib2[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbib2c" id="fbib2c" size="50" /></td>
    </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B4</td>
    <td height="23">BATHROOM 3</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td>1.</td>
    <td>Pedestal WC</td>
    <td class="tengah"><input name="fpedestal3" type="text" id="fpedestal3" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal3    = mysql_query($queryfpedestal3) or die(mysql_error());
            echo "<select name=fpedestal3s id=fpedestal3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpedestal3 = mysql_fetch_array($resultfpedestal3))
            {
                echo "<option value = $datafpedestal3[pid]>$datafpedestal3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fpedestal3c" id="fpedestal3c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>2.</td>
    <td>Shower rose</td>
    <td class="tengah"><input name="fshower3" type="text" id="fshower3" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower3    = mysql_query($queryfshower3) or die(mysql_error());
            echo "<select name=fshower3s id=fshower3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafshower3 = mysql_fetch_array($resultfshower3))
            {
                echo "<option value = $datafshower3[pid]>$datafshower3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fshower3c" id="fshower3c" size="50" /></td>
    </tr>
  <tr>
    <td>3.</td>
    <td>Wash basin</td>
    <td class="tengah"><input name="fwashbasin3" type="text" id="fwashbasin3" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin3    = mysql_query($queryfwashbasin3) or die(mysql_error());
            echo "<select name=fwashbasin3s id=fwashbasin3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafwashbasin3 = mysql_fetch_array($resultfwashbasin3))
            {
                echo "<option value = $datafwashbasin3[pid]>$datafwashbasin3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fwashbasin3c" id="fwashbasin3c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>4.</td>
    <td>Toilet paper holder</td>
    <td class="tengah"><input name="fholder3" type="text" id="fholder3" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder3    = mysql_query($queryfholder3) or die(mysql_error());
            echo "<select name=fholder3s id=fholder3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafholder3 = mysql_fetch_array($resultfholder3))
            {
                echo "<option value = $datafholder3[pid]>$datafholder3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fholder3c" id="fholder3c" size="50" /></td>
    </tr>
  <tr>
    <td>5.</td>
    <td>Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap3" type="text" id="fsoap3" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap3    = mysql_query($queryfsoap3) or die(mysql_error());
            echo "<select name=fsoap3s id=fsoap3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafsoap3 = mysql_fetch_array($resultfsoap3))
            {
                echo "<option value = $datafsoap3[pid]>$datafsoap3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fsoap3c" id="fsoap3c" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>6</td>
    <td>Bib tap</td>
    <td class="tengah"><input name="fbib3" type="text" id="fbib3" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib3    = mysql_query($queryfbib3) or die(mysql_error());
            echo "<select name=fbib3s id=fbib3s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbib3 = mysql_fetch_array($resultfbib3))
            {
                echo "<option value = $datafbib3[pid]>$datafbib3[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbib3c" id="fbib3c" size="50" /></td>
    </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B5</td>
    <td height="23">KITCHEN</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td height="26">Kitchen Sink</td>
    <td class="tengah"><input name="fkitchensink" type="text" id="fkitchensink" size="15" /></td>
    <td class="tengah"><?php
            $queryfkitchensink   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfkitchensink    = mysql_query($queryfkitchensink) or die(mysql_error());
            echo "<select name=fkitchensinks id=fkitchensinks>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafkitchensink = mysql_fetch_array($resultfkitchensink))
            {
                echo "<option value = $datafkitchensink[pid]>$datafkitchensink[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fkitchensinkc" id="fkitchensinkc" size="50" /></td>
  </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B6</td>
    <td height="23">CAR PORCH</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">&nbsp;</td>
    <td height="26">Bib Tap</td>
    <td class="tengah"><input name="fbibtap" type="text" id="fbibtap" size="15" /></td>
    <td class="tengah"><?php
            $queryfbibtap   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbibtap    = mysql_query($queryfbibtap) or die(mysql_error());
            echo "<select name=fbibtaps id=fbibtaps>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbibtap = mysql_fetch_array($resultfbibtap))
            {
                echo "<option value = $datafbibtap[pid]>$datafbibtap[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbibtapc" id="fbibtapc" size="50" /></td>
  </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B7</td>
    <td height="23">YARD</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td height="31">Bib Tap</td>
    <td class="tengah"><input name="fbibtapy" type="text" id="fbibtapy" size="15"></td>
    <td class="tengah"><?php
            $queryfbibtapy   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbibtapy    = mysql_query($queryfbibtapy) or die(mysql_error());
            echo "<select name=fbibtapys id=fbibtapys>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbibtapy = mysql_fetch_array($resultfbibtapy))
            {
                echo "<option value = $datafbibtapy[pid]>$datafbibtapy[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fbibtapyc" id="fbibtapyc" size="50" /></td>
    </tr>
  <tr class="subhead" bgcolor="#C4C4FF">
    <td height="23">B8</td>
    <td height="23">ELECTRICAL SCHEDULE</td>
    <td class="tengah">KUANTITI</td>
    <td class="tengah">STATUS</td>
    <td>CATATAN</td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td>1.</td>
    <td height="26">Lighting Point</td>
    <td class="tengah"><input name="flighting" type="text" id="lighting2" size="15" /></td>
    <td class="tengah"><?php
            $queryflighting   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultflighting    = mysql_query($queryflighting) or die(mysql_error());
            echo "<select name=flightings id=flightings>";
            echo "<option value=''>Sila Pilih</option>";
            while($dataflighting = mysql_fetch_array($resultflighting))
            {
                echo "<option value = $dataflighting[pid]>$dataflighting[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="flightingc" id="flightingc" size="50" /></td>
  </tr>
  <tr>
    <td>2.</td>
    <td height="26">Fan Point</td>
    <td class="tengah"><input name="ffanpoint" type="text" id="ffanpoint" size="15" /></td>
    <td class="tengah"><?php
            $queryffanpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultffanpoint    = mysql_query($queryffanpoint) or die(mysql_error());
            echo "<select name=ffanpoints id=ffanpoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($dataffanpoint = mysql_fetch_array($resultffanpoint))
            {
                echo "<option value = $dataffanpoint[pid]>$dataffanpoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="ffanpointc" id="ffanpointc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td>3.</td>
    <td height="26">Power point (13A)</td>
    <td class="tengah"><input name="fpowerpoint" type="text" id="fpowerpoint" size="15" /></td>
    <td class="tengah"><?php
            $queryfpowerpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpowerpoint    = mysql_query($queryfpowerpoint) or die(mysql_error());
            echo "<select name=fpowerpoints id=fpowerpoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpowerpoint = mysql_fetch_array($resultfpowerpoint))
            {
                echo "<option value = $datafpowerpoint[pid]>$datafpowerpoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fpowerpointc" id="fpowerpointc" size="50" /></td>
  </tr>
  <tr>
    <td>4.</td>
    <td height="26">Telephone point</td>
    <td class="tengah"><input name="fphonepoint" type="text" id="fphonepoint" size="15" /></td>
    <td class="tengah"><?php
            $queryfphonepoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfphonepoint    = mysql_query($queryfphonepoint) or die(mysql_error());
            echo "<select name=fphonepoints id=fphonepoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafphonepoint = mysql_fetch_array($resultfphonepoint))
            {
                echo "<option value = $datafphonepoint[pid]>$datafphonepoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fphonepointc" id="fphonepointc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td>5.</td>
    <td height="26">TV point</td>
    <td class="tengah"><input name="ftvpoint" type="text" id="ftvpoint" size="15" /></td>
    <td class="tengah"><?php
            $queryftvpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultftvpoint    = mysql_query($queryftvpoint) or die(mysql_error());
            echo "<select name=ftvpoints id=ftvpoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($dataftvpoint = mysql_fetch_array($resultftvpoint))
            {
                echo "<option value = $dataftvpoint[pid]>$dataftvpoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="ftvpointc" id="ftvpointc" size="50" /></td>
  </tr>
  <tr>
    <td>6</td>
    <td height="26">Heater point</td>
    <td class="tengah"><input name="fheaterpoint" type="text" id="fheaterpoint" size="15" /></td>
    <td class="tengah"><?php
            $queryfheaterpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfheaterpoint    = mysql_query($queryfpantri) or die(mysql_error());
            echo "<select name=fheaterpoints id=fheaterpoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafheaterpoint = mysql_fetch_array($resultfheaterpoint))
            {
                echo "<option value = $datafheaterpoint[pid]>$datafheaterpoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fheaterpointc" id="fheaterpointc" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">7.</td>
    <td height="26">Air-cond point</td>
    <td class="tengah"><input name="faircondpoint" type="text" id="faircondpoint" size="15" /></td>
    <td class="tengah"><?php
            $queryfaircondpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfaircondpoint    = mysql_query($queryfaircondpoint) or die(mysql_error());
            echo "<select name=faircondpoints id=faircondpoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafaircondpoint = mysql_fetch_array($resultfaircondpoint))
            {
                echo "<option value = $datafaircondpoint[pid]>$datafaircondpoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="faircondpointc" id="faircondpointc" size="50" /></td>
  </tr>
  <tr>
    <td height="26">8.</td>
    <td height="26">Gate Bell point</td>
    <td class="tengah"><input name="fgatepoint" type="text" id="fgatepoint" size="15"/></td>
    <td class="tengah"><?php
            $queryfgatepoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfgatepoint    = mysql_query($queryfpantri) or die(mysql_error());
            echo "<select name=fgatepoints id=fgatepoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafgatepoint = mysql_fetch_array($resultfgatepoint))
            {
                echo "<option value = $datafgatepoint[pid]>$datafgatepoint[pnama]</option>";
            }
            echo "</select>";
        ?></td>
    <td><input type="text" name="fgatepointc" id="fgatepointc" size="50" /></td>
  </tr>
  </table>
<p>
  <center>
    Sila pastikan kesemua maklumat adalah <b>TEPAT</b> sebelum menekan butang HANTAR<br /><br />
  <input type="submit" name="HANTAR" id="HANTAR" value="HANTAR" align="center"></center>

</p>

</div>								
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
<!-- <span class="tengah">
<input name="fbibtapy" type="text" id="fbibtapy" size="15" />
</span> -->
</form>
</body>
</html>