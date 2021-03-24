<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function is_wpks_chrome_shortcut($key){

   if ( is_wpks_browser_shortcut( $key, "Alt+Home") == 0  ) { 
   	$content = 'Open your homepage';}
elseif( is_wpks_browser_shortcut( $key, "Alt+Tab") == 0  ) { 
	$content = 'Toggle between browser windows';}
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Left") == 0  ) { 
	$content = 'Back a page';}
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Right") == 0  ) { 
	$content = 'Forward a page';}
elseif( is_wpks_browser_shortcut( $key, "F11") == 0  ) { 
	$content = 'Display the current website in full-screen mode. Pressing F11 again will exit this mode.';
}
elseif( is_wpks_browser_shortcut( $key, "Esc") == 0  ) { $content = 'Stop page or download from loading';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+subtract") == 0  ) { $content = 'Zoom out of a page, "-" (will zoom out)';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+add") == 0  ) { $content = 'Zoom out of a page, "+" will zoom in';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+1") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+2") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+3") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+4") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+5") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+6") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+7") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+8") == 0  ) { $content = 'Pressing Ctrl and any number 1 through 8 will move to the corresponding tab in your tab bar.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+9") == 0  ) { $content = 'Switch to last tab';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+0") == 0  ) { $content = 'Reset browser zoom to default';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Enter") == 0  ) { $content = 'This combination is used to quickly complete an address.';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Del") == 0  ) { $content = 'Open the Clear Data window to quickly clear private data';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+B") == 0  ) { $content ='Toggle the bookmarks bar between hidden and shown';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+A") == 0  ) { $content = 'Select everything on a page';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+D") == 0  ) { $content = 'Add a bookmark for the page currently opened';}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F") == 0  ) { $content = 'Open the "find" bar to search text on the current page'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+O") == 0  ) { $content = 'Open a file in the browser'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+O") == 0  ) { $content = 'Open the Bookmark manager'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+H") == 0  ) { $content = 'Open browser history in a new tab'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+J") == 0  ) { $content = 'Display the downloads window'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+K") == 0  ) { $content = 'Moves your text cursor to the omnibox'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+E") == 0  ) { $content = 'Moves your text cursor to the omnibox'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+L") == 0  ) { $content = 'Move the cursor to the browser address bar and highlight everything in it'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+N") == 0  ) { $content = 'Open New browser window'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+N") == 0  ) { $content = 'Open a new window in incognito (private) mode'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+P") == 0  ) { $content = 'Print current page or frame'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+R") == 0  )	{ $content = 'Refresh the current page or frame.'; }
elseif( is_wpks_browser_shortcut( $key, "F5") == 0  ) { $content = 'Refresh the current page or frame.'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+S") == 0  ) { $content = 'Saves the current page'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+T") == 0  ) { $content = 'Opens a new tab'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+U") == 0  ) { $content = 'View a web page\'s source code'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+W") == 0  ) { $content = 'Closes the currently selected tab'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+W") == 0  ) { $content = 'Closes the currently selected window'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+T") == 0  ) { $content = 'This combination reopens the last tab you\'ve closed.'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Tab") == 0  ) { $content = 'Moves through each of the open tabs going to the right'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Tab") == 0  ) { $content = 'Moves through each of the open tabs going to the left'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Left-click") == 0  ) { $content = 'Open a link in a new tab in the background'; }
elseif( is_wpks_browser_shortcut( $key, "Left-click") == 0  ) { $content = 'Open a link in a new tab and switch to the new tab'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift") == 0  ) { $content = 'Open a link in a new tab and switch to the new tab'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Page_Down") == 0  ) { $content = 'Open the browser tab to the right'; }
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Page_Up") == 0  ) { $content = 'Open the browser tab to the left'; }
elseif( is_wpks_browser_shortcut( $key, "Spacebar") == 0  ) { $content = 'Moves down a page at a time'; }
elseif( is_wpks_browser_shortcut( $key, "Shift+Spacebar") == 0  ) { $content = 'Moves up a page at a time'; }
elseif( is_wpks_browser_shortcut( $key, "Home") == 0  ) { $content = 'Go to top of page'; }
elseif( is_wpks_browser_shortcut( $key, "End") == 0  ) { $content = 'Go to bottom of page'; }
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Down") == 0  ) { $content = 'Display all previous text entered in a text box and available options on a drop-down menu.';}
	else {
		$content = "none";
	}

	return $content;
}