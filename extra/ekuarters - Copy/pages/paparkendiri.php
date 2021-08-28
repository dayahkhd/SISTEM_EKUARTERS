<?php

session_start();
//require ('cons.php');

require ('../config/dbconnect.php');

$todaydate = date('Y-m-d');
$todaydate2 = date('d-m-Y');

//$nomykad	= $_GET['nomykad'];			// noic
$kendiriid	= $_GET['kendiriid'];	
$status		= 1;

	$r 				= date("Ymdhis");	// 14
	$r2 			= rand(1000,9999);	//4
	$randomno 		= "$r$r2";

$querykendiri2     = "SELECT * FROM  tblkendiri WHERE kid = '$kendiriid' AND kstatus = '$status'";
$resultkendiri2     = mysql_query($querykendiri2) or die(mysql_error());
$datakendiri2      = mysql_fetch_array($resultkendiri2);
										
$kfid	   		= $datakendiri2['kid'];
$kfidstaff   	= $datakendiri2['kidstaff'];
$kfjabatan   	= $datakendiri2['kjabatan'];
$kftarikh     	= $datakendiri2['ftarikh'];

$kfbangunan		=	$datakendiri2['fbangunan'];
$kflokasi		=	$datakendiri2['flokasi'];
$kfalamat		=	$datakendiri2['falamat'];
$kfjenisbinaan	=	$datakendiri2['fjenisbinaan'];
$kfjenisrumah	=	$datakendiri2['fjenisrumah'];
$kfjumbil		=	$datakendiri2['fjumbil'];
$kfcegahbakar	=	$datakendiri2['fcegahbakar'];
$kfperiksa		=	$datakendiri2['fperiksa'];
$kfperiksa2		=	$datakendiri2['fperiksa2'];
$kffblanket		=	$datakendiri2['ffblanket'];
$kffext			=	$datakendiri2['ffext'];
$kfsoket			=	$datakendiri2['fsoket'];
$kfsoketc		=	$datakendiri2['fsoketc'];
$kfkipas			=	$datakendiri2['fkipas'];
$kfkipasc		=	$datakendiri2['fkipasc'];
$kflampu			=	$datakendiri2['flampu'];
$kflampuc		=	$datakendiri2['flampuc'];
$kfdawai			=	$datakendiri2['fdawai'];
$kfdawaic		=	$datakendiri2['fdawaic'];
$kflaine			=	$datakendiri2['flaine'];
$kftekananair	=	$datakendiri2['ftekananair'];
$kftekananairc	=	$datakendiri2['ftekananairc'];
$kfhawadingin	=	$datakendiri2['fhawadingin'];
$kfhawadinginc	=	$datakendiri2['fhawadinginc'];
$kftangkiseptik	=	$datakendiri2['ftangkiseptik'];
$kftangkiseptikc	=	$datakendiri2['ftangkiseptikc'];
$kfpambocor		=	$datakendiri2['fpambocor'];
$kfpambocorc		=	$datakendiri2['fpambocorc'];
$kfsinkibocor	=	$datakendiri2['fsinkibocor'];
$kfsinkibocorc	=	$datakendiri2['fsinkibocorc'];
$kfpaippecah		=	$datakendiri2['fpaippecah'];
$kfpaippecahc	=	$datakendiri2['fpaippecahc'];
$kflainm			=	$datakendiri2['flainm'];
$kfretak			=	$datakendiri2['fretak'];
$kfretakc		=	$datakendiri2['fretakc'];
$kfpatah			=	$datakendiri2['fpatah'];
$kfpatahc		=	$datakendiri2['fpatahc'];
$kfcabut			=	$datakendiri2['fcabut'];
$kfcabutc		=	$datakendiri2['fcabutc'];
$kfbocor			=	$datakendiri2['fbocor'];
$kfbocorc		=	$datakendiri2['fbocorc'];
$kfkarat			=	$datakendiri2['fkarat'];
$kfkaratc		=	$datakendiri2['fkaratc'];
$kfreput			=	$datakendiri2['freput'];
$kfreputc		=	$datakendiri2['freputc'];
$kfanai			=	$datakendiri2['fanai'];
$kfanaic			=	$datakendiri2['fanaic'];
$kfkelawar		=	$datakendiri2['fkelawar'];
$kfkelawarc		=	$datakendiri2['fkelawarc'];
$kftutup			=	$datakendiri2['ftutup'];
$kftutupc		=	$datakendiri2['ftutupc'];
$kftanahruntuh	=	$datakendiri2['ftanahruntuh'];
$kftanahruntuhc	=	$datakendiri2['ftanahruntuhc'];
$kfteduhan		=	$datakendiri2['fteduhan'];
$kfteduhanc		=	$datakendiri2['fteduhanc'];
$kftembok		=	$datakendiri2['ftembok'];
$kftembokc		=	$datakendiri2['ftembokc'];
$kftaman			=	$datakendiri2['ftaman'];
$kftamanc		=	$datakendiri2['ftamanc'];
$kfpagar			=	$datakendiri2['fpagar'];
$kfpagarc		=	$datakendiri2['fpagarc'];
$kflongkang		=	$datakendiri2['flongkang'];
$kflongkangc		=	$datakendiri2['flongkangc'];
$kfparkir		=	$datakendiri2['fparkir'];
$kfparkirc		=	$datakendiri2['fparkirc'];
$kflampukawasan	=	$datakendiri2['flampukawasan'];
$kflampukawasanc	=	$datakendiri2['flampukawasanc'];
$kflamputangga	=	$datakendiri2['flamputangga'];
$kflamputanggac	=	$datakendiri2['flamputanggac'];
$kftanggapecah	=	$datakendiri2['ftanggapecah'];
$kftanggapecahc	=	$datakendiri2['ftanggapecahc'];
$kflifrosak		=	$datakendiri2['flifrosak'];
$kflifrosakc		=	$datakendiri2['flifrosakc'];
$kfhangit		=	$datakendiri2['fhangit'];
$kfhangitc		=	$datakendiri2['fhangitc'];
$kfkesanbakar		=	$datakendiri2['fkesanbakar'];
$kfkesanbakarc		=	$datakendiri2['fkesanbakarc'];
$kfpercikanapi	=	$datakendiri2['fpercikanapi'];
$kfpercikanapic	=	$datakendiri2['fpercikanapic'];
$kflainlain		=	$datakendiri2['flainlain'];
$kfpintuutama	=	$datakendiri2['fpintuutama'];
$kfpintuutamas	=	$datakendiri2['fpintuutamas'];
$kfpintuutamac	=	$datakendiri2['fpintuutamac'];
$kfbilikutama	=	$datakendiri2['fbilikutama'];
$kfbilikutamas	=	$datakendiri2['fbilikutamas'];
$kfbilikutamac	=	$datakendiri2['fbilikutamac'];
$kfbilikdua		=	$datakendiri2['fbilikdua'];
$kfbilikduas		=	$datakendiri2['fbilikduas'];
$kfbilikduac		=	$datakendiri2['fbilikduac'];
$kfbiliktiga		=	$datakendiri2['fbiliktiga'];
$kfbiliktigas	=	$datakendiri2['fbiliktigas'];
$kfbiliktigac	=	$datakendiri2['fbiliktigac'];
$kfbilikempat	=	$datakendiri2['fbilikempat'];
$kfbilikempats	=	$datakendiri2['fbilikempats'];
$kfbilikempatc	=	$datakendiri2['fbilikempatc'];
$kfstor			=	$datakendiri2['fstor'];
$kfstors			=	$datakendiri2['fstors'];
$kfstorc			=	$datakendiri2['fstorc'];
$kfdapur			=	$datakendiri2['fdapur'];
$kfdapurs		=	$datakendiri2['fdapurs'];
$kfdapurc		=	$datakendiri2['fdapurc'];
$kfruangmakan	=	$datakendiri2['fruangmakan'];
$kfruangmakans	=	$datakendiri2['fruangmakans'];
$kfruangmakanc	=	$datakendiri2['fruangmakanc'];
$kfpantri		=	$datakendiri2['fpantri'];
$kfpantris		=	$datakendiri2['fpantris'];
$kfpantric		=	$datakendiri2['fpantric'];
$kfmetertnb		=	$datakendiri2['fmetertnb'];
$kfmetertnbb		=	$datakendiri2['fmetertnbb'];
$kfmetertnbc		=	$datakendiri2['fmetertnbc'];
$kfmetersaj		=	$datakendiri2['fmetersaj'];
$kfmetersajb		=	$datakendiri2['fmetersajb'];
$kfmetersajc		=	$datakendiri2['fmetersajc'];
$kfpedestal		=	$datakendiri2['fpedestal'];
$kfpedestals		=	$datakendiri2['fpedestals'];
$kfpedestalc		=	$datakendiri2['fpedestalc'];
$kfshower		=	$datakendiri2['fshower'];
$kfshowers		=	$datakendiri2['fshowers'];
$kfshowerc		=	$datakendiri2['fshowerc'];
$kfwashbasin		=	$datakendiri2['fwashbasin'];
$kfwashbasins	=	$datakendiri2['fwashbasins'];
$kfwashbasinc	=	$datakendiri2['fwashbasinc'];
$kfholder		=	$datakendiri2['fholder'];
$kfholders		=	$datakendiri2['fholders'];
$kfholderc		=	$datakendiri2['fholderc'];
$kfsoap			=	$datakendiri2['fsoap'];
$kfsoaps			=	$datakendiri2['fsoaps'];
$kfsoapc			=	$datakendiri2['fsoapc'];
$kfbib			=	$datakendiri2['fbib'];
$kfbibs			=	$datakendiri2['fbibs'];
$kfbibc			=	$datakendiri2['fbibc'];
$kfpedestal2		=	$datakendiri2['fpedestal2'];
$kfpedestal2s	=	$datakendiri2['fpedestal2s'];
$kfpedestal2c	=	$datakendiri2['fpedestal2c'];
$kfshower2		=	$datakendiri2['fshower2'];
$kfshower2s		=	$datakendiri2['fshower2s'];
$kfshower2c		=	$datakendiri2['fshower2c'];
$kfwashbasin2	=	$datakendiri2['fwashbasin2'];
$kfwashbasin2s	=	$datakendiri2['fwashbasin2s'];
$kfwashbasin2c	=	$datakendiri2['fwashbasin2c'];
$kfholder2		=	$datakendiri2['fholder2'];
$kfholder2s		=	$datakendiri2['fholder2s'];
$kfholder2c		=	$datakendiri2['fholder2c'];
$kfsoap2			=	$datakendiri2['fsoap2'];
$kfsoap2s		=	$datakendiri2['fsoap2s'];
$kfsoap2c		=	$datakendiri2['fsoap2c'];
$kfbib2			=	$datakendiri2['fbib2'];
$kfbib2s			=	$datakendiri2['fbib2s'];
$kfbib2c			=	$datakendiri2['fbib2c'];
$kfpedestal3		=	$datakendiri2['fpedestal3'];
$kfpedestal3s	=	$datakendiri2['fpedestal3s'];
$kfpedestal3c	=	$datakendiri2['fpedestal3c'];
$kfshower3		=	$datakendiri2['fshower3'];
$kfshower3s		=	$datakendiri2['fshower3s'];
$kfshower3c		=	$datakendiri2['fshower3c'];
$kfwashbasin3	=	$datakendiri2['fwashbasin3'];
$kfwashbasin3s	=	$datakendiri2['fwashbasin3s'];
$kfwashbasin3c	=	$datakendiri2['fwashbasin3c'];
$kfholder3		=	$datakendiri2['fholder3'];
$kfholder3s		=	$datakendiri2['fholder3s'];
$kfholder3c		=	$datakendiri2['fholder3c'];
$kfsoap3			=	$datakendiri2['fsoap3'];
$kfsoap3s		=	$datakendiri2['fsoap3s'];
$kfsoap3c		=	$datakendiri2['fsoap3c'];
$kfbib3			=	$datakendiri2['fbib3'];
$kfbib3s			=	$datakendiri2['fbib3s'];
$kfbib3c			=	$datakendiri2['fbib3c'];
$kfkitchensink	=	$datakendiri2['fkitchensink'];
$kfkitchensinks	=	$datakendiri2['fkitchensinks'];
$kfkitchensinkc	=	$datakendiri2['fkitchensinkc'];
$kfbibtap		=	$datakendiri2['fbibtap'];
$kfbibtaps		=	$datakendiri2['fbibtaps'];
$kfbibtapc		=	$datakendiri2['fbibtapc'];
$kfbibtapy		=	$datakendiri2['fbibtapy'];
$kfbibtapys		=	$datakendiri2['fbibtapys'];
$kfbibtapyc		=	$datakendiri2['fbibtapyc'];
$kflighting		=	$datakendiri2['flighting'];
$kflightings		=	$datakendiri2['flightings'];
$kflightingc		=	$datakendiri2['flightingc'];
$kffanpoint		=	$datakendiri2['ffanpoint'];
$kffanpoints		=	$datakendiri2['ffanpoints'];
$kffanpointc		=	$datakendiri2['ffanpointc'];
$kfpowerpoint	=	$datakendiri2['fpowerpoint'];
$kfpowerpoints	=	$datakendiri2['fpowerpoints'];
$kfpowerpointc	=	$datakendiri2['fpowerpointc'];
$kfphonepoint	=	$datakendiri2['fphonepoint'];
$kfphonepoints	=	$datakendiri2['fphonepoints'];
$kfphonepointc	=	$datakendiri2['fphonepointc'];
$kftvpoint		=	$datakendiri2['ftvpoint'];
$kftvpoints		=	$datakendiri2['ftvpoints'];
$kftvpointc		=	$datakendiri2['ftvpointc'];
$kfheaterpoint	=	$datakendiri2['fheaterpoint'];
$kfheaterpoints	=	$datakendiri2['fheaterpoints'];
$kfheaterpointc	=	$datakendiri2['fheaterpointc'];
$kfaircondpoint	=	$datakendiri2['faircondpoint'];
$kfaircondpoints	=	$datakendiri2['faircondpoints'];
$kfaircondpointc	=	$datakendiri2['faircondpointc'];
$kfgatepoint		=	$datakendiri2['fgatepoint'];
$kfgatepoints	=	$datakendiri2['fgatepoints'];
$kfgatepointc	=	$datakendiri2['fgatepointc'];
                                                
