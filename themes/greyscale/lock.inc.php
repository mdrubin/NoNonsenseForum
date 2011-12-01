<!DOCTYPE html>
<meta charset="utf-8" />
<!-- NoNonsense Forum v7 © Copyright (CC-BY) Kroc Camen 2011
     licensed under Creative Commons Attribution 3.0 <creativecommons.org/licenses/by/3.0/deed.en_GB>
     you may do whatever you want to this code as long as you give credit to Kroc Camen, <camendesign.com> -->
<title><?php echo $LOCKED ? 'Unlock Thread?' : 'Lock Thread?';?> <?php echo $HEADER['TITLE']?></title>
<!-- get rid of IE site compatibility button -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" href="<?php echo FORUM_PATH?>themes/<?php echo FORUM_THEME?>/theme.css" />
<meta name="viewport" content="width=device-width, maximum-scale=1, user-scalable=no" />
<meta name="robots" content="noindex, nofollow" />
<!-- details on using mobile favicons with thanks to <mathiasbynens.be/notes/touch-icons> -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo FORUM_PATH?>themes/<?php echo FORUM_THEME?>/favicon.ico" sizes="16x16 24x24 32x32" />
<link rel="apple-touch-icon-precomposed" href="<?php echo FORUM_PATH?>themes/<?php echo FORUM_THEME?>/touch.png" />
<!-- Microsoft’s insane IE9 pinned site syntax: <msdn.microsoft.com/library/gg131029> -->
<meta name="application-name" content="<?php echo PATH ? safeString (PATH) : safeString (FORUM_NAME)?>" />
<meta name="msapplication-starturl" content="<?php echo FORUM_URL.PATH_URL?>" />
<meta name="msapplication-window" content="width=1024;height=600" />
<meta name="msapplication-navbutton-color" content="#222" />

<body>
<!-- =================================================================================================================== -->
<!-- original 'Grayscale' theme by Jon Gjengset <thesquareplanet.com>,
     greyscale theme by Kroc Camen, please modify to suit your needs -->
<header id="mast">
	<h1><a href="<?php echo FORUM_PATH?>"><?php echo safeHTML(FORUM_NAME)?></a></h1>
	<form id="search" method="get" action="http://google.com/search"><!--
		--><input type="hidden" name="as_sitesearch" value="<?php echo safeString($_SERVER['HTTP_HOST'])?>" /><!--
		--><input id="query" type="search" name="as_q" placeholder="Google Search…" /><!--
		--><input id="go" type="image" src="<?php echo FORUM_PATH?>themes/<?php echo FORUM_THEME?>/icons/go.png" value="Search" width="20" height="20" /><!--
	--></form>
</header>
<!-- =================================================================================================================== -->
<section id="<?php echo $LOCKED ? 'unlock' : 'lock';?>">
	<h1><?php echo $LOCKED ? 'Unlock Thread?' : 'Lock Thread?';?></h1>
	<form method="post" enctype="application/x-www-form-urlencoded;charset=utf-8" autocomplete="on">
		<div id="leftcol">
		
		<p id="puser">
			<label for="user">Name:</label>
			<input name="username" id="user" type="text" size="28" tabindex="1"
			       maxlength="<?php echo SIZE_NAME?>" required autocomplete="on"
			       placeholder="Your name" value="<?php echo $FORM['NAME']?>" />
		</p>
		
		</div><div id="rightcol">
		
		<p id="ppass">
			<label for="pass">Password:</label>
			<input name="password" id="pass" type="password" size="28" tabindex="2"
			       maxlength="<?php echo SIZE_PASS?>" required autocomplete="on"
			       placeholder="A password to keep your name" value="<?php echo $FORM['PASS']?>" />
		</p><p id="pemail">
			<label class="email">Email:</label>
			<input name="email" type="text" value="example@abc.com" tabindex="0"
			       required autocomplete="off" />
			(Leave this as-is, it’s a trap!)
		</p>
		
		</div>
<?php switch ($FORM['ERROR']):
	case ERROR_NONE: ?>
		<p id="ok">
			To <?php echo $LOCKED ? 'unlock' : 'lock';?> this thread you must be a moderator.
		</p>
<?php  	break;
	case ERROR_NAME: ?>
		<p id="error">Enter a name. You’ll need to use this with the password each time.</p>
<?php	break;
	case ERROR_PASS: ?>
		<p id="error">Enter a password. It’s so you can re-use your name each time.</p>
<?php	break;
	case ERROR_AUTH: ?>
		<p id="error">
			Name / password mismatch! You must enter the name and password of a designated moderator.
		</p>
<?php endswitch; ?>
		
		<p id="psubmit"><label for="submit"><?php echo $LOCKED ? 'Unlock' : 'Lock';?>
			<input id="submit" name="submit" type="image" src="<?php echo FORUM_PATH?>themes/<?php echo FORUM_THEME?>/icons/submit.png"
			       width="40" height="40" tabindex="3" value="&gt;" />
		</label></p>
	</form>
</section>
<!-- =================================================================================================================== -->
<div id="mods">
<?php if (!empty ($MODS['LOCAL'])): ?>
	<p>
		Moderators for this sub-forum:
		<b class="mod"><?php echo implode ('</b>, <b class="mod">', array_map ('safeHTML', $MODS['LOCAL']))?></b>
	</p>
<?php endif;
      if (!empty ($MODS['GLOBAL'])): ?>
	<p>
		Your friendly neighbourhood moderators:
		<b class="mod"><?php echo implode ('</b>, <b class="mod">', array_map ('safeHTML', $MODS['GLOBAL']))?></b>
	</p>
<?php endif;
      if (!empty ($MEMBERS)): ?>
	<p>
		Members of this forum:
		<b><?php echo implode ('</b>, <b>', array_map ('safeHTML', $MEMBERS))?></b>
	</p>
<?php endif; ?>
</div>
<footer><p>
	Powered by <a href="http://camendesign.com/nononsense_forum">NoNonsenseForum</a><br />
	© Kroc Camen of <a href="http://camendesign.com">Camen Design</a>
</p></footer>
<script>
//in iOS tapping a label doesn't click the related input element, we'll add this back in using JavaScript
if (document.getElementsByTagName !== undefined) {
	var labels = document.getElementsByTagName ("label");
	//for reasons completely unknown, one only has to reset the onclick event, not actually make it do anything!!
	for (i=0; i<labels.length; i++) if (labels[i].getAttribute ("for")) labels[i].onclick = function (){}
}
</script>
</body>