=== SB @Reply comment ===
Contributors: fida02
Donate link: http://webcarezone.com/contact-us.asp
Tags: reply, at-reply, comments, twitter, facebook, commenter, name, science, breeze, sb, @reply, fida al hasan, bangle, web care zone, wcz, web care, webcarezone
Requires at least: 2.8
Tested up to: 3.8.1
Stable tag: trunk

This plugin allows you to add Facebook,Twitter-like @commenter name in comments reply

== Description ==

This plugin allows you to add Facebook,Twitter-like @commenter name in comments reply

= This plug-in will =
* Add commenter name in reply
* Make commenter name linkify with comment link
* Add @ in reply

Why don't you rate the plugin if you like it !! :)
 
Our Team [Web Care Zone](http://webcarezone.com).

== Changelog ==

= 1.0 - Initial Release =

== Installation ==

Automatic
1. In the admin panel plugins page click Add New
2. Search for SB @Reply comment
3. Find SB @Reply comment in the list an click Install Now
4. Click OK when prompted
5. Enjoy!
Manual
1. Extract sb-reply-comment.zip to your wp-content/plugins directory.
2. In the admin panel under plugins activate SB @Reply comment.
3. Enjoy!

== Frequently Asked Questions ==

= It doesn't work! I activated the plugin but I can't see the reply links. =

They *should* be visible only when you move your mouse cursor over a comment text. If it still doesn't work, open `sb-reply-comment.php` search for `visibility:hidden;` (line 26) and remove that part, then you can also remove the whole line 29 `.comment:hover .yarr { visibility:visible }` because it becomes useless. This will make the reply links always visible for **all** comments (and not just the one your mouse cursor is over).

= It doesn't work! I can see the reply links but clicking them does nothing. =

Either you have disabled JavaScript in your browser or your WordPress theme is not using the default id for the comments textarea (which is `comment`). In the later case, check your `comments.php` file to find your textarea id, then open `sb-reply-comment.php` and replace all the `document.getElementById('comment')` with `document.getElementById('YOUR_ID')`.

= Possible conflicts with other plugins. =

A plugin that filters the default WordPress comments functions, may prevent SB @Reply comment from working. For example, WP_Identicon does this, but it also has an alternate setup for "advanced users" that doesn't conflict with SB @Reply comment.

== Screenshots ==

1. The reply links as they appear in comments.
2. This is automatically inserted when you click on a reply link.
3. After replied