// TABLE PENGGUNA
$querystaff     = "SELECT * FROM  tablepengguna WHERE id = '$kfidstaff'";
$resultstaff     = mysql_query($querystaff) or die(mysql_error());
$datastaff      = mysql_fetch_array($resultstaff);

$kfnama          = $datastaff['namapemohon'];
$kfnomykad       = $datastaff['nokadpengenalan'];
$kfnotel 			= $datastaff['notel'];


// TABLE JABATAN
$queryjabatan     = "SELECT * FROM  tablejabatan WHERE kodjabatan = '$kfjabatan'";
$resultjabatan     = mysql_query($queryjabatan) or die(mysql_error());
$datajabatan      = mysql_fetch_array($resultjabatan);

$namajabatan      = $datajabatan['jabatan'];
												

	
	
?> 
<?php
if(isset($_POST['KEMASKINI']) == "KEMASKINI")
{

$fbangunan		=	$_POST['fbangunan'];
$flokasi		=	$_POST['flokasi'];
$falamat		=	$_POST['falamat'];
$fjenisbinaan	=	$_POST['fjenisbinaan'];
$fjenisrumah	=	$_POST['fjenisrumah'];
$fjumbil		=	$_POST['fjumbil'];
$fcegahbakar	=	$_POST['fcegahbakar'];
$fperiksa		=	$_POST['fperiksa'];
$fperiksa2		=	$_POST['fperiksa2'];
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
$fkesanbakar	=	$_POST['fkesanbakar'];
$fkesanbakarc	=	$_POST['fkesanbakarc'];
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
  


$queryupdate = "UPDATE tblkendiri SET


fbangunan = '".mysql_real_escape_string($fbangunan)."',
flokasi = '".mysql_real_escape_string($flokasi)."',
falamat = '".mysql_real_escape_string($falamat)."',
fjenisbinaan = '".mysql_real_escape_string($fjenisbinaan)."',
fjenisrumah = '".mysql_real_escape_string($fjenisrumah)."',
fjumbil = '".mysql_real_escape_string($fjumbil)."',
fcegahbakar = '".mysql_real_escape_string($fcegahbakar)."',
fperiksa = '".mysql_real_escape_string($fperiksa)."',
fperiksa2 = '".mysql_real_escape_string($fperiksa2)."',
ffblanket = '".mysql_real_escape_string($ffblanket)."',
ffext = '".mysql_real_escape_string($ffext)."',
fsoket = '".mysql_real_escape_string($fsoket)."',
fsoketc = '".mysql_real_escape_string($fsoketc)."',
fkipas = '".mysql_real_escape_string($fkipas)."',
fkipasc = '".mysql_real_escape_string($fkipasc)."',
flampu = '".mysql_real_escape_string($flampu)."',
flampuc = '".mysql_real_escape_string($flampuc)."',
fdawai = '".mysql_real_escape_string($fdawai)."',
fdawaic = '".mysql_real_escape_string($fdawaic)."',
flaine = '".mysql_real_escape_string($flaine)."',
ftekananair = '".mysql_real_escape_string($ftekananair)."',
ftekananairc = '".mysql_real_escape_string($ftekananairc)."',
fhawadingin = '".mysql_real_escape_string($fhawadingin)."',
fhawadinginc = '".mysql_real_escape_string($fhawadinginc)."',
ftangkiseptik = '".mysql_real_escape_string($ftangkiseptik)."',
ftangkiseptikc = '".mysql_real_escape_string($ftangkiseptikc)."',
fpambocor = '".mysql_real_escape_string($fpambocor)."',
fpambocorc = '".mysql_real_escape_string($fpambocorc)."',
fsinkibocor = '".mysql_real_escape_string($fsinkibocor)."',
fsinkibocorc = '".mysql_real_escape_string($fsinkibocorc)."',
fpaippecah = '".mysql_real_escape_string($fpaippecah)."',
fpaippecahc = '".mysql_real_escape_string($fpaippecahc)."',
flainm = '".mysql_real_escape_string($flainm)."',
fretak = '".mysql_real_escape_string($fretak)."',
fretakc = '".mysql_real_escape_string($fretakc)."',
fpatah = '".mysql_real_escape_string($fpatah)."',
fpatahc = '".mysql_real_escape_string($fpatahc)."',
fcabut = '".mysql_real_escape_string($fcabut)."',
fcabutc = '".mysql_real_escape_string($fcabutc)."',
fbocor = '".mysql_real_escape_string($fbocor)."',
fbocorc = '".mysql_real_escape_string($fbocorc)."',
fkarat = '".mysql_real_escape_string($fkarat)."',
fkaratc = '".mysql_real_escape_string($fkaratc)."',
freput = '".mysql_real_escape_string($freput)."',
freputc = '".mysql_real_escape_string($freputc)."',
fanai = '".mysql_real_escape_string($fanai)."',
fanaic = '".mysql_real_escape_string($fanaic)."',
fkelawar = '".mysql_real_escape_string($fkelawar)."',
fkelawarc = '".mysql_real_escape_string($fkelawarc)."',
ftutup = '".mysql_real_escape_string($ftutup)."',
ftutupc = '".mysql_real_escape_string($ftutupc)."',
ftanahruntuh = '".mysql_real_escape_string($ftanahruntuh)."',
ftanahruntuhc = '".mysql_real_escape_string($ftanahruntuhc)."',
fteduhan = '".mysql_real_escape_string($fteduhan)."',
fteduhanc = '".mysql_real_escape_string($fteduhanc)."',
ftembok = '".mysql_real_escape_string($ftembok)."',
ftembokc = '".mysql_real_escape_string($ftembokc)."',
ftaman = '".mysql_real_escape_string($ftaman)."',
ftamanc = '".mysql_real_escape_string($ftamanc)."',
fpagar = '".mysql_real_escape_string($fpagar)."',
fpagarc = '".mysql_real_escape_string($fpagarc)."',
flongkang = '".mysql_real_escape_string($flongkang)."',
flongkangc = '".mysql_real_escape_string($flongkangc)."',
fparkir = '".mysql_real_escape_string($fparkir)."',
fparkirc = '".mysql_real_escape_string($fparkirc)."',
flampukawasan = '".mysql_real_escape_string($flampukawasan)."',
flampukawasanc = '".mysql_real_escape_string($flampukawasanc)."',
flamputangga = '".mysql_real_escape_string($flamputangga)."',
flamputanggac = '".mysql_real_escape_string($flamputanggac)."',
ftanggapecah = '".mysql_real_escape_string($ftanggapecah)."',
ftanggapecahc = '".mysql_real_escape_string($ftanggapecahc)."',
flifrosak = '".mysql_real_escape_string($flifrosak)."',
flifrosakc = '".mysql_real_escape_string($flifrosakc)."',
fhangit = '".mysql_real_escape_string($fhangit)."',
fhangitc = '".mysql_real_escape_string($fhangitc)."',
fkesanbakar = '".mysql_real_escape_string($fkesanbakar)."',
fkesanbakarc = '".mysql_real_escape_string($fkesanbakarc)."',
fpercikanapi = '".mysql_real_escape_string($fpercikanapi)."',
fpercikanapic = '".mysql_real_escape_string($fpercikanapic)."',
flainlain = '".mysql_real_escape_string($flainlain)."',
fpintuutama = '".mysql_real_escape_string($fpintuutama)."',
fpintuutamas = '".mysql_real_escape_string($fpintuutamas)."',
fpintuutamac = '".mysql_real_escape_string($fpintuutamac)."',
fbilikutama = '".mysql_real_escape_string($fbilikutama)."',
fbilikutamas = '".mysql_real_escape_string($fbilikutamas)."',
fbilikutamac = '".mysql_real_escape_string($fbilikutamac)."',
fbilikdua = '".mysql_real_escape_string($fbilikdua)."',
fbilikduas = '".mysql_real_escape_string($fbilikduas)."',
fbilikduac = '".mysql_real_escape_string($fbilikduac)."',
fbiliktiga = '".mysql_real_escape_string($fbiliktiga)."',
fbiliktigas = '".mysql_real_escape_string($fbiliktigas)."',
fbiliktigac = '".mysql_real_escape_string($fbiliktigac)."',
fbilikempat = '".mysql_real_escape_string($fbilikempat)."',
fbilikempats = '".mysql_real_escape_string($fbilikempats)."',
fbilikempatc = '".mysql_real_escape_string($fbilikempatc)."',
fstor = '".mysql_real_escape_string($fstor)."',
fstors = '".mysql_real_escape_string($fstors)."',
fstorc = '".mysql_real_escape_string($fstorc)."',
fdapur = '".mysql_real_escape_string($fdapur)."',
fdapurs = '".mysql_real_escape_string($fdapurs)."',
fdapurc = '".mysql_real_escape_string($fdapurc)."',
fruangmakan = '".mysql_real_escape_string($fruangmakan)."',
fruangmakans = '".mysql_real_escape_string($fruangmakans)."',
fruangmakanc = '".mysql_real_escape_string($fruangmakanc)."',
fpantri = '".mysql_real_escape_string($fpantri)."',
fpantris = '".mysql_real_escape_string($fpantris)."',
fpantric = '".mysql_real_escape_string($fpantric)."',
fmetertnb = '".mysql_real_escape_string($fmetertnb)."',
fmetertnbb = '".mysql_real_escape_string($fmetertnbb)."',
fmetertnbc = '".mysql_real_escape_string($fmetertnbc)."',
fmetersaj = '".mysql_real_escape_string($fmetersaj)."',
fmetersajb = '".mysql_real_escape_string($fmetersajb)."',
fmetersajc = '".mysql_real_escape_string($fmetersajc)."',
fpedestal = '".mysql_real_escape_string($fpedestal)."',
fpedestals = '".mysql_real_escape_string($fpedestals)."',
fpedestalc = '".mysql_real_escape_string($fpedestalc)."',
fshower = '".mysql_real_escape_string($fshower)."',
fshowers = '".mysql_real_escape_string($fshowers)."',
fshowerc = '".mysql_real_escape_string($fshowerc)."',
fwashbasin = '".mysql_real_escape_string($fwashbasin)."',
fwashbasins = '".mysql_real_escape_string($fwashbasins)."',
fwashbasinc = '".mysql_real_escape_string($fwashbasinc)."',
fholder = '".mysql_real_escape_string($fholder)."',
fholders = '".mysql_real_escape_string($fholders)."',
fholderc = '".mysql_real_escape_string($fholderc)."',
fsoap = '".mysql_real_escape_string($fsoap)."',
fsoaps = '".mysql_real_escape_string($fsoaps)."',
fsoapc = '".mysql_real_escape_string($fsoapc)."',
fbib = '".mysql_real_escape_string($fbib)."',
fbibs = '".mysql_real_escape_string($fbibs)."',
fbibc = '".mysql_real_escape_string($fbibc)."',
fpedestal2 = '".mysql_real_escape_string($fpedestal2)."',
fpedestal2s = '".mysql_real_escape_string($fpedestal2s)."',
fpedestal2c = '".mysql_real_escape_string($fpedestal2c)."',
fshower2 = '".mysql_real_escape_string($fshower2)."',
fshower2s = '".mysql_real_escape_string($fshower2s)."',
fshower2c = '".mysql_real_escape_string($fshower2c)."',
fwashbasin2 = '".mysql_real_escape_string($fwashbasin2)."',
fwashbasin2s = '".mysql_real_escape_string($fwashbasin2s)."',
fwashbasin2c = '".mysql_real_escape_string($fwashbasin2c)."',
fholder2 = '".mysql_real_escape_string($fholder2)."',
fholder2s = '".mysql_real_escape_string($fholder2s)."',
fholder2c = '".mysql_real_escape_string($fholder2c)."',
fsoap2 = '".mysql_real_escape_string($fsoap2)."',
fsoap2s = '".mysql_real_escape_string($fsoap2s)."',
fsoap2c = '".mysql_real_escape_string($fsoap2c)."',
fbib2 = '".mysql_real_escape_string($fbib2)."',
fbib2s = '".mysql_real_escape_string($fbib2s)."',
fbib2c = '".mysql_real_escape_string($fbib2c)."',
fpedestal3 = '".mysql_real_escape_string($fpedestal3)."',
fpedestal3s = '".mysql_real_escape_string($fpedestal3s)."',
fpedestal3c = '".mysql_real_escape_string($fpedestal3c)."',
fshower3 = '".mysql_real_escape_string($fshower3)."',
fshower3s = '".mysql_real_escape_string($fshower3s)."',
fshower3c = '".mysql_real_escape_string($fshower3c)."',
fwashbasin3 = '".mysql_real_escape_string($fwashbasin3)."',
fwashbasin3s = '".mysql_real_escape_string($fwashbasin3s)."',
fwashbasin3c = '".mysql_real_escape_string($fwashbasin3c)."',
fholder3 = '".mysql_real_escape_string($fholder3)."',
fholder3s = '".mysql_real_escape_string($fholder3s)."',
fholder3c = '".mysql_real_escape_string($fholder3c)."',
fsoap3 = '".mysql_real_escape_string($fsoap3)."',
fsoap3s = '".mysql_real_escape_string($fsoap3s)."',
fsoap3c = '".mysql_real_escape_string($fsoap3c)."',
fbib3 = '".mysql_real_escape_string($fbib3)."',
fbib3s = '".mysql_real_escape_string($fbib3s)."',
fbib3c = '".mysql_real_escape_string($fbib3c)."',
fkitchensink = '".mysql_real_escape_string($fkitchensink)."',
fkitchensinks = '".mysql_real_escape_string($fkitchensinks)."',
fkitchensinkc = '".mysql_real_escape_string($fkitchensinkc)."',
fbibtap = '".mysql_real_escape_string($fbibtap)."',
fbibtaps = '".mysql_real_escape_string($fbibtaps)."',
fbibtapc = '".mysql_real_escape_string($fbibtapc)."',
fbibtapy = '".mysql_real_escape_string($fbibtapy)."',
fbibtapys = '".mysql_real_escape_string($fbibtapys)."',
fbibtapyc = '".mysql_real_escape_string($fbibtapyc)."',
flighting = '".mysql_real_escape_string($flighting)."',
flightings = '".mysql_real_escape_string($flightings)."',
flightingc = '".mysql_real_escape_string($flightingc)."',
ffanpoint = '".mysql_real_escape_string($ffanpoint)."',
ffanpoints = '".mysql_real_escape_string($ffanpoints)."',
ffanpointc = '".mysql_real_escape_string($ffanpointc)."',
fpowerpoint = '".mysql_real_escape_string($fpowerpoint)."',
fpowerpoints = '".mysql_real_escape_string($fpowerpoints)."',
fpowerpointc = '".mysql_real_escape_string($fpowerpointc)."',
fphonepoint = '".mysql_real_escape_string($fphonepoint)."',
fphonepoints = '".mysql_real_escape_string($fphonepoints)."',
fphonepointc = '".mysql_real_escape_string($fphonepointc)."',
ftvpoint = '".mysql_real_escape_string($ftvpoint)."',
ftvpoints = '".mysql_real_escape_string($ftvpoints)."',
ftvpointc = '".mysql_real_escape_string($ftvpointc)."',
fheaterpoint = '".mysql_real_escape_string($fheaterpoint)."',
fheaterpoints = '".mysql_real_escape_string($fheaterpoints)."',
fheaterpointc = '".mysql_real_escape_string($fheaterpointc)."',
faircondpoint = '".mysql_real_escape_string($faircondpoint)."',
faircondpoints = '".mysql_real_escape_string($faircondpoints)."',
faircondpointc = '".mysql_real_escape_string($faircondpointc)."',
fgatepoint = '".mysql_real_escape_string($fgatepoint)."',
fgatepoints = '".mysql_real_escape_string($fgatepoints)."',
fgatepointc = '".mysql_real_escape_string($fgatepointc)."'

WHERE kid = '".mysql_real_escape_string($kendiriid)."'";

$resultupdate = mysql_query($queryupdate) or die (mysql_error());

printf("<script> alert ('Maklumat telah dikemaskini.'); window.location = 'paparkendiri.php?kendiriid=$kendiriid&randomno=$randomno'</script>");


}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Senarai Borang Kendiri</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    


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

