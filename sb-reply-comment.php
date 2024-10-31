<?php
/*
Plugin Name: SB @Reply comment
Plugin URI: http://webcarezone.com/projects/sb-reply-login.asp
Description: This plugin allows you to add Facebook,Twitter-like @commenter name in comments reply
Version: 1.0
Author: Fida Al Hasan
Author URI: http://fida.webcarezone.com
*/

/*
Copyright (C) 2012  Fida Al Hasan - webcarezone.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if (!is_admin()) {
     add_action('comment_form', 'yus_reply_js');
     if (get_option('thread_comments')) {
          add_filter('comment_reply_link', 'yus_reply_threaded');
     } else {
          add_filter('comment_text', 'yus_reply_arr');
     }
}

function yus_reply_js() {
?>
 
<?php if (!get_option('thread_comments')) : ?>
<style>
.yarr { visibility:hidden; position:relative }
.yarr span { cursor:pointer; position:absolute; bottom:0; right:0 }
.yarr img { vertical-align:-2px }
.comment:hover .yarr { visibility:visible }
</style>
<?php endif; ?>
<script type="text/javascript">
	//<![CDATA[
	function yus_replyTo(commentID, author) {
		var inReplyTo = '@<a href="' + commentID + '">' + author + '<\/a>: ';
		var myField;
		if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
			myField = document.getElementById('comment');
		} else {
			return false;
		}
		if (document.selection) {
			myField.focus();
			sel = document.selection.createRange();
			sel.text = inReplyTo;
			myField.focus();
		}
		else if (myField.selectionStart || myField.selectionStart == '0') {
			var startPos = myField.selectionStart;
			var endPos = myField.selectionEnd;
			var cursorPos = endPos;
			myField.value = myField.value.substring(0, startPos) + inReplyTo + myField.value.substring(endPos, myField.value.length);
			cursorPos += inReplyTo.length;
			myField.focus();
			myField.selectionStart = cursorPos;
			myField.selectionEnd = cursorPos;
		}
		else {
			myField.value += inReplyTo;
			myField.focus();
		}
	}
	//]]>
</script>
<?php
}

function yus_reply_threaded($reply_link) {
     $comment_ID = '#comment-' . get_comment_ID();
     $comment_author = esc_html(get_comment_author());
     $yus_reply_link = 'onclick=\'return yus_replyTo("' . $comment_ID . '", "' . $comment_author . '"),';
     return str_replace("onclick='return", "$yus_reply_link", $reply_link);
}

function yus_reply_arr($comment_text) {
	if (!is_feed()) {
		if (comments_open() && have_comments() && get_comment_type() == 'comment') {
			if(get_option('page_comments'))
				$comment_ID = esc_url(get_comment_link());
			else
				$comment_ID = '#comment-' . get_comment_ID();
			$comment_author = esc_html(get_comment_author());
			$yarr = '<div class="yarr"><span onclick=\'yus_replyTo("' . $comment_ID . '", "' . $comment_author . '")\' title="' . __('Reply to this comment') . '"><img alt="' . __('Reply') . '" src="' . WP_PLUGIN_URL . '/reply-to/reply.png" />' . __('Reply') . '</span></div>';
			return $comment_text . $yarr;
		}
		else { return $comment_text; }
	}
	else { return $comment_text; }
}
?>
