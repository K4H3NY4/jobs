<?php
require('../config/db.php');




    date_default_timezone_set('Africa/Nairobi');



$id = mysqli_real_escape_string($db, $_GET['id']);
<<<<<<< HEAD



$query = 'SELECT * FROM `prof` WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);
$profid = base64_decode($id);

if( $profs == NULL ){
    header("Location: 404.php");
}else{}



$queryTasks = "SELECT * FROM `tasks` WHERE  `prof-id` ='$profid'  AND `cstatus`='Taken' or `cstatus`='Closed' ORDER by `time-created` DESC";
=======
$query = 'SELECT * FROM `prof` WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);

$profid = base64_decode($id);

$queryCount =" SELECT COUNT(`prof-id`) FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'";
$resultCount =  mysqli_query($db,$queryCount);
$count = mysqli_fetch_assoc($resultCount);


$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'  ORDER by `time-created` DESC";
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);

   
include('topbar.php');
include('sidebar.php');
    

?>

<<<<<<< HEAD
<title>Profile</title>
<link name="//sk.hzcdn.com/assets/en-US/20210224162012/css/vendor_2f3134ab2812b411109a.bundle.css?kcan=release20210224162012572c41100b" href="../vendor_2f3134ab2812b411109a.bundle1532.css?kcan=release20210224162012572c41100b" rel="stylesheet"/>
<link name="//sk.hzcdn.com/assets/en-US/20210224162012/css/proProfileNew_d9f3246115bf1723960b.bundle.css?kcan=release20210224162012572c41100b" href="../proProfileNew_d9f3246115bf1723960b.bundle1532.css?kcan=release20210224162012572c41100b" rel="stylesheet"/>

