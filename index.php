<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Welcome' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>欢迎来到智防盾牌靶场</h1>
	<p>欢迎使用本靶场，它专为提升您的网络安全技能而设计。我们提供多种网络安全漏洞，每种漏洞都有低、中、高三个难度等级的攻击页面，帮助您逐步掌握不同的攻击策略和防御技巧。通过实时的攻防模拟演练，您将获得一个全面的实战训练平台，无论是初学者还是安全专家，都能在这里提升自己的实战能力。</p>
	<p>智防盾牌靶场的目标是通过简单明了的界面来练习一些最常见的 Web 漏洞，具有不同的难度级别。</p>
	<hr />
	<br />

	<h2>一般说明</h2>
	<p>这取决于用户如何处理 ZF Shield。要么在固定级别完成每个模块，要么选择任何模块并在进入下一个模块之前努力达到他们可以达到的最高级别。没有一个固定的对象来完成一个模块;但是，用户应该认为他们已经通过使用该特定漏洞尽可能成功地利用了系统。</p>
	<p>请注意，此软件<em>存在记录在案和未记录的漏洞</em>。这是有意为之的。我们鼓励您尝试发现尽可能多的问题。</p>
	<p>每个页面的底部都有一个帮助按钮，允许您查看该漏洞的提示和提示。此外，还有一些额外的链接，用于进一步的背景阅读，这与该安全问题有关。</p>
	<hr />
	<br />

	<h2>警告！</h2>
	<p>这个靶场非常脆弱！<em>请勿将其上传到您的托管提供商的公共 HTML 文件夹或任何面向互联网的服务器</em>，否则将会被攻陷。建议使用虚拟机（如 " . dvwaExternalLinkUrlGet( 'https://www.virtualbox.org/','VirtualBox' ) . " 或 " . dvwaExternalLinkUrlGet( 'https://www.vmware.com/','VMware' ) . "），设置为 NAT 网络模式。在访客机器内，您可以下载并安装 " . dvwaExternalLinkUrlGet( 'https://www.apachefriends.org/','XAMPP' ) . " 用于 web 服务器和数据库。</p>
	<br />
	<h3>免责声明</h3>
	<p>我们不对任何人使用此应用程序（ZF Shield）的方式承担责任。我们已明确说明该应用程序的目的，不应恶意使用。我们已发出警告，并采取措施防止用户在实时 web 服务器上安装 ZF Shield。如果您的 web 服务器因安装 ZF Shield 而被攻陷，责任不在我们，而在于上传和安装它的人员。</p>
	<hr />
	<br />

	<h2>更多培训资源</h2>
	<p>ZF Shield 旨在涵盖当今 web 应用程序中最常见的漏洞。然而，web 应用程序还有许多其他问题。如果您希望探索其他攻击向量，或想要更具挑战性的难度，可以考虑以下其他项目：</p>
	<hr />
	<br />
</div>";

dvwaHtmlEcho( $page );

?>
