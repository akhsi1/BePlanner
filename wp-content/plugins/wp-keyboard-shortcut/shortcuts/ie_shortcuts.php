<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	
function is_wpks_ie_shortcut($key){
	if( is_wpks_browser_shortcut( $key, "Alt+Home") == 0 ){ $content = "Go to Home webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Right") == 0 || is_wpks_browser_shortcut( $key, "Alt+Arrow_Left") == 0) {
	$content = "Alt+Arrow_Right/Alt+Arrow_Left 	Go to next / previous webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+D") == 0 || is_wpks_browser_shortcut( $key, "F6") == 0) {$content = "Alt+D/F6	Jump to address bar. f6 additionally navigates through window elements."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Enter") == 0) {$content = " Complete a .com address in address bar: adds \"http://\" prefix and a \".com\"-suffix, then loads the webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Enter") == 0){
	$content = "Complete an URI in address bar with user-defined suffix: adds \"http://\" prefix and suffix (e.g. .net, .org, .de, ...), then loads the webpage. Set the suffix in tools:options (alt+t, then o), languages (alt+l), and enter to suffix field at bottom."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Down") == 0 || is_wpks_browser_shortcut( $key, "F4") == 0) {
	$content = "Alt+Arrow_Down/F4 	Open webpages visited in the past when in address bar. Includes Favorites and History. Navigate with arrow keys and enter to visit."; }
elseif( is_wpks_browser_shortcut( $key, "Delete") == 0 || is_wpks_browser_shortcut( $key, "Shift+Delete") == 0 ){ $content = "Delete/Shift+Delete 	Delete past visited webpages from address bar history (also see shortcut above)."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+T") == 0 ){ $content = "Open new tab in same window."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+K") == 0 ){ $content = "Duplicate current tab."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Tab") == 0 || is_wpks_browser_shortcut( $key, "Ctrl+Tab") == 0) { $content = "Ctrl+Tab/Ctrl+Shift+Tab 	Jump to next / jump to previous browser tab."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+W") == 0 ){ $content = "Close the current tab."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+T") == 0 ){ $content = "Restore closed tab (open previously closed tab)."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Q") == 0 ){ $content = "Show Tabs: Open or close quick tab view."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Q") == 0) {$content = "Show Tabs: Open list of tabs. Then use arrow keys and enter to select or escape to exit."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+1") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+2") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+3") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+4") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+5") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+6") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+7") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+8") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+9") == 0 ){$content = "Ctrl+1 ... ctrl+9 	Jump to browser tab 1 - 9."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Enter") == 0 ){ $content = "Open typed webpage address in new background tab."; }
elseif( is_wpks_browser_shortcut( $key, "Arrow_Down") == 0|| is_wpks_browser_shortcut( $key, "Arrow_Up") == 0) {$content = "Arrow_Down/Arrow_Up 	Scroll down / scroll up inside a webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Page_Up") == 0 || is_wpks_browser_shortcut( $key, "Arrow_Down") == 0) {$content = "Page_Up/Arrow_Down 	Jump one Arrow_Down / jump one page up (spacebar / shift+spacebar works as well)."; }
elseif( is_wpks_browser_shortcut( $key, "Home") == 0) {$content = "Home/End Move to the beginning or end of a document."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+[+]") == 0 || is_wpks_browser_shortcut( $key, "Ctrl+-") == 0) {$content = "Ctrl+[+]/Ctrl+- Increase text size / decrease text size (zoom in and out)."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+0") == 0) { $content = "Reset text size to default (zoom to 100%)."; }
elseif( is_wpks_browser_shortcut( $key, "Tab") == 0 || is_wpks_browser_shortcut( $key, "Shift+Tab") == 0 ){$content = "Tab/Shift+Tab	Move forward / move backwards through items on a webpage. Press and hold tab button to skip through multiple links."; }
elseif( is_wpks_browser_shortcut( $key, "Shift+F10") == 0 ){ $content = "When on link: Display a context menu for a link."; }
elseif( is_wpks_browser_shortcut( $key, "Enter") == 0 ){ $content = "Activate a selected link."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+A") == 0 ){ $content = "Select all content on webpage."; }
elseif( is_wpks_browser_shortcut( $key, "F5") == 0 || is_wpks_browser_shortcut( $key, "Ctrl+R") == 0){$content = "F5/Ctrl+R 	Refresh the current webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F5") == 0 ){ $content = "Refresh the current webpage with cache override."; }
elseif( is_wpks_browser_shortcut( $key, "F7") == 0 ){ $content = "Turn caret browsing on or off (movable cursor on page)."; }
elseif( is_wpks_browser_shortcut( $key, "Esc") == 0 ){ $content = "Stop loading webpage."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+I") == 0 ){ $content = "Open Favorites box."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+I") == 0 ){ $content = "Open Favorites box in pinned mode."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+H") == 0 ){ $content = "Open History box."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+H") == 0 ){ $content = "Open History in pinned mode."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+J") == 0 ){ $content = "Open Feeds."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+J") == 0 ){ $content = "Open Feeds in pinned mode."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+D") == 0 ){ $content = "Add the current webpage to favorites."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+B") == 0 ){ $content = "	Open the Organize Favorites dialog box. Use tab to navigate and alt and shift+alt to move items up or down in list."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F") == 0 ){ $content = "Ctrl+F/F3	Open find window. Press escape to exit."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+F") == 0 ){ $content = "Turn in-private filtering on or off (watch icon change in status bar)"; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+P") == 0 ){ $content = "Open private browsing window / incognito mode."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Delete") == 0 ){ $content = "Open 'Delete Browsing History' Menu."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+spacebar") == 0 ){ $content = "Opens the title bar menu."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+spacebar+Enter") == 0 ){ $content = "Restore Window (default Windows feature)."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+spacebar+X") == 0 ){ $content = "Maximize Window (default Windows feature)."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+spacebar+N") == 0 ){ $content = "Minimize Window (default Windows feature)."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Shift+Enter") == 0 ){ $content = "Toggle regular window / full screen without toolbars"; }
elseif( is_wpks_browser_shortcut( $key, "F11") == 0 ){ $content = "Turn full page view on or off (default Windows feature)."; }
elseif( is_wpks_browser_shortcut( $key, "F6") == 0 ){ $content = "Move forward between window elements."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+N") == 0 ){ $content = "Open a new browser window."; }
elseif( is_wpks_browser_shortcut( $key, "F4") == 0 ){ $content = "Close IE8 Window."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+E") == 0 ){ $content = "Jump to the Instant Search box (box on top right corner of browser window)."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Arrow_Down") == 0 ){ $content = "View list of search providers."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Enter") == 0 ){ $content = "Open search results in new tab."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+P") == 0 ){ $content = "Print the current webpage."; }
elseif( is_wpks_browser_shortcut( $key, "F12") == 0 ){ $content = "Open Developer Tools."; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+O") == 0 || is_wpks_browser_shortcut( $key, "Ctrl+L") == 0 ){ $content = "Open location."; }
elseif( is_wpks_browser_shortcut( $key, "Alt+V+C") == 0 ){ $content = "View webpage source in default editor (used to be ctrl+u but that was discontinued)."; }
	else {
		$content = "none";
	}

	return $content;
}