<style data-styled="true" data-styled-version="5.2.1">.htUZhq.htUZhq{box-sizing:border-box;margin:0;margin-top:24px;margin-bottom:24px;}/*!sc*/
.itcRww.itcRww{box-sizing:border-box;margin:0;padding-left:8px;}/*!sc*/
.bjYbnc.bjYbnc{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;}/*!sc*/
.byGbOc.byGbOc{box-sizing:border-box;margin:0;position:relative;display:inline-block;}/*!sc*/
.bPbSPd.bPbSPd{box-sizing:border-box;margin:0;margin-left:16px;-webkit-flex:auto;-ms-flex:auto;flex:auto;}/*!sc*/
.cClhIP.cClhIP{box-sizing:border-box;margin:0;margin-top:8px;}/*!sc*/
.ePQAMb.ePQAMb{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;margin-top:20px;border-bottom:1px solid;border-color:#E6E6E6;}/*!sc*/
.dLhCDe.dLhCDe{box-sizing:border-box;margin:0;}/*!sc*/
.fMDbJF.fMDbJF{box-sizing:border-box;margin:0;position:relative;display:inline-block;z-index:1;}/*!sc*/
.gPkPEJ.gPkPEJ{box-sizing:border-box;margin:0;padding-top:24px;padding-bottom:32px;}/*!sc*/
.kFDUGU.kFDUGU{box-sizing:border-box;margin:0;padding-top:32px;padding-bottom:32px;border-top:1px solid;border-color:#E6E6E6;}/*!sc*/
.iLjwZw.iLjwZw{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-bottom:16px;}/*!sc*/
.bzaWyI.bzaWyI{box-sizing:border-box;margin:0;position:relative;border-radius:6px;}/*!sc*/
.kYTRjc.kYTRjc{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:100%;}/*!sc*/
.jWVHWw.jWVHWw{box-sizing:border-box;margin:0;padding:16px;min-height:88px;}/*!sc*/
.bChOZz.bChOZz{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;}/*!sc*/
data-styled.g21[id="sc-bkzZxe"]{content:"htUZhq,itcRww,bjYbnc,byGbOc,bPbSPd,cClhIP,ePQAMb,dLhCDe,fMDbJF,gPkPEJ,kFDUGU,iLjwZw,bzaWyI,kYTRjc,jWVHWw,bChOZz,"}/*!sc*/
.jjJHcq.jjJHcq{margin:0;font-weight:bold;font-size:24px;line-height:28px;}/*!sc*/
@media screen and (min-width:640px){.jjJHcq.jjJHcq{font-size:28px;line-height:32px;}}/*!sc*/
.cPiHsi.cPiHsi{margin-top:4px;color:#666666;font-size:16px;line-height:24px;}/*!sc*/
@media screen and (min-width:640px){.cPiHsi.cPiHsi{font-size:16px;line-height:24px;}}/*!sc*/
.WKtOk.WKtOk{font-size:18px;line-height:28px;}/*!sc*/
@media screen and (min-width:640px){.WKtOk.WKtOk{font-size:20px;line-height:32px;}}/*!sc*/
.kUSVNE.kUSVNE{font-size:inherit;line-height:inherit;}/*!sc*/
@media screen and (min-width:640px){.kUSVNE.kUSVNE{font-size:inherit;line-height:inherit;}}/*!sc*/
.ixeySq.ixeySq{font-weight:bold;font-size:18px;line-height:28px;}/*!sc*/
@media screen and (min-width:640px){.ixeySq.ixeySq{font-size:20px;line-height:32px;}}/*!sc*/
.kTSsRI.kTSsRI{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;font-size:inherit;line-height:inherit;}/*!sc*/
@media screen and (min-width:640px){.kTSsRI.kTSsRI{font-size:inherit;line-height:inherit;}}/*!sc*/
.lgYSiG.lgYSiG{font-weight:bold;font-size:16px;line-height:24px;}/*!sc*/
@media screen and (min-width:640px){.lgYSiG.lgYSiG{font-size:16px;line-height:24px;}}/*!sc*/
.hnagUF.hnagUF{color:#666666;margin-top:12px;font-size:14px;line-height:20px;}/*!sc*/
@media screen and (min-width:640px){.hnagUF.hnagUF{font-size:14px;line-height:20px;}}/*!sc*/
.brOXes.brOXes{margin-bottom:16px;font-weight:bold;font-size:18px;line-height:28px;}/*!sc*/
@media screen and (min-width:640px){.brOXes.brOXes{font-size:20px;line-height:32px;}}/*!sc*/
data-styled.g23[id="sc-dIUggk"]{content:"jjJHcq,cPiHsi,WKtOk,kUSVNE,ixeySq,kTSsRI,lgYSiG,hnagUF,brOXes,"}/*!sc*/
.XOLGa.XOLGa{box-sizing:border-box;margin:0;width:1em;height:1em;color:currentColor;display:inline-block;vertical-align:middle;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;-webkit-backface-visibility:hidden;backface-visibility:hidden;}/*!sc*/
.XOLGa.XOLGa:not(:root){overflow:hidden;}/*!sc*/
.gPpFBM.gPpFBM{box-sizing:border-box;margin:0;width:1em;height:1em;color:currentColor;display:inline-block;vertical-align:middle;margin-right:8px;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;-webkit-backface-visibility:hidden;backface-visibility:hidden;}/*!sc*/
.gPpFBM.gPpFBM:not(:root){overflow:hidden;}/*!sc*/
.gNsSRX.gNsSRX{box-sizing:border-box;margin:0;width:1em;height:1em;color:currentColor;display:inline-block;vertical-align:middle;margin-right:16px;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;-webkit-backface-visibility:hidden;backface-visibility:hidden;}/*!sc*/
.gNsSRX.gNsSRX:not(:root){overflow:hidden;}/*!sc*/
data-styled.g27[id="sc-fKFyDc"]{content:"XOLGa,gPpFBM,gNsSRX,"}/*!sc*/
.eBtLwk.eBtLwk{display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;position:relative;box-sizing:border-box;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:inherit;font-weight:bold;-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;border-radius:4px;-webkit-text-decoration:none;text-decoration:none;text-align:center;cursor:pointer;width:auto;white-space:nowrap;-webkit-transition:all 75ms ease-in-out;transition:all 75ms ease-in-out;padding-left:16px;padding-right:16px;padding-top:8px;padding-bottom:8px;font-size:16px;line-height:24px;background-color:transparent;border:0;color:#222222;padding-left:12px;padding-right:12px;padding-top:12px;padding-bottom:12px;font-size:16px;line-height:24px;box-sizing:border-box;margin:0;width:medium;height:medium;display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;}/*!sc*/
.eBtLwk.eBtLwk:hover{background-color:#FAFAFA;color:#222222;}/*!sc*/
.eBtLwk.eBtLwk:focus{box-shadow:0 0 0 3px rgba(34,34,34,0.6);}/*!sc*/
.eBtLwk.eBtLwk:active{background-color:#FAFAFA;box-shadow:inset 0 0 0 1px #CCCCCC;color:#222222;}/*!sc*/
@media screen and (min-width:640px){}/*!sc*/
@media screen and (min-width:1000px){}/*!sc*/
@media screen and (min-width:1200px){.eBtLwk.eBtLwk{display:none;}}/*!sc*/
.eBtLwk.eBtLwk:focus{outline:none;}/*!sc*/
.czwsUZ.czwsUZ{display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;position:relative;box-sizing:border-box;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:inherit;font-weight:bold;-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;border-radius:4px;-webkit-text-decoration:none;text-decoration:none;text-align:center;cursor:pointer;width:auto;white-space:nowrap;-webkit-transition:all 75ms ease-in-out;transition:all 75ms ease-in-out;padding-left:16px;padding-right:16px;padding-top:8px;padding-bottom:8px;font-size:16px;line-height:24px;background-color:transparent;border:0;color:#222222;box-sizing:border-box;margin:0;width:medium;height:medium;display:none;}/*!sc*/
.czwsUZ.czwsUZ:hover{background-color:#FAFAFA;color:#222222;}/*!sc*/
.czwsUZ.czwsUZ:focus{box-shadow:0 0 0 3px rgba(34,34,34,0.6);}/*!sc*/
.czwsUZ.czwsUZ:active{background-color:#FAFAFA;box-shadow:inset 0 0 0 1px #CCCCCC;color:#222222;}/*!sc*/
@media screen and (min-width:640px){}/*!sc*/
@media screen and (min-width:1000px){}/*!sc*/
@media screen and (min-width:1200px){.czwsUZ.czwsUZ{display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;}}/*!sc*/
.czwsUZ.czwsUZ:focus{outline:none;}/*!sc*/
data-styled.g29[id="sc-iwyYcG"]{content:"eBtLwk,czwsUZ,"}/*!sc*/
.eSboGq.eSboGq{display:grid;grid-template-columns:660px 300px;grid-gap:40px;place-content:center;box-sizing:border-box;margin:0;margin-top:24px;margin-bottom:24px;}/*!sc*/
@media screen and (min-width:640px){}/*!sc*/
@media screen and (min-width:1000px){}/*!sc*/
@media screen and (min-width:1200px){.eSboGq.eSboGq{grid-template-columns:795px 365px;}}/*!sc*/
.gSMdbl.gSMdbl{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));grid-gap:16px;box-sizing:border-box;margin:0;}/*!sc*/
data-styled.g39[id="sc-hiSbYr"]{content:"eSboGq,gSMdbl,"}/*!sc*/
.jrFcie.jrFcie{-webkit-text-decoration:none;text-decoration:none;color:#007562;}/*!sc*/
.jrFcie.jrFcie:focus{outline:none;box-shadow:0 0 0 2px #99c7c0;border-radius:2px;}/*!sc*/
.jrFcie.jrFcie:visited{color:#007562;}/*!sc*/
.jrFcie.jrFcie:hover{color:#007562;-webkit-text-decoration:underline;text-decoration:underline;}/*!sc*/
.hFIsMp.hFIsMp{-webkit-text-decoration:none;text-decoration:none;color:inherit;}/*!sc*/
.hFIsMp.hFIsMp:focus{outline:none;box-shadow:0 0 0 2px #99c7c0;border-radius:2px;}/*!sc*/
data-styled.g41[id="sc-cBNfnY"]{content:"jrFcie,hFIsMp,"}/*!sc*/
.hrIxYG{outline:none;}/*!sc*/
data-styled.g76[id="Navigation__StyledNav-sc-1u784ul-0"]{content:"hrIxYG,"}/*!sc*/
.gourcj.gourcj{display:inline-block;color:#666666;font-size:16px;font-weight:bold;line-height:24px;padding-top:8px;padding-bottom:4px;border-bottom:4px solid;border-bottom-color:transparent;}/*!sc*/
.gourcj.gourcj:active,.gourcj.gourcj:visited{-webkit-text-decoration:none;text-decoration:none;color:#666666;}/*!sc*/
.gourcj.gourcj:hover{-webkit-text-decoration:none;text-decoration:none;color:#222222;}/*!sc*/
.gourcj.gourcj:not(:first-of-type){margin-left:16px;}/*!sc*/
@media screen and (min-width:640px){}/*!sc*/
@media screen and (min-width:1000px){}/*!sc*/
@media screen and (min-width:1200px){.gourcj.gourcj:not(:first-of-type){margin-left:24px;}}/*!sc*/
.gourcj.gourcj.active{color:#222222;border-bottom-color:#222222;}/*!sc*/
.gourcj.gourcj:focus{outline:none;box-shadow:0 0 0 3px #99c7c0;border-radius:2px;color:#222222;}/*!sc*/
data-styled.g77[id="NavigationTab__StyledLink-sc-1bui7zf-0"]{content:"gourcj,"}/*!sc*/
.bMpTiZ.bMpTiZ{position:absolute;width:1px;height:1px;padding:0;overflow:hidden;-webkit-clip:rect(0,0,0,0);clip:rect(0,0,0,0);white-space:nowrap;-webkit-clip-path:inset(50%);-webkit-clip-path:inset(50%);clip-path:inset(50%);border:0;}/*!sc*/
.iNgfpH.iNgfpH{position:absolute;width:1px;height:1px;padding:0;overflow:hidden;-webkit-clip:rect(0,0,0,0);clip:rect(0,0,0,0);white-space:nowrap;-webkit-clip-path:inset(50%);-webkit-clip-path:inset(50%);clip-path:inset(50%);border:0;}/*!sc*/
.iNgfpH.iNgfpH:active,.iNgfpH.iNgfpH:focus{position:static;width:auto;height:auto;overflow:visible;-webkit-clip:auto;clip:auto;white-space:normal;-webkit-clip-path:none;-webkit-clip-path:none;clip-path:none;padding:revert;}/*!sc*/
.iNgfpH.iNgfpH:focus{outline:none;box-shadow:0 0 0 2px #99c7c0;border-radius:2px;}/*!sc*/
data-styled.g78[id="SrOnly___StyledBox-sc-1y313m4-0"]{content:"bMpTiZ,iNgfpH,"}/*!sc*/
.kNUPit{outline:none;}/*!sc*/
data-styled.g79[id="AnchorSection__StyledSection-sc-15862cl-0"]{content:"kNUPit,"}/*!sc*/
.faCiR{position:absolute !important;-webkit-transform:translateY(52%);-ms-transform:translateY(52%);transform:translateY(52%);}/*!sc*/
data-styled.g80[id="AnchorSection__StyledLink-sc-15862cl-1"]{content:"faCiR,"}/*!sc*/
.cxzMgd{border-radius:4px;}/*!sc*/
data-styled.g81[id="ProfilePhoto__StyledImg-sc-1ua7kxg-0"]{content:"cxzMgd,"}/*!sc*/
.jXtOPr{display:block;height:24px;}/*!sc*/
.jXtOPr .hz-star-rate__rating-number{margin-right:8px;font-size:16px;line-height:24px;}/*!sc*/
.jXtOPr .hz-star-rate__review-string{margin-left:4px;font-size:16px;line-height:24px;color:#666666;}/*!sc*/
.jXtOPr .hz-star-rate{font-size:11px;-webkit-transform:translateY(2px);-ms-transform:translateY(2px);transform:translateY(2px);}/*!sc*/
data-styled.g85[id="ProfileHeader__StyledStarRating-zmptoa-0"]{content:"jXtOPr,"}/*!sc*/
.fqVgur .side-bar-container{-webkit-flex:0 0 calc(100% / 1);-ms-flex:0 0 calc(100% / 1);flex:0 0 calc(100% / 1);}/*!sc*/
.fqVgur .header-6{font-size:14px;line-height:20px;}/*!sc*/
.fqVgur .hz-peekable__toggle[data-compid='read_less']{display:none;}/*!sc*/
.fqVgur .houzz-thumb-container__thumb-badge,.fqVgur .houzz-brands-container__thumb-badge,.fqVgur .houzz-members-container__thumb-badge-user,.fqVgur .houzz-affiliations-container__thumb-badge-affiliation{margin:0 8px 8px 0;}/*!sc*/
.fqVgur .houzz-thumb-container__thumb-badge:nth-last-child(-n + 3),.fqVgur .houzz-brands-container__thumb-badge:nth-last-child(-n + 3),.fqVgur .houzz-members-container__thumb-badge-user:nth-last-child(-n + 3),.fqVgur .houzz-affiliations-container__thumb-badge-affiliation:nth-last-child(-n + 3){margin-bottom:8px;}/*!sc*/
data-styled.g96[id="Credentials__CredentialsWrapper-r0z8mj-0"]{content:"fqVgur,"}/*!sc*/
.bVqoAv{position:absolute;top:-9999px;left:-9999px;}/*!sc*/
data-styled.g100[id="ProfileShare__HiddenInput-sc-1mxaqxu-0"]{content:"bVqoAv,"}/*!sc*/
.hiwjAt.hiwjAt:hover{color:#006353;}/*!sc*/
.hiwjAt.hiwjAt:active{color:#005144;}/*!sc*/
.hiwjAt.hiwjAt.hiwjAt:focus{border-radius:6px;}/*!sc*/
.hiwjAt.hiwjAt.hiwjAt:focus:not(:active){color:inherit;}/*!sc*/
data-styled.g102[id="ImageCard__StyledLink-sc-1stnd5f-0"]{content:"hiwjAt,"}/*!sc*/
.kmrrkG{position:absolute;top:0;left:0;width:100%;height:auto;}/*!sc*/
data-styled.g103[id="ImageCard__ResponsiveImage-sc-1stnd5f-1"]{content:"kmrrkG,"}/*!sc*/
.evfIBi{position:relative;padding-top:calc(260 / 390 * 100%);background:center / 60% no-repeat url(../../jpics/20210224162012/cover_placeholder_large%402x.png) #F4F4F4;border-top-left-radius:6px;border-top-right-radius:6px;overflow:hidden;}/*!sc*/
data-styled.g104[id="ImageCard__ResponsiveCover-sc-1stnd5f-2"]{content:"evfIBi,"}/*!sc*/
.daIZbL{box-shadow:0px 0px 8px rgba(0,0,0,0.12);}/*!sc*/
.daIZbL:hover{box-shadow:0px 1px 12px rgba(0,0,0,0.16);}/*!sc*/
data-styled.g105[id="ImageCard___StyledBox-sc-1stnd5f-3"]{content:"daIZbL,"}/*!sc*/
.jeGOtY{text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}/*!sc*/
data-styled.g107[id="ProjectCard__TruncatedHeading-sc-1d5je1m-0"]{content:"jeGOtY,"}/*!sc*/
.iGOolI{border-bottom:none;}/*!sc*/
.iGOolI .reviews-header.header-6{font-size:20px;line-height:32px;font-weight:bold;}/*!sc*/
data-styled.g116[id="ReviewsContainer__StyledReviewsContainer-sc-1ve4t16-0"]{content:"iGOolI,"}/*!sc*/
.hz-page-content-wrapper{min-width:1000px;background-color:#FFFFFF;color:#222222;}/*!sc*/
data-styled.g118[id="sc-global-iIcMbX1"]{content:"sc-global-iIcMbX1,"}/*!sc*/
</style>
<style data-styled="true" data-styled-version="5.2.1">.gPrrWv.gPrrWv{box-sizing:border-box;margin:0;padding-right:8px;}/*!sc*/
.biQGEx.biQGEx{box-sizing:border-box;margin:0;position:-webkit-sticky;position:sticky;}/*!sc*/
.fImxWv.fImxWv{box-sizing:border-box;margin:0;margin-bottom:16px;padding:16px;border:1px solid;border-radius:4px;border-color:#E6E6E6;}/*!sc*/
.hOTVEw.hOTVEw{box-sizing:border-box;margin:0;margin-top:16px;}/*!sc*/
.joryLZ.joryLZ{box-sizing:border-box;margin:0;padding:16px;border:1px solid;border-radius:4px;border-color:#E6E6E6;}/*!sc*/
.gHCpAW.gHCpAW{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:top;-webkit-box-align:top;-ms-flex-align:top;align-items:top;}/*!sc*/
.fjCaha.fjCaha{box-sizing:border-box;margin:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;}/*!sc*/
data-styled.g21[id="sc-bkzZxe"]{content:"htUZhq,itcRww,bjYbnc,byGbOc,bPbSPd,cClhIP,ePQAMb,dLhCDe,fMDbJF,gPkPEJ,kFDUGU,iLjwZw,bzaWyI,kYTRjc,jWVHWw,bChOZz,gPrrWv,biQGEx,fImxWv,hOTVEw,joryLZ,gHCpAW,fjCaha,"}/*!sc*/
.cpsJTg.cpsJTg{font-size:14px;line-height:20px;}/*!sc*/
@media screen and (min-width:640px){.cpsJTg.cpsJTg{font-size:14px;line-height:20px;}}/*!sc*/
data-styled.g23[id="sc-dIUggk"]{content:"jjJHcq,cPiHsi,WKtOk,kUSVNE,ixeySq,kTSsRI,lgYSiG,hnagUF,brOXes,cpsJTg,"}/*!sc*/
.iNPrKd.iNPrKd{box-sizing:border-box;margin:0;width:20px;height:20px;color:currentColor;display:inline-block;vertical-align:middle;padding:2px;margin-right:12px;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;-webkit-backface-visibility:hidden;backface-visibility:hidden;}/*!sc*/
.iNPrKd.iNPrKd:not(:root){overflow:hidden;}/*!sc*/
data-styled.g27[id="sc-fKFyDc"]{content:"XOLGa,gPpFBM,gNsSRX,iNPrKd,"}/*!sc*/
.hWrMWs.hWrMWs{display:block;position:relative;box-sizing:border-box;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:inherit;font-weight:bold;-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;border-radius:4px;-webkit-text-decoration:none;text-decoration:none;text-align:center;cursor:pointer;width:100%;white-space:nowrap;-webkit-transition:all 75ms ease-in-out;transition:all 75ms ease-in-out;padding-left:16px;padding-right:16px;padding-top:8px;padding-bottom:8px;font-size:16px;line-height:24px;background-color:#007562;color:#FFFFFF;box-sizing:border-box;margin:0;width:medium;height:medium;}/*!sc*/
.hWrMWs.hWrMWs:hover{background-color:#006353;color:#FFFFFF;}/*!sc*/
.hWrMWs.hWrMWs:active{background-color:#005144;color:#FFFFFF;}/*!sc*/
.hWrMWs.hWrMWs:focus{box-shadow:0 0 0 3px #99c7c0;color:#FFFFFF;}/*!sc*/
.hWrMWs.hWrMWs:focus{outline:none;}/*!sc*/
.eXVHex.eXVHex{display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;position:relative;box-sizing:border-box;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:inherit;font-weight:bold;-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;border-radius:4px;-webkit-text-decoration:none;text-decoration:none;text-align:center;cursor:pointer;width:auto;white-space:nowrap;-webkit-transition:all 75ms ease-in-out;transition:all 75ms ease-in-out;padding-left:12px;padding-right:12px;padding-top:6px;padding-bottom:6px;font-size:14px;line-height:20px;background-color:transparent;border:0;color:#222222;box-sizing:border-box;margin:0;width:small;height:small;margin-top:-6px;margin-bottom:-6px;}/*!sc*/
.eXVHex.eXVHex:hover{background-color:#FAFAFA;color:#222222;}/*!sc*/
.eXVHex.eXVHex:focus{box-shadow:0 0 0 3px rgba(34,34,34,0.6);}/*!sc*/
.eXVHex.eXVHex:active{background-color:#FAFAFA;box-shadow:inset 0 0 0 1px #CCCCCC;color:#222222;}/*!sc*/
.eXVHex.eXVHex:focus{outline:none;}/*!sc*/
data-styled.g29[id="sc-iwyYcG"]{content:"eBtLwk,czwsUZ,hWrMWs,eXVHex,"}/*!sc*/
.dQiJRI.dQiJRI{grid-column:1 / span 2;}/*!sc*/
data-styled.g40[id="sc-gWHgXt"]{content:"kQxpNq,dQiJRI,"}/*!sc*/
.drZktI.drZktI{-webkit-text-decoration:none;text-decoration:none;color:#222222;}/*!sc*/
.drZktI.drZktI:focus{outline:none;box-shadow:0 0 0 2px #99c7c0;border-radius:2px;}/*!sc*/
.drZktI.drZktI:visited{color:#222222;}/*!sc*/
.drZktI.drZktI:hover,.drZktI.drZktI:active{color:#222222;-webkit-text-decoration:underline;text-decoration:underline;}/*!sc*/
data-styled.g41[id="sc-cBNfnY"]{content:"jrFcie,hFIsMp,drZktI,"}/*!sc*/
.bpcYca.bpcYca{background:none;border:none;cursor:pointer;font-family:inherit;text-align:left;padding:0;-webkit-text-decoration:none;text-decoration:none;color:#222222;}/*!sc*/
.bpcYca.bpcYca:focus{outline:none;box-shadow:0 0 0 2px #99c7c0;border-radius:2px;}/*!sc*/
.bpcYca.bpcYca:visited{color:#222222;}/*!sc*/
.bpcYca.bpcYca:hover,.bpcYca.bpcYca:active{color:#222222;-webkit-text-decoration:underline;text-decoration:underline;}/*!sc*/
.bpcYca.bpcYca[disabled]{color:#CCCCCC;}/*!sc*/
data-styled.g42[id="sc-citwmv"]{content:"bpcYca,"}/*!sc*/
.ilrzEg.ilrzEg + .ilrzEg{margin-top:16px;padding-top:16px;border-top:1px solid;border-color:#E6E6E6;}/*!sc*/
data-styled.g98[id="IconRow___StyledBox-sc-1f6s35j-0"]{content:"ilrzEg,"}/*!sc*/
.bkjkrD{width:100%;white-space:pre-line;}/*!sc*/
data-styled.g99[id="IconRow___StyledText-sc-1f6s35j-1"]{content:"bkjkrD,"}/*!sc*/
</style>


<div id="hz-page-content-wrapper" class="hz-page-content-wrapper hz-page-content-wrapper--proProfileNew  mt-5 pt-5 pl-5">
<div class="sc-bkzZxe sc-hiSbYr htUZhq eSboGq hui-grid ">
<main class="sc-bkzZxe sc-gWHgXt itcRww kQxpNq hui-cell ">
<header display="flex" class="sc-bkzZxe bjYbnc">
<div display="inline-block" class="sc-bkzZxe byGbOc">
<img src="../<?php echo $profs ["picture"]; ?>" srcSet="../<?php echo $profs ["picture"]; ?>" width="117" height="117" alt="<?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?>&#x27;s profile photo" class="ProfilePhoto__StyledImg-sc-1ua7kxg-0 cxzMgd"/>
</div>
<div class="sc-bkzZxe bPbSPd">
<h1 font-weight="semibold" font-size="large,xLarge" class="sc-dIUggk jjJHcq text-capitalize"><?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></h1>

<div class="sc-bkzZxe cClhIP">

</div>
<div color="content.secondary" font-size="small,small" class="sc-dIUggk cPiHsi">                
                   
                    <p class="text-success">
                    <?php echo $profs ["occupation"]; 
                    
              ?>
                    </p>
                

            </div>
            </div>
            </header>
            <nav display="flex" class="Navigation__StyledNav-sc-1u784ul-0 hrIxYG sc-bkzZxe ePQAMb" id="profile-navi" tabindex="-1">
            <div class="sc-bkzZxe dLhCDe">
            <a href="#about-us" aria-current="false" class="NavigationTab__StyledLink-sc-1bui7zf-0 gourcj">About</a>
            <a href="#services" aria-current="false" class="NavigationTab__StyledLink-sc-1bui7zf-0 gourcj">Services Provided</a>
            <a href="#areas" aria-current="false" class="NavigationTab__StyledLink-sc-1bui7zf-0 gourcj">Areas Served</a>
            <a href="#projects" aria-current="false" class="NavigationTab__StyledLink-sc-1bui7zf-0 gourcj">Projects Done</a>
            </div>

            <div class="sc-bkzZxe dLhCDe">
            <button type="button" class="sc-iwyYcG eBtLwk hui-btn " title="Share" aria-label="Share" aria-disabled="false" display="inline-flex,,,none">
            <svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc XOLGa">
            <path fill="currentColor" d="M8.75 13.75h2.5v-7.5h5L10 0 3.75 6.25h5zm10-3.401v8.053l-4.798 1.599H6.047l-4.798-1.599v-8.053l5-1.599v2.5l-2.5.901v4.447l2.702.901h7.095l2.703-.901v-4.447l-2.5-.901v-2.5z"></path>
            </svg></button>

        
            
            <div display="inline-block" class="sc-bkzZxe fMDbJF">
            <div class="hz-toast hz-toast--theme-black hz-toast--dir-bottom   ">
            <div aria-hidden="true" role="alert">
            <svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc gNsSRX">
            <path fill="currentColor" d="M7.556 16.875h-.001c-.518 0-.986-.21-1.325-.549l-6.105-6.11 2.647-2.651 4.704 4.704 9.625-10.808 2.8 2.5L8.956 16.25c-.333.372-.81.609-1.342.625h-.003z">
            </path>
            </svg>https://www.houzz.com/pro/bernrds-chebo copied to clipboard</div>
            </div>
            </div>
            <input type="text" value="https://www.houzz.com/pro/bernrds-chebo" tabindex="-1" aria-hidden="true" readonly="" class="ProfileShare__HiddenInput-sc-1mxaqxu-0 bVqoAv"/>
          
         
            <div>
            </div>
            </div>
            </nav>

            <section id="about-us" tabindex="-1" class="AnchorSection__StyledSection-sc-15862cl-0 kNUPit sc-bkzZxe gPkPEJ">
            <div class="sc-bkzZxe SrOnly___StyledBox-sc-1y313m4-0 dLhCDe bMpTiZ" tabindex="-1">
            <h2 font-size="smallPlus,medium" class="sc-dIUggk WKtOk">About Us</h2>
            </div>
            <div class="profile-about" data-compid="profile-about">
            <div class="hz-peekable__container">
    <p><?php echo $profs ["about"]; ?> </p>


</div>
</div>
</section>




<a href="#profile-navi" class="sc-cBNfnY jrFcie sc-dIUggk kUSVNE AnchorSection__StyledLink-sc-15862cl-1 faCiR sc-bkzZxe SrOnly___StyledBox-sc-1y313m4-0 dLhCDe iNgfpH" tabindex="0" font-size="inherit,inherit">Back to Navigation</a>

<section id="services" tabindex="-1" class="AnchorSection__StyledSection-sc-15862cl-0 kNUPit sc-bkzZxe kFDUGU">
<div class="Credentials__CredentialsWrapper-r0z8mj-0 fqVgur sc-bkzZxe dLhCDe">
<h2 font-weight="semibold" font-size="smallPlus,medium" class="sc-dIUggk brOXes">Serves Provided</h2>
<div class="hz-peekable__container">
<div class="hz-peekable__mask">
<p><?php echo $profs ["services"]; ?></p>
</div>
</div>

</section>

<a href="#profile-navi" class="sc-cBNfnY jrFcie sc-dIUggk kUSVNE AnchorSection__StyledLink-sc-15862cl-1 faCiR sc-bkzZxe SrOnly___StyledBox-sc-1y313m4-0 dLhCDe iNgfpH" tabindex="0" font-size="inherit,inherit">Back to Navigation</a>


<section id="areas" tabindex="-1" class="AnchorSection__StyledSection-sc-15862cl-0 kNUPit sc-bkzZxe kFDUGU">
<div class="side-bar-container ReviewsContainer__StyledReviewsContainer-sc-1ve4t16-0 iGOolI">
<h2 font-weight="semibold" font-size="smallPlus,medium" class="sc-dIUggk brOXes">Areas Served</h2>
<p ><?php echo $profs ["areas"]; ?></p>

</div>

<a href="#profile-navi" class="sc-cBNfnY jrFcie sc-dIUggk kUSVNE AnchorSection__StyledLink-sc-15862cl-1 faCiR sc-bkzZxe SrOnly___StyledBox-sc-1y313m4-0 dLhCDe iNgfpH" tabindex="0" font-size="inherit,inherit">Back to Navigation</a>

</section>



<section id="projects" tabindex="-1" class="AnchorSection__StyledSection-sc-15862cl-0 kNUPit sc-bkzZxe kFDUGU">
<div class="sc-bkzZxe dLhCDe">
<div display="flex" class="sc-bkzZxe iLjwZw">
<h2 font-weight="semibold" font-size="smallPlus,medium" class="sc-dIUggk ixeySq">Projects Done</h2>
</div>
<?php foreach ( $tasks as $task) :?>



<div class="sc-bkzZxe sc-hiSbYr dLhCDe gSMdbl hui-grid ">
<div class="sc-bkzZxe ImageCard___StyledBox-sc-1stnd5f-3 bzaWyI daIZbL">
<a display="flex" height="100%" href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>" class="sc-cBNfnY hFIsMp sc-dIUggk kTSsRI ImageCard__StyledLink-sc-1stnd5f-0 hiwjAt sc-bkzZxe kYTRjc" font-size="inherit,inherit">
<div width="390" height="260" class="ImageCard__ResponsiveCover-sc-1stnd5f-2 evfIBi">
<img src="../<?php echo $task['photo']; ?>" srcSet="../<?php echo $task['photo']; ?>" width="390" height="260" data-pin-nopin="true" alt="" loading="lazy" class="ImageCard__ResponsiveImage-sc-1stnd5f-1 kmrrkG"/>
</div>
<div class="sc-bkzZxe jWVHWw">
<h3 font-weight="semibold" title="<?php echo $task['title']; ?>" font-size="small,small" class="ProjectCard__TruncatedHeading-sc-1d5je1m-0 jeGOtY sc-dIUggk lgYSiG">   <?php echo $task['title']; ?></h3>

<div color="content.secondary" font-size="xSmall,xSmall" class="sc-dIUggk hnagUF">
<?php echo $task['category']; ?>
</div>

</div>
</a>
</div>




<?php endforeach ?>     





</div>

</div>



</section>







</main>

<div class="sc-bkzZxe sc-gWHgXt gPrrWv kQxpNq hui-cell d-none d-xs-none  d-md-none d-lg-block d-xl-block ">
<div class="sc-bkzZxe biQGEx"><div class="sc-bkzZxe fImxWv"><div class="sc-bkzZxe dLhCDe">

<div font-weight="semibold" font-size="small,small" class="sc-dIUggk lgYSiG text-capitalize">Contact <?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></div>
</div>
<div class="sc-bkzZxe hOTVEw">
<button type="button" class="sc-iwyYcG hWrMWs hui-btn " aria-disabled="false">Send Message</button>
<div class="edge-contact-dialog edge-contact-dialog--hidden">

<div class="hz-common-contact-professional-dialog__header" style="display:none;">
<span class="header-2"><span class="icon-font icon-close " aria-hidden="true"></span>


</span>
</div>
<div class="hz-horizontal-divider ">
</div>



</div>
</div>
</div>
</div>
<div class="sc-bkzZxe joryLZ">
<div class="sc-bkzZxe IconRow___StyledBox-sc-1f6s35j-0 gHCpAW ilrzEg hz-track-me" data-compid="Profile_Phone" display="flex">

<svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc iNPrKd">

<path fill="currentColor" d="M20 14.661l-4.345-2.17c-.174-.089-.379-.141-.597-.141-.434 0-.819.207-1.062.528l-.002.003-1.125 1.5c-.178.236-.429.409-.718.487l-.009.002c-.099.024-.212.038-.329.038-.197 0-.384-.039-.556-.11l.01.004c-1.473-.576-2.735-1.394-3.797-2.416l.004.004a10.025 10.025 0 01-2.251-3.593l-.022-.07c-.057-.157-.09-.338-.09-.526 0-.229.049-.447.136-.644l-.004.01c.097-.176.225-.324.379-.439l.004-.003L7.12 6c.32-.246.524-.629.524-1.06 0-.219-.053-.425-.146-.608l.003.008L5.335 0 .001 2.666c0 6.625 5.266 11.934 5.327 12 .068.061 5.373 5.334 12 5.334z"></path></svg>

<span font-size="xSmall,xSmall" class="sc-dIUggk IconRow___StyledText-sc-1f6s35j-1 cpsJTg bkjkrD"><button font-size="inherit,inherit" class="sc-citwmv bpcYca sc-dIUggk kUSVNE">+<?php echo $profs ["phone"]; ?></button></span>
</div>

<div display="flex" class="sc-bkzZxe IconRow___StyledBox-sc-1f6s35j-0 gHCpAW ilrzEg">
<svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc iNPrKd">
<path fill="currentColor" d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm7.387 8.75h-2.441c-.143-1.968-.653-3.786-1.461-5.43l.038.086c2.011 1.089 3.45 3.015 3.857 5.298l.007.045zM10 17.5h-.043c-1.337-1.724-2.209-3.87-2.394-6.209l-.003-.041h4.875c-.183 2.38-1.054 4.527-2.412 6.277l.02-.027h-.044zM7.561 8.75c.183-2.38 1.054-4.527 2.412-6.277l-.02.027h.089c1.337 1.724 2.208 3.87 2.394 6.209l.003.041zM6.476 3.406c-.769 1.558-1.278 3.376-1.418 5.296l-.003.048H2.613c.414-2.329 1.853-4.255 3.824-5.324l.04-.02zM2.612 11.25H5.05c.142 1.966.649 3.782 1.453 5.426l-.038-.087c-2.005-1.09-3.44-3.014-3.846-5.293l-.007-.045zm10.913 5.342c.77-1.558 1.279-3.375 1.42-5.294l.003-.048h2.44c-.414 2.328-1.852 4.254-3.823 5.323l-.04.02z"></path></svg>

<span font-size="xSmall,xSmall" class="sc-dIUggk IconRow___StyledText-sc-1f6s35j-1 cpsJTg bkjkrD"><a rel="noopener noreferrer" href="" target="_blank" font-size="inherit,inherit" class="sc-cBNfnY drZktI sc-dIUggk kUSVNE"><?php echo $profs ["email"]; ?></a></span>
</div>
<div display="flex" class="sc-bkzZxe IconRow___StyledBox-sc-1f6s35j-0 gHCpAW ilrzEg">

<svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc iNPrKd">
<path fill="currentColor" d="M17.5 7.5v-.005c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5c0 3.146 1.937 5.84 4.683 6.953l.05.018L9.999 20l2.766-5.534c2.795-1.131 4.732-3.822 4.734-6.966zM10 4.615c1.593 0 2.885 1.292 2.885 2.885S11.593 10.385 10 10.385c-1.593 0-2.885-1.292-2.885-2.885 0-1.593 1.292-2.885 2.885-2.885z"></path>
</svg>

<span font-size="xSmall,xSmall" class="sc-dIUggk IconRow___StyledText-sc-1f6s35j-1 cpsJTg bkjkrD"><span><?php echo $profs ["county"]; ?></span></span>
</div>


<div display="flex" class="sc-bkzZxe IconRow___StyledBox-sc-1f6s35j-0 gHCpAW ilrzEg">
<svg color="currentColor" display="inline-block" viewBox="0 0 20 20" focusable="false" role="img" aria-hidden="true" class="sc-fKFyDc iNPrKd">
<path fill="currentColor" d="M17.561 6.875c-.461-1.111.348-3.103-.49-3.94s-2.829-.029-3.94-.49C12.06 2 11.232 0 10 0S7.94 2 6.875 2.439c-1.111.461-3.103-.348-3.94.49S2.9 5.758 2.439 6.875C2 7.94 0 8.768 0 10s2 2.06 2.439 3.131c.461 1.111-.348 3.102.49 3.94s2.829.029 3.94.49C7.94 18.006 8.768 20 10 20s2.06-2 3.131-2.439c1.111-.461 3.102.348 3.94-.49s.029-2.829.49-3.94C18.006 12.06 20 11.232 20 10s-1.994-2.06-2.439-3.125zM10 15c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm-.219-2.732a.6244.6244 0 01-.467.21.622.622 0 01-.441-.183l-1.829-1.829L8.148 9.36l1.125 1.125 2.52-2.825 1.166 1.04z"></path>
</svg>
<span font-size="xSmall,xSmall" class="sc-dIUggk IconRow___StyledText-sc-1f6s35j-1 cpsJTg bkjkrD"><?php echo $profs ["occupation"]; ?></span>
</div>


</div>
</div>
</div>
<section class="container-fluid row m-0" >

<script src="https://use.fontawesome.com/963f9846e6.js"></script>

                </div>
                <!-- End Page-content -->

               

=======

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Professsional Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Dashboard<a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Professional Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" >
                            <div class="col-xl-4" >
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Professional Details</h5>
                                                    <p>Summary </p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="../<?php echo $profs ["picture"]; ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>                       
                                            </div>                                        
                                        </div>
                                       
                                        <div class=" pt-0 table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td class="text-capitalize"><?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Profession :</th>
                                                        <td class="text-capitalize"><?php echo $profs ["occupation"]; ?></td>
                                                    </tr>
                                                  
                                                    <tr>
                                                        <th scope="row">County:</th>
                                                        <td><?php echo $profs ["county"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone :</th>
                                                        <td><?php echo $profs ["phone"]; ?></td>
                                                    </tr>
                                                   
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                               
                             
                                <!-- end card -->
                            </div>         
                            
                            <div class="col-xl-8">

                                <div class="row">
                                
                                </div>
                       
                            
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                
                <?php include('footer.php'); ?>


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
<<<<<<< HEAD
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
=======
                        <img src="../assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
<<<<<<< HEAD
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
=======
                        <img src="../assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
<<<<<<< HEAD
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
=======
                        <img src="../assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

<<<<<<< HEAD
      <script src="../assets/libs/jquery/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/metismenu/metisMenu.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Required datatable js -->
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- crypto-wallet init -->
<script src="../assets/js/pages/crypto-wallet.init.js"></script>

<script src="../assets/js/app.js"></script>

        <title>Profesionals Profile</title>
=======
        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <script src="../assets/js/app.js"></script>


>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    </body>
</html>