.classbga {
	background-color:#FC0;
}

.classbg {
	background-color:#FF9;
}

</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Senarai Borang Kendiri
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
<center><h1>BORANG PEMERIKSAAN KENDIRI KESELAMATAN KUARTERS</h1></center>
		
<form action="" method="POST">
<table width="100%" height="437" border="1" cellpadding="1" align="center" bgcolor="#E1E1FF" bordercolor="#CCCCCC" cellspacing="1">
  <tr>
    <td height="23" colspan="4" align="center" bgcolor="#000000"><strong class="head"><u>BAHAGIAN 1</u></strong></td>
  </tr>
  <tr>
    <td height="34" >Tarikh</td>
    <td>:</td>
    <td colspan="2"><?php echo $kftarikh; ?>&nbsp;</td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="34"> Nama</td>
    <td>:</td>
    <td colspan="2"><input type="text" name="fnama" id="fnama" size="70" value="<?php echo $kfnama; ?>" readonly="readonly"/></td>
  </tr>
  
    <tr>
      <td width="242" height="34">No MyKad</td>
      <td width="4">:</td>
      <td colspan="2"><input name="fnomykad" type="text" id="fnomykad" value="<?php echo $kfnomykad; ?>" size="20" readonly="readonly">
        No Telefon :
        <input name="fnotelefon" type="text" id="fnotelefon" value="<?php echo $kfnotel; ?>" size="20" readonly="readonly"></td>
      </tr>
    <tr bgcolor="#CED8FF">
      <td height="34"> No Bangunan</td>
      <td>:</td>
      <td colspan="2"><textarea name="fbangunan" cols="40" rows="2" id="fbangunan"><?php echo $kfbangunan; ?></textarea>
        Lokasi :
        <?php
            $querylokasi    = "SELECT * FROM tbllokasi where l_status ='$status' order by l_susun asc";
            $resultlokasi    = mysql_query($querylokasi) or die(mysql_error());
			
            echo "<select name=flokasi id=flokasi required=required>";
			
            echo "<option value=''>Sila Pilih</option>";
            while($datalokasi = mysql_fetch_array($resultlokasi))
            {
				if($kflokasi == $datalokasi['l_id'])
				
				{  echo "<option value=$datalokasi[l_id] selected>$datalokasi[l_nama]</option>"; }
				
				else
                { echo "<option value = $datalokasi[l_id]>$datalokasi[l_nama]</option>"; }
            }
            echo "</select>";
        ?></td>
      </tr>
    <tr>
      <td height="41">Alamat</td>
      <td>:</td>
      <td colspan="2">
        <textarea name="falamat" cols="70" rows="2" id="falamat" type="text"><?php echo $kfalamat; ?></textarea>
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
				if($kfjenisbinaan == $datab['jbid'])
				
				{  echo "<option value=$datab[jbid] selected>$datab[jbnama]</option>"; }
				
				else					
                {	echo "<option value = $datab[jbid]>$datab[jbnama]</option>";	}
            }
            echo "</select>";
        ?></td>
      <td width="516">Jenis Rumah :
         <?php
            $queryr    = "SELECT * FROM tbljenisrumah where jrstatus ='$status' order by jrsusun asc ";
            $resultr    = mysql_query($queryr) or die(mysql_error());
			
            echo "<select name=fjenisrumah id=fjenisrumah>";
			
            echo "<option value=''>Sila Pilih</option>";
			
            while($datar = mysql_fetch_array($resultr))
            {
				if($kfjenisrumah == $datar['jrid'])
				
				{ echo "<option value=$datar[jrid] selected>$datar[jrnama]</option>"; }
				
				else
                {	echo "<option value = $datar[jrid]>$datar[jrnama]</option>";	}
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
				
				if($kfjumbil == $datajb['bilid'])
				
				{ echo "<option value=$datajb[bilid] selected>$datajb[bilnama]</option>"; }
				
				else
					
              	{	echo "<option value = $datajb[bilid]>$datajb[bilnama]</option>"; }
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
			
			if($kfcegahbakar == $datacb['ynid'])
				
				{ echo "<option value=$datacb[ynid] selected>$datacb[ynnama]</option>"; }
				
			else
			
              {	echo "<option value = $datacb[ynid]>$datacb[ynnama]</option>";}
            }
            echo "</select>";
        ?></td>
    </tr>
    <tr>
      <td height="50">Adakah pihak kejuruteraan pernah datang membuat pemeriksaan keselamatan di kuarters anda?</td>
      <td>:</td>
      <td>

