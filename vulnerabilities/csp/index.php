<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = '漏洞：内容安全策略 (CSP) 绕过' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'csp';
$page[ 'help_button' ]   = 'csp';
$page[ 'source_button' ] = 'csp';

dvwaDatabaseConnect();

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
        break;
}

$page[ 'body' ] = <<<EOF
<div class="body_padded">
    <h1>漏洞：内容安全策略 (CSP) 绕过</h1>

    <div class="vulnerable_code_area">
EOF;

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/csp/source/{$vulnerabilityFile}";

$page[ 'body' ] .= <<<EOF
    </div>
EOF;

$page[ 'body' ] .= "
    <h2>更多信息</h2>
    <ul>
        <li>" . dvwaExternalLinkUrlGet( 'https://content-security-policy.com/', "内容安全策略参考" ) . "</li>
        <li>" . dvwaExternalLinkUrlGet( 'https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP', "Mozilla 开发者网络 - CSP: script-src") . "</li>
        <li>" . dvwaExternalLinkUrlGet( 'https://blog.mozilla.org/security/2014/10/04/csp-for-the-web-we-have/', "Mozilla 安全博客 - 我们所拥有的网页 CSP" ) . "</li>
    </ul>
    <p><i>模块开发者：<a href='https://twitter.com/digininja'>Digininja</a>。</i></p>
</div>\n";

dvwaHtmlEcho( $page );

?>
