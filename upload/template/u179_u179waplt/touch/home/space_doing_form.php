<?php exit;?>
<script type="text/javascript">
var msgstr = '$defaultstr';
function handlePrompt(type) {
	var msgObj = $('message');
	if(type) {
		if(msgObj.value == msgstr) {
			msgObj.value = '';
			msgObj.className = 'xg2';
		}
		if($('message_menu')) {
			if($('message_menu').style.display == 'block') {
				showFace('message', 'message', msgstr);
			}
		}
		if(BROWSER.firefox || BROWSER.chrome) {
			showFace('message', 'message', msgstr);
		}
	} else {
		if(msgObj.value == ''){
			msgObj.value = msgstr;
			msgObj.className = 'xg1';
		}
	}
}
</script>

<div id="moodfm" class="doing_post">
	<form method="post" autocomplete="off" id="mood_addform" action="home.php?mod=spacecp&ac=doing&view=$_GET[view]" onsubmit="if($('message').value == msgstr){return false;}">
    <div class="doing_txt">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td id="mood_statusinput" >                
					<textarea name="message" id="message" rows="4" style="border-radius:3px 0px 0px 3px; border:none;" placeholder="$defaultstr" fwin="reply"></textarea>
				</td>
				<th>
					<button type="submit" name="add" id="add" class="u179_y" >{lang publish}</button>
				</th>
			</tr>			
		</table>
        </div>
		<input type="hidden" name="addsubmit" value="true" />
		<input type="hidden" name="refer" value="$theurl" />
		<input type="hidden" name="topicid" value="$topicid" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	</form>
</div>