<select name="fperiksa" required="required" id="fperiksa">
  
        <?php
            $querype    = "SELECT * FROM tblyesno where ynstatus ='$status' order by ynsusun asc ";
			$resultpe   = mysql_query($querype) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datape = mysql_fetch_array($resultpe))
            {
             
			 if($kfperiksa == $datape['ynid'])
				
				{ echo "<option value=$datape[ynid] selected>$datape[ynnama]</option>"; }
				
			else
			
              {	echo "<option value = $datape[ynid]>$datape[ynnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div id="divperiksa" class="classbga">Nyatakan bila dan kenapa<br />
        <textarea name="fperiksa2" cols="50" rows="2" id="fperiksa2" type="text"><?php echo $kfperiksa2; ?></textarea>
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
			 if($kffblanket == $datafbl['ynid'])
				
				{ echo "<option value=$datafbl[ynid] selected>$datafbl[ynnama]</option>"; }
				
			else
			
              {	
              echo "<option value = $datafbl[ynid]>$datafbl[ynnama]</option>";}
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
			 if($kffext == $datafbex['ynid'])
				
				{ echo "<option value=$datafbex[ynid] selected>$datafbex[ynnama]</option>"; }
				
			else
			
              {	
              echo "<option value = $datafbex[ynid]>$datafbex[ynnama]</option>"; }
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
        <select name="fsoket" required="required" id="fsoket">
          <?php
            $queryfsoket    = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfsoket   = mysql_query($queryfsoket) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafsoket = mysql_fetch_array($resultfsoket))
            {             
			 if($kfsoket == $datafsoket['stid'])
				
				{ echo "<option value=$datafsoket[stid] selected>$datafsoket[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafsoket[stid]>$datafsoket[stnama]</option>";}
            }
        ?>
        </select></td>
      <td width="656"><div id="divfsoketc" class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="fsoketc" cols="70" rows="2" id="fsoketc"><?php echo $kfsoketc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">2</td>
      <td>Kipas</td>
      <td><select name="fkipas" required="required" id="fkipas">
        <?php
            $queryfkipas   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkipas   = mysql_query($queryfkipas) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkipas = mysql_fetch_array($resultfkipas))
            {             
			 if($kfkipas == $datafkipas['stid'])
				
				{ echo "<option value=$datafkipas[stid] selected>$datafkipas[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafkipas[stid]>$datafkipas[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div class="classbg" id="divfkipasc">Nyatakan bila dan kenapa<br />
      <textarea name="fkipasc" cols="70" rows="2" id="fkipasc"><?php echo $kfkipasc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">3</td>
      <td>Lampu</td>
      <td><select name="flampu" required="required" id="flampu">
        <?php
            $queryflampu   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflampu   = mysql_query($queryflampu) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflampu = mysql_fetch_array($resultflampu))
            {             
			 if($kflampu == $dataflampu['stid'])
				
				{ echo "<option value=$dataflampu[stid] selected>$dataflampu[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $dataflampu[stid]>$dataflampu[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div id="divflampuc" class="classbga" >Nyatakan bila dan kenapa<br />
      <textarea name="flampuc" cols="70" rows="2" id="flampuc"><?php echo $kflampuc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">4</td>
      <td>Pendawaian</td>
      <td><select name="fdawai" required="required" id="fdawai">
        <?php
            $queryfdawai   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfdawai   = mysql_query($queryfdawai) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafdawai = mysql_fetch_array($resultfdawai))
            {            
			 if($kfdawai == $datafdawai['stid'])
				
				{ echo "<option value=$datafdawai[stid] selected>$datafdawai[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafdawai[stid]>$datafdawai[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfdawaic" >Nyatakan bila dan kenapa<br />
      <textarea name="fdawaic" cols="70" rows="2" id="fdawaic"><?php echo $kfdawaic; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="39">5</td>
      <td width="299">Lain-lain</td>
      <td colspan="2">
        <textarea name="flaine" cols="70" rows="2" id="flaine"><?php echo $kflaine; ?></textarea></td>
      </tr>
    <tr>
      <td colspan="4" bgcolor="#CCCCCC" class="subhead">Mekanikal</td>
      </tr>
    <tr>
      <td >6</td>
      <td>Tekanan air rendah/tiada air</td>
      <td><select name="ftekananair" required="required" id="ftekananair">
        <?php
            $queryftekananair   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftekananair   = mysql_query($queryftekananair) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftekananair = mysql_fetch_array($resultftekananair))
            {            
			 if($kftekananair == $dataftekananair['stid'])
				
				{ echo "<option value=$dataftekananair[stid] selected>$dataftekananair[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $dataftekananair[stid]>$dataftekananair[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divftekananairc" >Nyatakan bila dan kenapa<br />
        <textarea name="ftekananairc" cols="70" rows="2" id="ftekananairc"><?php echo $kftekananairc; ?></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">7</td>
      <td>Alat pendingin hawa</td>
      <td><select name="fhawadingin" required="required" id="fhawadingin">
        <?php
            $queryfhawadingin   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfhawadingin   = mysql_query($queryfhawadingin) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafhawadingin = mysql_fetch_array($resultfhawadingin))
            {            
			 if($kfhawadingin == $datafhawadingin['stid'])
				
				{ echo "<option value=$datafhawadingin[stid] selected>$datafhawadingin[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafhawadingin[stid]>$datafhawadingin[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfhawadinginc" class="classbga" >Nyatakan bila dan kenapa<br />
      <textarea name="fhawadinginc" cols="70" rows="2" id="fhawadinginc"><?php echo $kfhawadinginc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">8</td>
      <td>Tangki septik tersumbat</td>
      <td><select name="ftangkiseptik" required="required" id="ftangkiseptik" >
        <?php
            $queryftangkiseptik   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftangkiseptik   = mysql_query($queryftangkiseptik) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftangkiseptik = mysql_fetch_array($resultftangkiseptik))
            {            
			 if($kftangkiseptik == $dataftangkiseptik['stid'])
				
				{ echo "<option value=$dataftangkiseptik[stid] selected>$dataftangkiseptik[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $dataftangkiseptik[stid]>$dataftangkiseptik[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftangkiseptikc" >Nyatakan bila dan kenapa<br />
      <textarea name="ftangkiseptikc" cols="70" id="ftangkiseptikc"><?php echo $kftangkiseptikc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">9</td>
      <td>Pam tandas rosak/bocor</td>
      <td><select name="fpambocor" required="required" id="fpambocor">
        <?php
            $queryfpambocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpambocor   = mysql_query($queryfkipas) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpambocor = mysql_fetch_array($resultfpambocor))
            {            
			 if($kfpambocor == $datafpambocor['stid'])
				
				{ echo "<option value=$datafpambocor[stid] selected>$datafpambocor[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafpambocor[stid]>$datafpambocor[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfpambocorc"  class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="fpambocorc" cols="70" id="fpambocorc"><?php echo $kfpambocorc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">10</td>
      <td>Sinki bocor/tersumbat</td>
      <td><select name="fsinkibocor" required="required" id="fsinkibocor" >
        <?php
            $queryfsinkibocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfsinkibocor   = mysql_query($queryfsinkibocor) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafsinkibocor = mysql_fetch_array($resultfsinkibocor))
            {           
			 if($kfsinkibocor == $datafsinkibocor['stid'])
				
				{ echo "<option value=$datafsinkibocor[stid] selected>$datafsinkibocor[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafsinkibocor[stid]>$datafsinkibocor[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfsinkibocorc" >Nyatakan bila dan kenapa<br />
      <textarea name="fsinkibocorc" cols="70" id="fsinkibocorc"><?php echo $kfsinkibocorc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">11</td>
      <td>Paip pecah/bocor</td>
      <td><select name="fpaippecah" required="required" id="fpaippecah" >
        <?php
            $queryfpaippecah   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpaippecah   = mysql_query($queryfpaippecah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpaippecah = mysql_fetch_array($resultfpaippecah))
            {          
			 if($kfpaippecah == $datafpaippecah['stid'])
				
				{ echo "<option value=$datafpaippecah[stid] selected>$datafpaippecah[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafpaippecah[stid]>$datafpaippecah[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfpaippecahc"  class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="fpaippecahc" cols="70" id="fpaippecahc"><?php echo $kfpaippecahc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="39">12</td>
      <td>Lain-Lain</td>
      <td colspan="2"><textarea name="flainm" cols="70" id="flainm"><?php echo $kflainm; ?></textarea></td>
    </tr>
    <tr>
      <td height="31" colspan="4" bgcolor="#CCCCCC" class="subhead">Sivil , Struktur &amp; Seni Bina</td>
      </tr>
    <tr bgcolor="#CED8FF">
      <td >13</td>
      <td>Retak</td>
      <td><select name="fretak" required="required" id="fretak">
        <?php
            $queryfretak   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfretak   = mysql_query($queryfretak) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafretak = mysql_fetch_array($resultfretak))
            {            
			 if($kfretak ==  $datafretak['stid'])
				
				{ echo "<option value= $datafretak[stid] selected>$datafretak[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafretak[stid]>$datafretak[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divfretakc" >Nyatakan bila dan kenapa<br />
        <textarea name="fretakc" cols="70" id="fretakc"><?php echo $kfretakc; ?></textarea></div>
      </td>
    </tr>
    <tr>
      <td >14</td>
      <td>Patah</td>
      <td><select name="fpatah" required="required" id="fpatah">
        <?php
            $queryfpatah  = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpatah   = mysql_query($queryfpatah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpatah = mysql_fetch_array($resultfpatah))
            {           
			 if($kfpatah ==  $datafpatah['stid'])
				
				{ echo "<option value= $datafpatah[stid] selected>$datafpatah[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafpatah[stid]>$datafpatah[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfpatahc" class="classbga" >Nyatakan bila dan kenapa<br />
      <textarea name="fpatahc" cols="70" id="fpatahc"><?php echo $kfpatahc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >15</td>
      <td>Tercabut/ Tertanggal</td>
      <td><select name="fcabut" required="required" id="fcabut">
        <?php
            $queryfcabut   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfcabut   = mysql_query($queryfcabut) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafcabut = mysql_fetch_array($resultfcabut))
            {                      
			 if($kfcabut ==  $datafcabut['stid'])
				
				{ echo "<option value= $datafcabut[stid] selected>$datafcabut[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafcabut[stid]>$datafcabut[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfcabutc" >Nyatakan bila dan kenapa<br />
      <textarea name="fcabutc" cols="70" id="fcabutc"><?php echo $kfcabutc; ?></textarea></div></td>
    </tr>
    <tr>
      <td >16</td>
      <td>Bocor</td>
      <td><select name="fbocor" required="required" id="fbocor">
        <?php
            $queryfbocor   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfbocor   = mysql_query($queryfbocor) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafbocor = mysql_fetch_array($resultfbocor))
            {                     
			 if($kfbocor ==  $datafbocor['stid'])
				
				{ echo "<option value= $datafbocor[stid] selected>$datafbocor[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafbocor[stid]>$datafbocor[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfbocorc"  class="classbga" >Nyatakan bila dan kenapa<br />
      <textarea name="fbocorc" cols="70" id="fbocorc"><?php echo $kfbocorc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >17</td>
      <td>Karat</td>
      <td><select name="fkarat" required="required" id="fkarat">
        <?php
            $queryfkarat   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkarat   = mysql_query($queryfkarat) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkarat = mysql_fetch_array($resultfkarat))
            {                     
			 if($kfkarat ==  $datafkarat['stid'])
				
				{ echo "<option value= $datafkarat[stid] selected>$datafkarat[stnama]</option>"; }
				
			else
			
              {
              echo "<option value = $datafkarat[stid]>$datafkarat[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfkaratc" >Nyatakan bila dan kenapa<br />
      <textarea name="fkaratc" cols="70" id="fkaratc"><?php echo $kfkaratc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">18</td>
      <td>Reput</td>
      <td><select name="freput" required="required" id="freput">
        <?php
            $queryfreput  = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfreput   = mysql_query($queryfreput) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafreput = mysql_fetch_array($resultfreput))
            {                     
			 if($kfreput ==  $datafreput['stid'])
				
				{ echo "<option value= $datafreput[stid] selected>$datafreput[stnama]</option>"; }
				
			else
			
              {	echo "<option value = $datafreput[stid]>$datafreput[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divfreputc"  class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="freputc" cols="70" id="freputc"><?php echo $kfreputc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td>19</td>
      <td>Anai-anai</td>
      <td>
        <select name="fanai" required="required" id="fanai">
          <?php
            $queryfanai   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfanai   = mysql_query($queryfanai) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafanai = mysql_fetch_array($resultfanai))
            {                     
			 if($kfanai ==  $datafanai['stid'])
				
				{ echo "<option value= $datafanai[stid] selected>$datafanai[stnama]</option>"; }
				
			else
			
              {	
              echo "<option value = $datafanai[stid]>$datafanai[stnama]</option>";}
            }
        ?>
        </select></td>
      <td>
        <div  class="classbg" id="divfanaic" >Nyatakan bila dan kenapa<br />
        <textarea name="fanaic" cols="70" id="fanaic"><?php echo $kfanaic; ?></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">20</td>
      <td>Kelawar</td>
      <td><select name="fkelawar" required="required" id="fkelawar">
        <?php
            $queryfkelawar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkelawar   = mysql_query($queryfkelawar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkelawar = mysql_fetch_array($resultfkelawar))
            {                     
			 if($kfkelawar ==  $datafkelawar['stid'])
				
				{ echo "<option value= $datafkelawar[stid] selected>$datafkelawar[stnama]</option>"; }
				
			else
			
              {	
              echo "<option value = $datafkelawar[stid]>$datafkelawar[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div id="divfkelawarc"  class="classbga">Nyatakan bila dan kenapa<br />
        <textarea name="fkelawarc" cols="70" id="fkelawarc"><?php echo $kfkelawarc; ?></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">21</td>
      <td>Tidak boleh ditutup / dikunci (Pintu/Tingkap)</td>
      <td><select name="ftutup" required="required" id="ftutup">
        <?php
            $queryftutup   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftutup   = mysql_query($queryftutup) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftutup = mysql_fetch_array($resultftutup))
            {                     
			 if($kftutup ==  $dataftutup['stid'])
				
				{ echo "<option value= $dataftutup[stid] selected>$dataftutup[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftutup[stid]>$dataftutup[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftutupc" >Nyatakan bila dan kenapa<br />
      <textarea name="ftutupc" cols="70" id="ftutupc"><?php echo $kftutupc; ?></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2B : LUAR RUMAH &amp; KAWASAN GUNA SAMA</b></td>
    </tr>
    <tr>
      <td height="26">22</td>
      <td>Tanah Runtuh</td>
      <td><select name="ftanahruntuh" required="required" id="ftanahruntuh">
        <?php
            $queryftanahruntuh   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftanahruntuh   = mysql_query($queryftanahruntuh) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftanahruntuh = mysql_fetch_array($resultftanahruntuh))
            {                     
			 if($kftanahruntuh ==  $dataftanahruntuh['stid'])
				
				{ echo "<option value= $dataftanahruntuh[stid] selected>$dataftanahruntuh[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftanahruntuh[stid]>$dataftanahruntuh[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td>
        <div id="divftanahruntuhc"  class="classbga">Nyatakan bila dan kenapa<br />
        <textarea name="ftanahruntuhc" cols="70" rows="0" id="ftanahruntuhc"><?php echo $kftanahruntuhc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="39">23</td>
      <td>Pokok teduhan reput/mati/berisiko untuk tumbang</td>
      <td><select name="fteduhan" required="required" id="fteduhan">
        <?php
            $queryfteduhan   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfteduhan   = mysql_query($queryfteduhan) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafteduhan = mysql_fetch_array($resultfteduhan))
            {                     
			 if($kfteduhan ==  $datafteduhan['stid'])
				
				{ echo "<option value= $datafteduhan[stid] selected>$datafteduhan[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafteduhan[stid]>$datafteduhan[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divfteduhanc" >Nyatakan bila dan kenapa<br />
        <textarea name="fteduhanc" cols="70" id="fteduhanc"><?php echo $kfteduhanc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">24</td>
      <td>Tembok penahan retak/pecah</td>
      <td><select name="ftembok" required="required" id="ftembok" >
        <?php
            $queryftembok   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftembok   = mysql_query($queryftembok) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftembok = mysql_fetch_array($resultftembok))
            {                     
			 if($kftembok ==  $dataftembok['stid'])
				
				{ echo "<option value= $dataftembok[stid] selected>$dataftembok[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftembok[stid]>$dataftembok[stnama]</option>";}
            }
        ?>
      </select></td>
      <td><div id="divftembokc" class="classbga" >Nyatakan bila dan kenapa<br />
      <textarea name="ftembokc" cols="70" id="ftembokc"><?php echo $kftembokc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">25</td>
      <td>Taman permainan/rekreasi rosak/tidak selamat</td>
      <td><select name="ftaman" required="required" id="ftaman">
        <?php
            $queryftaman   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftaman   = mysql_query($queryftaman) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftaman = mysql_fetch_array($resultftaman))
            {                     
			 if($kftaman ==  $dataftaman['stid'])
				
				{ echo "<option value= $dataftaman[stid] selected>$dataftaman[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftaman[stid]>$dataftaman[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divftamanc" >Nyatakan bila dan kenapa<br />
      <textarea name="ftamanc" cols="70" id="ftamanc"><?php echo $kftamanc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">26</td>
      <td>Pagar Rosak</td>
      <td><select name="fpagar" required="required" id="fpagar">
        <?php
            $queryfpagar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpagar   = mysql_query($queryfpagar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpagar = mysql_fetch_array($resultfpagar))
            {                    
			 if($kfpagar ==  $datafpagar['stid'])
				
				{ echo "<option value= $datafpagar[stid] selected>$datafpagar[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpagar[stid]>$datafpagar[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div id="divfpagarc" class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="fpagarc" cols="70" id="fpagarc"><?php echo $kfpagarc; ?></textarea></div></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">27</td>
      <td>Longkang pecah/banjir/tersumbat/air bertakung</td>
      <td><select name="flongkang" required="required" id="flongkang">
        <?php
            $queryflongkang   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflongkang   = mysql_query($queryflongkang) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflongkang = mysql_fetch_array($resultflongkang))
            {                    
			 if($kflongkang == $dataflongkang['stid'])
				
				{ echo "<option value= $dataflongkang[stid] selected>$dataflongkang[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataflongkang[stid]>$dataflongkang[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divflongkangc" >Nyatakan bila dan kenapa<br />
      <textarea name="flongkangc" cols="70" id="flongkangc"><?php echo $kflongkangc; ?></textarea></div></td>
    </tr>
    <tr>
      <td height="26">28</td>
      <td>Parkir pecah/ berlubang</td>
      <td><select name="fparkir" required="required" id="fparkir">
        <?php
            $queryfparkir   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfparkir   = mysql_query($queryfparkir) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafparkir = mysql_fetch_array($resultfparkir))
            {                    
			 if($kfparkir == $datafparkir['stid'])
				
				{ echo "<option value= $datafparkir[stid] selected>$datafparkir[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafparkir[stid]>$datafparkir[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div id="divfparkirc"  class="classbga" >Nyatakan bila dan kenapa<br />
        <textarea name="fparkirc" cols="70" id="fparkirc"><?php echo $kfparkirc; ?></textarea></div>
      </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">29</td>
      <td>Lampu kawasan/parkir rosak</td>
      <td><select name="flampukawasan" required="required" id="flampukawasan">
        <?php
            $queryflampukawasan   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflampukawasan   = mysql_query($queryflampukawasan) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflampukawasan = mysql_fetch_array($resultflampukawasan))
            {                   
			 if($kflampukawasan== $dataflampukawasan['stid'])
				
				{ echo "<option value= $dataflampukawasan[stid] selected>$dataflampukawasan[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataflampukawasan[stid]>$dataflampukawasan[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div  class="classbg" id="divflampukawasanc" >Nyatakan bila dan kenapa<br />
        <textarea name="flampukawasanc" cols="70" id="flampukawasanc"><?php echo $kflampukawasanc; ?></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">30</td>
      <td>Lampu tangga rosak</td>
      <td><select name="flamputangga" required="required" id="flamputangga">
        <?php
            $queryflamputangga   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflamputangga   = mysql_query($queryflamputangga) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflamputangga = mysql_fetch_array($resultflamputangga))
            {                  
			 if($kflamputangga == $dataflamputangga['stid'])
				
				{ echo "<option value= $dataflamputangga[stid] selected>$dataflamputangga[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataflamputangga[stid]>$dataflamputangga[stnama]</option>";}
            }
        ?>
      </select></td>
      <td>
        <div id="divflamputanggac"  class="classbga">Nyatakan bila dan kenapa<br />
        <textarea name="flamputanggac" cols="70" id="flamputanggac"><?php echo $kflamputanggac; ?></textarea></div>
     </td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">31</td>
      <td>Tangga pecah/tidak selamat</td>
      <td><select name="ftanggapecah" required="required" id="ftanggapecah">
        <?php
            $queryftanggapecah   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultftanggapecah   = mysql_query($queryftanggapecah) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataftanggapecah = mysql_fetch_array($resultftanggapecah))
            {                 
			 if($kftanggapecah == $dataftanggapecah['stid'] )
				
				{ echo "<option value = $dataftanggapecah[stid] selected>$dataftanggapecah[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftanggapecah[stid]>$dataftanggapecah[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td>
       <div  class="classbg" id="divftanggapecahc" >Nyatakan bila dan kenapa<br />
       <textarea name="ftanggapecahc" cols="70" id="ftanggapecahc"><?php echo $kftanggapecahc; ?></textarea></div>
      </td>
    </tr>
    <tr>
      <td height="26">32</td>
      <td>Lif rosak</td>
      <td><select name="flifrosak" required="required" id="flifrosak">
        <?php
            $queryflifrosak   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultflifrosak   = mysql_query($queryflifrosak) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($dataflifrosak = mysql_fetch_array($resultflifrosak))
            {                
			 if($kflifrosak == $dataflifrosak['stid'])
				
				{ echo "<option value = $dataflifrosak[stid] selected>$dataflifrosak[stnama]</option>"; }
				
			else
			
                { echo "<option value = $dataflifrosak[stid]>$dataflifrosak[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div id="divflifrosakc"  class="classbga">Nyatakan bila dan kenapa<br />
      <textarea name="flifrosakc" cols="70" id="flifrosakc"><?php echo $kflifrosakc; ?></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2C : KESELAMATAN KEBAKARAN</b></td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td >33</td>
      <td>Berbau hangit</td>
      <td><select name="fhangit" required="required" id="fhangit" >
        <?php
            $queryfhangit   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfhangit   = mysql_query($queryfhangit) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafhangit = mysql_fetch_array($resultfhangit))
            {               
			 if($kfhangit == $datafhangit['stid'])
				
				{ echo "<option value = $datafhangit[stid] selected>$datafhangit[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafhangit[stid]>$datafhangit[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td>
        
          <div  class="classbg" id="divfhangitc" >Nyatakan bila dan kenapa<br />
          <textarea name="fhangitc" cols="70" id="fhangitc"><?php echo $kfhangitc; ?></textarea></div>
</td>
    </tr>
    <tr>
      <td height="26">34</td>
      <td>Kesan terbakar</td>
      <td><select name="fkesanbakar" required="required" id="fkesanbakar">
        <?php
            $queryfkesanbakar   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfkesanbakar   = mysql_query($queryfkesanbakar) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafkesanbakar = mysql_fetch_array($resultfkesanbakar))
            {              
			 if($kfkesanbakar == $datafkesanbakar['stid'])
				
				{ echo "<option value = $datafkesanbakar[stid] selected>$datafkesanbakar[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafkesanbakar[stid]>$datafkesanbakar[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td>
        <div id="divfkesanbakarc"  class="classbga">Nyatakan bila dan kenapa<br />
        <textarea name="fkesanbakarc" cols="70" id="fkesanbakarc"><?php echo $kfkesanbakarc; ?></textarea></div>
</td>
    </tr>
    <tr bgcolor="#CED8FF">
      <td height="26">35</td>
      <td>Percikan api</td>
      <td><select name="fpercikanapi" required="required" id="fpercikanapi" >
        <?php
            $queryfpercikanapi   = "SELECT * FROM tblstatus where ststatus ='$status' order by stsusun asc ";
			$resultfpercikanapi   = mysql_query($queryfpercikanapi) or die(mysql_error());

            echo "<option value=''>Sila Pilih</option>";
						
            while($datafpercikanapi = mysql_fetch_array($resultfpercikanapi))
            {             
			 if($kfpercikanapi == $datafpercikanapi['stid'])
				
				{ echo "<option value = $datafpercikanapi[stid] selected>$datafpercikanapi[stnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpercikanapi[stid]>$datafpercikanapi[stnama]</option>"; }
            }
        ?>
      </select></td>
      <td><div  class="classbg" id="divfpercikanapic" >Nyatakan bila dan kenapa<br />
      <textarea name="fpercikanapic" cols="70" id="fpercikanapic"><?php echo $kfpercikanapic; ?></textarea></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#330099"><b class="head">BAHAGIAN 2D : LAIN-LAIN</b></td>
    </tr>
    <tr>
      <td height="39">36</td>
      <td>Lain-lain</td>
      <td colspan="2"><textarea name="flainlain" cols="70" rows="3" id="flainlain"><?php echo $kflainlain; ?></textarea></td>
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
      <input name="fpintuutama" type="text" id="fpintuutama" value="<?php echo $kfpintuutama; ?>" size="15" /></td>
    <td width="143" class="tengah">
   <?php
            $queryfpintuutama   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpintuutama    = mysql_query($queryfpintuutama) or die(mysql_error());
			
            echo "<select name=fpintuutamas id=fpintuutamas>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafpintuutama = mysql_fetch_array($resultfpintuutama))
            {            
			 if($kfpintuutamas == $datafpintuutama['pid'])
				
				{ echo "<option value = $datafpintuutama[pid] selected>$datafpintuutama[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpintuutama[pid]>$datafpintuutama[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td width="460"><input name="fpintuutamac" type="text" id="fpintuutamac" value="<?php echo $kfpintuutamac; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="26">2.</td>
    <td height="26">Bilik Tidur Utama</td>
    <td class="tengah">
      <input name="fbilikutama" type="text" id="fbilikutama" value="<?php echo $kfbilikutama; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikutama   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikutama    = mysql_query($queryfbilikutama) or die(mysql_error());
			
            echo "<select name=fbilikutamas id=fbilikutamas>";
			
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbilikutama = mysql_fetch_array($resultfbilikutama))
            {           
			 if($kfbilikutamas == $datafbilikutama['pid'])
				
				{ echo "<option value = $datafbilikutama[pid] selected>$datafbilikutama[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbilikutama[pid]>$datafbilikutama[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
  
    <td><input name="fbilikutamac" type="text" id="fbilikutamac" value="<?php echo $kfbilikutamac; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">3.</td>
    <td height="26">Bilik Tidur 2</td>
    <td class="tengah">
      <input name="fbilikdua" type="text" id="fbilikdua" value="<?php echo $kfbilikdua; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikdua   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikdua    = mysql_query($queryfbilikdua) or die(mysql_error());
			
            echo "<select name=fbilikduas id=fbilikduas>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbilikdua = mysql_fetch_array($resultfbilikdua))
            {          
			 if($kfbilikduas == $datafbilikdua['pid'])
				
				{ echo "<option value = $datafbilikdua[pid] selected>$datafbilikdua[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbilikdua[pid]>$datafbilikdua[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbilikduac" type="text" id="fbilikduac" value="<?php echo $kfbilikduac; ?>"  size="50" /></td>
  </tr>
  <tr>
    <td height="26">4.</td>
    <td height="26">Bilik Tidur 3</td>
    <td class="tengah">
      <input name="fbiliktiga" type="text" id="fbiliktiga" value="<?php echo $kfbiliktiga; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbiliktiga   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbiliktiga    = mysql_query($queryfbiliktiga) or die(mysql_error());
			
            echo "<select name=fbiliktigas id=fbiliktigas>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbiliktiga = mysql_fetch_array($resultfbiliktiga))
            {          
			 if($kfbiliktigas == $datafbiliktiga['pid'])
				
				{ echo "<option value = $datafbiliktiga[pid] selected>$datafbiliktiga[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbiliktiga[pid]>$datafbiliktiga[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbiliktigac" type="text" id="fbiliktigac" value="<?php echo $kfbiliktigac; ?>"  size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">5.</td>
    <td height="26">Bilik Tidur 4</td>
    <td class="tengah">
      <input name="fbilikempat" type="text" id="fbilikempat" value="<?php echo $kfbilikempat; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbilikempat   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbilikempat    = mysql_query($queryfbilikempat) or die(mysql_error());
			
            echo "<select name=fbilikempats id=fbilikempats>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbilikempat = mysql_fetch_array($resultfbilikempat))
            {         
			 if($kfbilikempats == $datafbilikempat['pid'])
				
				{ echo "<option value = $datafbilikempat[pid] selected>$datafbilikempat[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbilikempat[pid]>$datafbilikempat[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbilikempatc" type="text" id="fbilikempatc" value="<?php echo $kfbilikempatc; ?>"  size="50"/></td>
  </tr>
  <tr>
    <td height="26">6.</td>
    <td height="26">Stor</td>
    <td class="tengah">
      <input name="fstor" type="text" id="fstor" value="<?php echo $kfstor; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfstor  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc";
            $resultfstor    = mysql_query($queryfstor) or die(mysql_error());
			
            echo "<select name=fstors id=fstors>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafstor = mysql_fetch_array($resultfstor))
            {        
			 if($kfstors == $datafstor['pid'])
				
				{ echo "<option value = $datafstor[pid] selected>$datafstor[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafstor[pid]>$datafstor[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fstorc" type="text" id="fstorc" value="<?php echo $kfstorc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">7.</td>
    <td height="26">Yard / Dapur</td>
    <td class="tengah">
      <input name="fdapur" type="text" id="fdapur" value="<?php echo $kfdapur; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfdapur   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfdapur    = mysql_query($queryfdapur) or die(mysql_error());
           
		    echo "<select name=fdapurs id=fdapurs>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafdapur = mysql_fetch_array($resultfdapur))
            {       
			 if($kfdapurs == $datafdapur['pid'])
				
				{ echo "<option value = $datafdapur[pid] selected>$datafdapur[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafdapur[pid]>$datafdapur[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fdapurc" type="text" id="fdapurc" value="<?php echo $kfdapurc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="26">8.</td>
    <td height="26">Ruang Makan / Ruang Tamu </td>
    <td class="tengah">
      <input name="fruangmakan" type="text" id="fruangmakan" value="<?php echo $kfruangmakan; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfruangmakan  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfruangmakan    = mysql_query($queryfruangmakan) or die(mysql_error());
			
            echo "<select name=fruangmakans id=fruangmakans>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafruangmakan = mysql_fetch_array($resultfruangmakan))
            {       
			 if($kfruangmakans == $datafruangmakan['pid'])
				
				{ echo "<option value = $datafruangmakan[pid] selected>$datafruangmakan[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafruangmakan[pid]>$datafruangmakan[pnama]</option>";  }
            }
            echo "</select>";
        ?></td>
    <td><input name="fruangmakanc" type="text" id="fruangmakanc" value="<?php echo $kfruangmakanc; ?>"  size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">9. </td>
    <td height="26">Pantri</td>
    <td class="tengah"><label for="pantri"></label>
      <input name="fpantri" type="text" id="fpantri" value="<?php echo $kfpantri; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfpantri   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpantri    = mysql_query($queryfpantri) or die(mysql_error());
			
            echo "<select name=fpantris id=fpantris>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafpantri = mysql_fetch_array($resultfpantri))
            {				       
			 if($kfpantris == $datafpantri['pid'])
				
				{ echo "<option value = $datafpantri[pid] selected>$datafpantri[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpantri[pid]>$datafpantri[pnama]</option>";  }
            }
            echo "</select>";
        ?></td>
    <td><input name="fpantric" type="text" id="fpantric" value="<?php echo $kfpantric; ?>"  size="50" /></td>
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
    <td class="tengah"><input name="fmetertnb" type="text" id="fmetertnb" value="<?php echo $kfmetertnb; ?>" size="15" /></td>
    <td class="tengah"><input name="fmetertnbb" type="text" id="fmetertnbb" value="<?php echo $kfmetertnbb; ?>" size="15" /></td>
    <td><input name="fmetertnbc" type="text" id="fmetertnbc" value="<?php echo $kfmetertnbc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">2.</td>
    <td height="26">Meter Air SAJR</td>
    <td class="tengah"><input name="fmetersaj" type="text" id="fmetersaj" value="<?php echo $kfmetersaj; ?>" size="15" /></td>
    <td class="tengah"><input name="fmetersajb" type="text" id="fmetersajb" value="<?php echo $kfmetersajb; ?>" size="15" /></td>
    <td><input name="fmetersajc" type="text" id="fmetersajc" value="<?php echo $kfmetersajc; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fpedestal" type="text" id="fpedestal" value="<?php echo $kfpedestal; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal    = mysql_query($queryfpedestal) or die(mysql_error());
			
            echo "<select name=fpedestals id=fpedestals>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpedestal = mysql_fetch_array($resultfpedestal))
            {				       
			 if($kfpedestals == $datafpedestal['pid'])
				
				{ echo "<option value = $datafpedestal[pid] selected>$datafpedestal[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpedestal[pid]>$datafpedestal[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fpedestalc" type="text" id="fpedestalc" value="<?php echo $kfpedestalc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">2.</td>
    <td height="31">Shower rose</td>
    <td class="tengah"><input name="fshower" type="text" id="fshower" value="<?php echo $kfshower; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower    = mysql_query($queryfshower) or die(mysql_error());
            echo "<select name=fshowers id=fshowers>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafshower = mysql_fetch_array($resultfshower))
            {				       
			 if($kfshowers == $datafshower['pid'])
				
				{ echo "<option value = $datafshower[pid] selected>$datafshower[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafshower[pid]>$datafshower[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fshowerc" type="text" id="fshowerc" value="<?php echo $kfshowerc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="31">3.</td>
    <td height="31">Wash basin</td>
    <td class="tengah"><input name="fwashbasin" type="text" id="fwashbasin" value="<?php echo $kfwashbasin; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin    = mysql_query($queryfwashbasin) or die(mysql_error());
			
            echo "<select name=fwashbasins id=fwashbasins>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafwashbasin = mysql_fetch_array($resultfwashbasin))
            {				       
			 if($kfwashbasins == $datafwashbasin['pid'])
				
				{ echo "<option value = $datafwashbasin[pid] selected>$datafwashbasin[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafwashbasin[pid]>$datafwashbasin[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fwashbasinc" type="text" id="fwashbasinc" value="<?php echo $kfwashbasinc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">4.</td>
    <td height="31">Toilet paper holder</td>
    <td class="tengah"><input name="fholder" type="text" id="fholder" value="<?php echo $kfholder; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder    = mysql_query($queryfholder) or die(mysql_error());
            echo "<select name=fholders id=fholders>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafholder = mysql_fetch_array($resultfholder))
            {				       
			 if($kfholders == $datafholder['pid'])
				
				{ echo "<option value = $datafholder[pid] selected>$datafholder[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafholder[pid]>$datafholder[pnama]</option>";  }
            }
            echo "</select>";
        ?></td>
    <td><input name="fholderc" type="text" id="fholderc" value="<?php echo $kfholderc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="31">5.</td>
    <td height="31">Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap" type="text" id="fsoap" value="<?php echo $kfsoap; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap    = mysql_query($queryfsoap) or die(mysql_error());
            echo "<select name=fsoaps id=fsoaps>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafsoap = mysql_fetch_array($resultfsoap))
            {				       
			 if($kfsoaps == $datafsoap['pid'])
				
				{ echo "<option value = $datafsoap[pid] selected>$datafsoap[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafsoap[pid]>$datafsoap[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fsoapc" type="text" id="fsoapc" value="<?php echo $kfsoapc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="31">6</td>
    <td height="31">Bib tap</td>
    <td class="tengah"><input name="fbib" type="text" id="fbib" value="<?php echo $kfbib; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib    = mysql_query($queryfbib) or die(mysql_error());
			
            echo "<select name=fbibs id=fbibs>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbib = mysql_fetch_array($resultfbib))
            {				       
			 if($kfbibs == $datafbib['pid'])
				
				{ echo "<option value = $datafbib[pid] selected>$datafbib[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbib[pid]>$datafbib[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbibc" type="text" id="fbibc" value="<?php echo $kfbibc; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fpedestal2" type="text" id="fpedestal2" value="<?php echo $kfpedestal2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal2    = mysql_query($queryfpedestal2) or die(mysql_error());
            echo "<select name=fpedestal2s id=fpedestal2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafpedestal2 = mysql_fetch_array($resultfpedestal2))
            {				       
			 if($kfpedestal2s == $datafpedestal2['pid'])
				
				{ echo "<option value = $datafpedestal2[pid] selected>$datafpedestal2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpedestal2[pid]>$datafpedestal2[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fpedestal2c" type="text" id="fpedestal2c" value="<?php echo $kfpedestal2c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>2.</td>
    <td height="31">Shower rose</td>
    <td class="tengah"><input name="fshower2" type="text" id="fshower2" value="<?php echo $kfshower2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower2    = mysql_query($queryfshower2) or die(mysql_error());
            echo "<select name=fshower2s id=fshower2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafshower2 = mysql_fetch_array($resultfshower2))
            {				       
			 if($kfshower2s == $datafshower2['pid'])
				
				{ echo "<option value = $datafshower2[pid] selected>$datafshower2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafshower2[pid]>$datafshower2[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fshower2c" type="text" id="fshower2c" value="<?php echo $kfshower2c; ?>" size="50" /></td>
    </tr>
  <tr>
    <td>3.</td>
    <td height="26">Wash basin</td>
    <td class="tengah"><input name="fwashbasin2" type="text" id="fwashbasin2" value="<?php echo $kfwashbasin2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin2  = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin2    = mysql_query($queryfwashbasin2) or die(mysql_error());
            echo "<select name=fwashbasin2s id=fwashbasin2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafwashbasin2 = mysql_fetch_array($resultfwashbasin2))
            {				       
			 if($kfwashbasin2s == $datafwashbasin2['pid'])
				
				{ echo "<option value = $datafwashbasin2[pid] selected>$datafwashbasin2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafwashbasin2[pid]>$datafwashbasin2[pnama]</option>";  }
            }
            echo "</select>";
        ?></td>
    <td><input name="fwashbasin2c" type="text" id="fwashbasin2c" value="<?php echo $kfwashbasin2c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>4.</td>
    <td height="26">Toilet paper holder</td>
    <td class="tengah"><input name="fholder2" type="text" id="fholder2" value="<?php echo $kfholder2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder2    = mysql_query($queryfholder2) or die(mysql_error());
            echo "<select name=fholder2s id=fholder2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafholder2 = mysql_fetch_array($resultfholder2))
            {				       
			 if($kfholder2s == $datafholder2['pid'])
				
				{ echo "<option value = $datafholder2[pid] selected>$datafholder2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafholder2[pid]>$datafholder2[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fholder2c" type="text" id="fholder2c" value="<?php echo $kfholder2c; ?>" size="50" /></td>
    </tr>
  <tr>
    <td>5.</td>
    <td height="26">Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap2" type="text" id="fsoap2" value="<?php echo $kfsoap2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap2    = mysql_query($queryfsoap2) or die(mysql_error());
            echo "<select name=fsoap2s id=fsoap2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafsoap2 = mysql_fetch_array($resultfsoap2))
            {				       
			 if($kfsoap2s == $datafsoap2['pid'])
				
				{ echo "<option value = $datafsoap2[pid] selected>$datafsoap2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafsoap2[pid]>$datafsoap2[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fsoap2c" type="text" id="fsoap2c" value="<?php echo $kfsoap2c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>6</td>
    <td height="26">Bib tap</td>
    <td class="tengah"><input name="fbib2" type="text" id="fbib2" value="<?php echo $kfbib2; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib2   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib2    = mysql_query($queryfbib2) or die(mysql_error());
            echo "<select name=fbib2s id=fbib2s>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafbib2 = mysql_fetch_array($resultfbib2))
            {				       
			 if($kfbib2s == $datafbib2['pid'])
				
				{ echo "<option value = $datafbib2[pid] selected>$datafbib2[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbib2[pid]>$datafbib2[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbib2c" type="text" id="fbib2c" value="<?php echo $kfbib2c; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fpedestal3" type="text" id="fpedestal3" value="<?php echo $kfpedestal3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfpedestal3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpedestal3    = mysql_query($queryfpedestal3) or die(mysql_error());
			
            echo "<select name=fpedestal3s id=fpedestal3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafpedestal3 = mysql_fetch_array($resultfpedestal3))
            {				       
			 if($kfpedestal3s == $datafpedestal3['pid'])
				
				{ echo "<option value = $datafpedestal3[pid] selected>$datafpedestal3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpedestal3[pid]>$datafpedestal3[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fpedestal3c" type="text" id="fpedestal3c" value="<?php echo $kfpedestal3c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>2.</td>
    <td>Shower rose</td>
    <td class="tengah"><input name="fshower3" type="text" id="fshower3" value="<?php echo $kfshower3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfshower3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfshower3    = mysql_query($queryfshower3) or die(mysql_error());
			
            echo "<select name=fshower3s id=fshower3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafshower3 = mysql_fetch_array($resultfshower3))
            {				       
			 if($kfshower3s == $datafshower3['pid'])
				
				{ echo "<option value = $datafshower3[pid] selected>$datafshower3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafshower3[pid]>$datafshower3[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fshower3c" type="text" id="fshower3c" value="<?php echo $kfshower3c; ?>" size="50" /></td>
    </tr>
  <tr>
    <td>3.</td>
    <td>Wash basin</td>
    <td class="tengah"><input name="fwashbasin3" type="text" id="fwashbasin3" value="<?php echo $kfwashbasin3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfwashbasin3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfwashbasin3    = mysql_query($queryfwashbasin3) or die(mysql_error());
			
            echo "<select name=fwashbasin3s id=fwashbasin3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafwashbasin3 = mysql_fetch_array($resultfwashbasin3))
            {				       
			 if($kfwashbasin3s == $datafwashbasin3['pid'])
				
				{ echo "<option value = $datafwashbasin3[pid] selected>$datafwashbasin3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafwashbasin3[pid]>$datafwashbasin3[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fwashbasin3c" type="text" id="fwashbasin3c" value="<?php echo $kfwashbasin3c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>4.</td>
    <td>Toilet paper holder</td>
    <td class="tengah"><input name="fholder3" type="text" id="fholder3" value="<?php echo $kfholder3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfholder3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfholder3    = mysql_query($queryfholder3) or die(mysql_error());
			
            echo "<select name=fholder3s id=fholder3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafholder3 = mysql_fetch_array($resultfholder3))
            {				       
			 if($kfholder3s == $datafholder3['pid'])
				
				{ echo "<option value = $datafholder3[pid] selected>$datafholder3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafholder3[pid]>$datafholder3[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fholder3c" type="text" id="fholder3c" value="<?php echo $kfholder3c; ?>" size="50" /></td>
    </tr>
  <tr>
    <td>5.</td>
    <td>Soap disk/ ledge</td>
    <td class="tengah"><input name="fsoap3" type="text" id="fsoap3" value="<?php echo $kfsoap3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfsoap3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfsoap3    = mysql_query($queryfsoap3) or die(mysql_error());
			
            echo "<select name=fsoap3s id=fsoap3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafsoap3 = mysql_fetch_array($resultfsoap3))
            {				       
			 if($kfsoap3s == $datafsoap3['pid'])
				
				{ echo "<option value = $datafsoap3[pid] selected>$datafsoap3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafsoap3[pid]>$datafsoap3[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fsoap3c" type="text" id="fsoap3c" value="<?php echo $kfsoap3c; ?>" size="50" /></td>
    </tr>
  <tr bgcolor="#CED8FF">
    <td>6</td>
    <td>Bib tap</td>
    <td class="tengah"><input name="fbib3" type="text" id="fbib3" value="<?php echo $kfbib3; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbib3   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbib3    = mysql_query($queryfbib3) or die(mysql_error());
			
            echo "<select name=fbib3s id=fbib3s>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbib3 = mysql_fetch_array($resultfbib3))
            {				       
			 if($kfbib3s == $datafbib3['pid'])
				
				{ echo "<option value = $datafbib3[pid] selected>$datafbib3[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbib3[pid]>$datafbib3[pnama]</option>";}
            }
            echo "</select>";
        ?></td>
    <td><input name="fbib3c" type="text" id="fbib3c" value="<?php echo $kfbib3c; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fkitchensink" type="text" id="fkitchensink" value="<?php echo $kfkitchensink; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfkitchensink   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfkitchensink    = mysql_query($queryfkitchensink) or die(mysql_error());
			
            echo "<select name=fkitchensinks id=fkitchensinks>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafkitchensink = mysql_fetch_array($resultfkitchensink))
            {				       
			 if($kfkitchensinks ==  $datafkitchensink['pid'])
				
				{ echo "<option value =  $datafkitchensink[pid] selected>$datafkitchensink[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafkitchensink[pid]>$datafkitchensink[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fkitchensinkc" type="text" id="fkitchensinkc" value="<?php echo $kfkitchensinkc; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fbibtap" type="text" id="fbibtap" value="<?php echo $kfbibtap; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbibtap   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbibtap    = mysql_query($queryfbibtap) or die(mysql_error());
			
            echo "<select name=fbibtaps id=fbibtaps>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbibtap = mysql_fetch_array($resultfbibtap))
            {				       
			 if($kfbibtaps ==  $datafbibtap['pid'])
				
				{ echo "<option value = $datafbibtap[pid] selected>$datafbibtap[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbibtap[pid]>$datafbibtap[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbibtapc" type="text" id="fbibtapc" value="<?php echo $kfbibtapc; ?>" size="50" /></td>
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
    <td class="tengah"><input name="fbibtapy" type="text" id="fbibtapy" value="<?php echo $kfbibtapy; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfbibtapy   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfbibtapy    = mysql_query($queryfbibtapy) or die(mysql_error());
			
            echo "<select name=fbibtapys id=fbibtapys>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafbibtapy = mysql_fetch_array($resultfbibtapy))
            {				       
			 if($kfbibtapys ==  $datafbibtapy['pid'])
				
				{ echo "<option value = $datafbibtapy[pid] selected>$datafbibtapy[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafbibtapy[pid]>$datafbibtapy[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fbibtapyc" type="text" id="fbibtapyc" value="<?php echo $kfbibtapyc; ?>" size="50" /></td>
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
    <td class="tengah"><input name="flighting" type="text" id="lighting2" value="<?php echo $kflighting; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryflighting   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultflighting    = mysql_query($queryflighting) or die(mysql_error());
			
            echo "<select name=flightings id=flightings>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($dataflighting = mysql_fetch_array($resultflighting))
            {				       
			 if($kflightings ==  $dataflighting['pid'])
				
				{ echo "<option value = $dataflighting[pid] selected>$dataflighting[pnama]</option>"; }
				
			else
			
                { echo "<option value = $dataflighting[pid]>$dataflighting[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="flightingc" type="text" id="flightingc" value="<?php echo $kflightingc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td>2.</td>
    <td height="26">Fan Point</td>
    <td class="tengah"><input name="ffanpoint" type="text" id="ffanpoint" value="<?php echo $kffanpoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryffanpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultffanpoint    = mysql_query($queryffanpoint) or die(mysql_error());
			
            echo "<select name=ffanpoints id=ffanpoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($dataffanpoint = mysql_fetch_array($resultffanpoint))
            {				       
			 if($kffanpoints ==  $dataffanpoint['pid'])
				
				{ echo "<option value = $dataffanpoint[pid] selected>$dataffanpoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $dataffanpoint[pid]>$dataffanpoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="ffanpointc" type="text" id="ffanpointc" value="<?php echo $kffanpointc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td>3.</td>
    <td height="26">Power point (13A)</td>
    <td class="tengah"><input name="fpowerpoint" type="text" id="fpowerpoint" value="<?php echo $kfpowerpoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfpowerpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfpowerpoint    = mysql_query($queryfpowerpoint) or die(mysql_error());
			
            echo "<select name=fpowerpoints id=fpowerpoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafpowerpoint = mysql_fetch_array($resultfpowerpoint))
            {				       
			 if($kfpowerpoints ==  $datafpowerpoint['pid'])
				
				{ echo "<option value = $datafpowerpoint[pid] selected>$datafpowerpoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafpowerpoint[pid]>$datafpowerpoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fpowerpointc" type="text" id="fpowerpointc" value="<?php echo $kfpowerpointc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td>4.</td>
    <td height="26">Telephone point</td>
    <td class="tengah"><input name="fphonepoint" type="text" id="fphonepoint" value="<?php echo $kfphonepoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfphonepoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfphonepoint    = mysql_query($queryfphonepoint) or die(mysql_error());
			
            echo "<select name=fphonepoints id=fphonepoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafphonepoint = mysql_fetch_array($resultfphonepoint))
            {				       
			 if($kfphonepoints ==  $datafphonepoint['pid'])
				
				{ echo "<option value = $datafphonepoint[pid] selected>$datafphonepoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafphonepoint[pid]>$datafphonepoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fphonepointc" type="text" id="fphonepointc" value="<?php echo $kfphonepointc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td>5.</td>
    <td height="26">TV point</td>
    <td class="tengah"><input name="ftvpoint" type="text" id="ftvpoint" value="<?php echo $kftvpoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryftvpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultftvpoint    = mysql_query($queryftvpoint) or die(mysql_error());
			
            echo "<select name=ftvpoints id=ftvpoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($dataftvpoint = mysql_fetch_array($resultftvpoint))
            {				       
			 if($kftvpoints ==  $dataftvpoint['pid'])
				
				{ echo "<option value = $dataftvpoint[pid] selected>$dataftvpoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $dataftvpoint[pid]>$dataftvpoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="ftvpointc" type="text" id="ftvpointc" value="<?php echo $kftvpointc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td>6</td>
    <td height="26">Heater point</td>
    <td class="tengah"><input name="fheaterpoint" type="text" id="fheaterpoint" value="<?php echo $kfheaterpoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfheaterpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfheaterpoint    = mysql_query($queryfpantri) or die(mysql_error());
			
            echo "<select name=fheaterpoints id=fheaterpoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafheaterpoint = mysql_fetch_array($resultfheaterpoint))
            {				       
			 if($kfheaterpoints ==  $datafheaterpoint['pid'])
				
				{ echo "<option value = $datafheaterpoint[pid] selected>$datafheaterpoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafheaterpoint[pid]>$datafheaterpoint[pnama]</option>";  }
            }
            echo "</select>";
        ?></td>
    <td><input name="fheaterpointc" type="text" id="fheaterpointc" value="<?php echo $kfheaterpointc; ?>" size="50" /></td>
  </tr>
  <tr bgcolor="#CED8FF">
    <td height="26">7.</td>
    <td height="26">Air-cond point</td>
    <td class="tengah"><input name="faircondpoint" type="text" id="faircondpoint" value="<?php echo $kfaircondpoint; ?>" size="15" /></td>
    <td class="tengah"><?php
            $queryfaircondpoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfaircondpoint    = mysql_query($queryfaircondpoint) or die(mysql_error());
			
            echo "<select name=faircondpoints id=faircondpoints>";
            echo "<option value=''>Sila Pilih</option>";
			
            while($datafaircondpoint = mysql_fetch_array($resultfaircondpoint))
            {				       
			 if($kfaircondpoints ==  $datafaircondpoint['pid'])
				
				{ echo "<option value = $datafaircondpoint[pid] selected>$datafaircondpoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafaircondpoint[pid]>$datafaircondpoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="faircondpointc" type="text" id="faircondpointc" value="<?php echo $kfaircondpointc; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="26">8.</td>
    <td height="26">Gate Bell point</td>
    <td class="tengah"><input name="fgatepoint" type="text" id="fgatepoint" value="<?php echo $kfgatepoint; ?>" size="15"/></td>
    <td class="tengah"><?php
	
            $queryfgatepoint   = "SELECT * FROM tblpilihan where pstatus ='$status' order by psusun asc  ";
            $resultfgatepoint    = mysql_query($queryfpantri) or die(mysql_error());
			
            echo "<select name=fgatepoints id=fgatepoints>";
            echo "<option value=''>Sila Pilih</option>";
            while($datafgatepoint = mysql_fetch_array($resultfgatepoint))
            {				       
			 if($kfgatepoints ==  $datafgatepoint['pid'])
				
				{ echo "<option value = $datafgatepoint[pid] selected>$datafgatepoint[pnama]</option>"; }
				
			else
			
                { echo "<option value = $datafgatepoint[pid]>$datafgatepoint[pnama]</option>"; }
            }
            echo "</select>";
        ?></td>
    <td><input name="fgatepointc" type="text" id="fgatepointc" value="<?php echo $kfgatepointc; ?>" size="50" /></td>
  </tr>
  </table>
<p><br />
  <center>
  		<div class="col-lg-6"><br><br>
			<!--<button type="button" class="btn btn-default" data-dismiss="kembali">Kembali</button>
			<input type="submit" class="btn btn-primary" name="submit" value="Kemaskini"></button> -->
			<input type="submit" name="KEMASKINI" id="KEMASKINI" value="KEMASKINI" align="center"> 
		<a href="cetakpaparkendiri.php">[ CETAK ] </a></div>	
  		</center>	
</p>
</form>

                          </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
</body>
</html>