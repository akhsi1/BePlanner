	<?php 

	if ( ! defined( 'ABSPATH' ) ) exit;
	
function is_wpks_firefox_shortcut($key){
	if( is_wpks_browser_shortcut( $key, "Alt+Arrow_Left") == 0 ){ $content = "Back";}
elseif( is_wpks_browser_shortcut( $key, "Alt+Arrow_Right") == 0 ){ $content = "Forward";}
elseif( is_wpks_browser_shortcut( $key, "Shift+Backspace") == 0 ){ $content = "Forward";}
elseif( is_wpks_browser_shortcut( $key, "Alt+Home") == 0 ){ $content = "Home";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+O") == 0 ){ $content = "Open File";}
elseif( is_wpks_browser_shortcut( $key, "F5") == 0 ){ $content = "Reload";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+R") == 0 ){ $content = "Reload";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F5") == 0 ){ $content = "Reload (override cache) ";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+R") == 0 ){ $content = "Reload (override cache) ";}
elseif( is_wpks_browser_shortcut( $key, "Esc") == 0 ){ $content = "Stop";}
elseif( is_wpks_browser_shortcut( $key, "Page_Down") == 0 ){ $content = "Go Down a Screen";}
elseif( is_wpks_browser_shortcut( $key, "Page_Up") == 0 ){ $content = "Go Up a Screen";}
elseif( is_wpks_browser_shortcut( $key, "Shift+Spacebar") == 0 ){ $content = "Go Up a Screen";}
elseif( is_wpks_browser_shortcut( $key, "End") == 0 ){ $content = "Go to Bottom of Page";}
elseif( is_wpks_browser_shortcut( $key, "Home") == 0 ){ $content = "Go to Top of Page";}
elseif( is_wpks_browser_shortcut( $key, "F6") == 0 ){ $content = "Move to Next Frame";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F6") == 0 ){ $content = "Move to Previous Frame";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+P") == 0 ){ $content = "Print";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+S") == 0 ){ $content = "Save Page As";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+add") == 0 ){ $content = "Zoom In";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Substract") == 0 ){ $content = "Zoom Out";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+0") == 0 ){ $content = "Zoom Reset";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+C") == 0 ){ $content = "Copy";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+X") == 0 ){ $content = "Cut";}
elseif( is_wpks_browser_shortcut( $key, "Delete") == 0 ){ $content = "Deleteete";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+V") == 0 ){ $content = "Paste";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+V") == 0 ){ $content = "Paste (as plain text)";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Y") == 0 ){ $content = "Redo";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+A") == 0 ){ $content = "Select All";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Z	") == 0 ){ $content = "Undo";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F") == 0 ){ $content = "Find";}
elseif( is_wpks_browser_shortcut( $key, "F3") == 0 ){ $content = "Find Again";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+G") == 0 ){ $content = "Find Again";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F3") == 0 ){ $content = "Find Previous";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+G") == 0 ){ $content = "Find Previous";}
elseif( is_wpks_browser_shortcut( $key, "'") == 0 ){ $content = "Quick Find within link-text only ";}
elseif( is_wpks_browser_shortcut( $key, "/") == 0 ){ $content = "Quick Find";}
elseif( is_wpks_browser_shortcut( $key, "Esc") == 0 ){ $content = "Close the Find or Quick Find bar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+K") == 0 ){ $content = "Focus Search bar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+E") == 0 ){ $content = "Focus Search bar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+↑") == 0 ){ $content = "Quickly switch between search engines";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+↓") == 0 ){ $content = "when Search Bar is focused ";}
elseif( is_wpks_browser_shortcut( $key, "Alt+↑") == 0 ){ $content = "View menu to switch, add or manage search engines ";}
elseif( is_wpks_browser_shortcut( $key, "Alt+↓") == 0 ){ $content = "View menu to switch, add or manage search engines ";}
elseif( is_wpks_browser_shortcut( $key, "F4") == 0 ){ $content = "when Search Bar is focused ";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+W") == 0 ){ $content = "Close Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+F4") == 0 ){ $content = "except for App Tabs ";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+W") == 0 ){ $content = "Close Window";}
elseif( is_wpks_browser_shortcut( $key, "Alt+F4") == 0 ){ $content = "Close Window";}
elseif( is_wpks_browser_shortcut( $key, "Alt+F4") == 0 ){ $content = "Close Window";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Page_Up") == 0 ){ $content = "Move Tab in focus Left";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Page_Down") == 0 ){ $content = "Move Tab in focus Right";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Home") == 0 ){ $content = "Move Tab in focus to start";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+End") == 0 ){ $content = "Move Tab in focus to end";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+M") == 0 ){ $content = "Mute/Unmute Audio";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+T") == 0 ){ $content = "New Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+N") == 0 ){ $content = "New Window";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+P") == 0 ){ $content = "New Private Window";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Tab") == 0 ){ $content = "Next Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Page_Down") == 0 ){ $content = "";}
elseif( is_wpks_browser_shortcut( $key, "Alt+Enter") == 0 ){ $content = "Open Address in New Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Tab") == 0 ){ $content = "Previous Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Page_Up") == 0 ){ $content = "";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+T") == 0 ){ $content = "Undo Close Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+N") == 0 ){ $content = "Undo Close Window";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+1to8") == 0 ){ $content = "Select Tab 1 to 8";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+9") == 0 ){ $content = "Select Last Tab";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+H") == 0 ){ $content = "History sidebar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+H") == 0 ){ $content = "Library window (History)";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Delete") == 0 ){ $content = "Clear Recent History";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+D") == 0 ){ $content = "Bookmark All Tabs";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+D") == 0 ){ $content = "Bookmark This Page";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+B") == 0 ){ $content = "Bookmarks sidebar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+I") == 0 ){ $content = "Bookmarks sidebar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+B") == 0 ){ $content = "Library window (Bookmarks)";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+J") == 0 ){ $content = "Downloads";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+A") == 0 ){ $content = "Add-ons";}
elseif( is_wpks_browser_shortcut( $key, "F12") == 0 ){ $content = "Toggle Developer Tools";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+I") == 0 ){ $content = "Toggle Developer Tools";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+K") == 0 ){ $content = "Web Console";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+C") == 0 ){ $content = "Inspector";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+S") == 0 ){ $content = "Debugger";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F7") == 0 ){ $content = "Style Editor";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F5") == 0 ){ $content = "Profiler";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Q") == 0 ){ $content = "Network";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F2") == 0 ){ $content = "Developer Toolbar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+M") == 0 ){ $content = "Responsive Design View";}
elseif( is_wpks_browser_shortcut( $key, "Shift+F4") == 0 ){ $content = "Scratchpad";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+U") == 0 ){ $content = "Page Source";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+J") == 0 ){ $content = "Browser Console";}
elseif( is_wpks_browser_shortcut( $key, "N") == 0 ){ $content = "Next page";}
elseif( is_wpks_browser_shortcut( $key, "J") == 0 ){ $content = "Next page";}
elseif( is_wpks_browser_shortcut( $key, "Arrow_Right") == 0 ){ $content = "Next page";}
elseif( is_wpks_browser_shortcut( $key, "P") == 0 ){ $content = "Previous page";}
elseif( is_wpks_browser_shortcut( $key, "K") == 0 ){ $content = "Previous page";}
elseif( is_wpks_browser_shortcut( $key, "Arrow_Left") == 0 ){ $content = "Previous page";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl++") == 0 ){ $content = "Zoom in";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+-") == 0 ){ $content = "Zoom out";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+0") == 0 ){ $content = "Automatic Zoom";}
elseif( is_wpks_browser_shortcut( $key, "R") == 0 ){ $content = "Rotate the document clockwise";}
elseif( is_wpks_browser_shortcut( $key, "Shift+R") == 0 ){ $content = "Rotate counterclockwise";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Alt+P") == 0 ){ $content = "Switch to Presentation Mode";}
elseif( is_wpks_browser_shortcut( $key, "H") == 0 ){ $content = "Toggle Hand Tool";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Alt+G") == 0 ){ $content = "Focus the Page Number input box";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Enter") == 0 ){ $content = "Complete .com Address";}
elseif( is_wpks_browser_shortcut( $key, "Shift+Enter") == 0 ){ $content = "Complete .net Address";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Shift+Enter") == 0 ){ $content = "Complete .org Address";}
elseif( is_wpks_browser_shortcut( $key, "Delete") == 0 ){ $content = "Deleteete Selected Autocomplete Entry";}
elseif( is_wpks_browser_shortcut( $key, "F11") == 0 ){ $content = "Toggle Full Screen";}
elseif( is_wpks_browser_shortcut( $key, "Alt") == 0 ){ $content = "Toggle Menu Bar activation (showing it temporarily when hidden)";}
elseif( is_wpks_browser_shortcut( $key, "F10") == 0 ){ $content = "Toggle Menu Bar activation (showing it temporarily when hidden)";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Alt+R") == 0 ){ $content = "Toggle Reader Mode";}
elseif( is_wpks_browser_shortcut( $key, "F7") == 0 ){ $content = "Caret Browsing";}
elseif( is_wpks_browser_shortcut( $key, "F6") == 0 ){ $content = "Select Location Bar";}
elseif( is_wpks_browser_shortcut( $key, "Alt+D") == 0 ){ $content = "Select Location Bar";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+L") == 0 ){ $content = "Select Location Bar";}
elseif( is_wpks_browser_shortcut( $key, "Spacebar") == 0 ){ $content = "Toggle Play / Pause";}
elseif( is_wpks_browser_shortcut( $key, "↓") == 0 ){ $content = "Decrease volume";}
elseif( is_wpks_browser_shortcut( $key, "↑") == 0 ){ $content = "Increase volume";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+↓") == 0 ){ $content = "Mute audio";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+↑") == 0 ){ $content = "Unmute audio";}
elseif( is_wpks_browser_shortcut( $key, "Arrow_Left") == 0 ){ $content = "Seek back 15 seconds";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Arrow_Left") == 0 ){ $content = "Seek back 10 % ";}
elseif( is_wpks_browser_shortcut( $key, "Arrow_Right") == 0 ){ $content = "Seek forward 15 seconds";}
elseif( is_wpks_browser_shortcut( $key, "Ctrl+Arrow_Right") == 0 ){ $content = "Seek forward 10 % ";}
elseif( is_wpks_browser_shortcut( $key, "Home") == 0 ){ $content = "Seek to the beginning ";}
elseif( is_wpks_browser_shortcut( $key, "End") == 0 ){ $content = "Seek to the end ";} 
else {
	$content = "none";
}

	return $content;
}