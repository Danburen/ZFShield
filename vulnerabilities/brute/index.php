<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = '漏洞：暴力破解' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'brute';
$page[ 'help_button' ]   = 'brute';
$page[ 'source_button' ] = 'brute';
dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = '';
switch( dvwaSecurityLevelGet() ) {
    case 'low':
        $vulnerabilityFile = 'low.php';
        break;
    case 'medium':
        $vulnerabilityFile = 'medium.php';
        break;
    case 'high':
        $vulnerabilityFile = 'high.php';
        break;
    default:
        $vulnerabilityFile = 'impossible.php';
        $method = 'POST';
        break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/brute/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
    <h1>漏洞：暴力破解</h1>

    <div class=\"vulnerable_code_area\">
        <h2>登录</h2>

        <form action=\"#\" method=\"{$method}\">
            用户名：<br />
            <input type=\"text\" name=\"username\"><br />
            密码：<br />
            <input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password\"><br />
            <br />
            <input type=\"submit\" value=\"登录\" name=\"Login\">\n";

if( $vulnerabilityFile == 'high.php' || $vulnerabilityFile == 'impossible.php' )
    $page[ 'body' ] .= "            " . tokenField();

$page[ 'body' ] .= "
        </form>
        {$html}
    </div>

    <h2>更多信息</h2>
    <ul>
        <li>" . dvwaExternalLinkUrlGet( 'https://owasp.org/www-community/attacks/Brute_force_attack' ) . "</li>
        <li>" . dvwaExternalLinkUrlGet( 'http://www.symantec.com/connect/articles/password-crackers-ensuring-security-your-password' ) . "</li>
        <li>" . dvwaExternalLinkUrlGet( 'https://www.golinuxcloud.com/brute-force-attack-web-forms' ) . "</li>
    </ul>
</div>\n";

dvwaHtmlEcho( $page );

?>
