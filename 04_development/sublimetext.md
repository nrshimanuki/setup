SublimeText
===

## Download

<a href="https://www.sublimetext.com/" target="_blank">https://www.sublimetext.com/</a>


## Install Package Control

以下からコードを取得

<a href="https://packagecontrol.io/installation" target="_blank">https://packagecontrol.io/installation</a>

1. 「View > Show Console」でコンソールを表示してコードを貼り付け
2. Enterキーを押して、SablimeTextを再起動
3. Command Paletteを表示
4. 「Tools」>「Command Palette」 or 「Shift + command(ctrl) + p」
5. 「Install Package」と入力してEnter
6. 以下をインストール

	* AdvancedNewFile
		- option + command + n で新規ファイル作成

	* AutoFileName
		- ファイル名を補完
		- "afn_insert_dimensions": true,
		- "afn_insert_width_first": true,
		- "afn_template_languages": true,

	* BracketHighlighter
		- カッコ類を強調

	* CSS Snippets
		- CSSの自動補完

	* CSSComb
		- ショートカットでCSSのプロパティを自動整列

	* Emmet
		- コーディングを補助

	* FileDiffs
		- コードをコピー後、比較したいコードを範囲選択して右クリックでファイルの差分を表示できる

	* Goto-CSS-Declaration
		- CSSにジャンプ

	* Hayaku
		- CSSの補完

	* HTML5
		- HTMLの補完

	* IMESupport
		- WindowsでIMEを利用した文字入力をサポート

	* jQuery
		- jQueryの補完

	* SFTP
		- FTPが使える

	* SideBarEnhancements
		- SideBarの右クリックに機能を追加

	* SublimeCodeIntel
		- 補完、ジャンプなど

	* SublimeLinter
		- 構文エラーを自動的にチェック

	* Inc-Dec-Value
		- テキスト中の数字とカラーコードなどをショートカットで増減できる


## 設定ファイル

```
{
	"afn_insert_dimensions": true,
	"afn_insert_width_first": true,
	"afn_template_languages": true,
	"auto_complete_delay": 30,
	"bold_folder_labels": true,
	"caret_extra_width": 1,
	"close_windows_when_empty": false,
	"color_scheme": "Packages/Color Scheme - Default/Monokai.sublime-color-scheme",
	"disable_formatted_linebreak": true,
	"disable_tab_abbreviations": true,
	"draw_white_space": "all",
	"enable_tab_scrolling": false,
	"enable_telemetry": "false",
	"ensure_newline_at_eof_on_save": true,
	"fade_fold_buttons": false,
	"font_size": 11,
	"highlight_line": true,
	"highlight_modified_tabs": true,
	"hot_exit": false,
	"ignored_packages":
	[
		"Vintage"
	],
	"margin": 0,
	"match_brackets_angle": true,
	"move_to_limit_on_up_down": true,
	"open_files_in_new_window": false,
	"remember_open_files": false,
	"scroll_past_end":true,
	"show_encoding": true,
	"show_full_path": true,
	"show_line_endings": true,
	"show_minimap": false,
	"tab_size": 2,
	"trim_trailing_white_space_on_save": true,
	"word_wrap": true,
}
```


## Key Bindings

```
[
	{ "keys": ["shift+enter"], "command": "insert", "args": {"characters": "<br>"} },
	{ "keys": ["shift+super+-"], "command": "color_pick" },

	{ "keys": ["ctrl+l"], "command": "move", "args": {"by": "characters", "forward": true } },
	{ "keys": ["ctrl+h"], "command": "move", "args": {"by": "characters", "forward": false } },
	{ "keys": ["ctrl+k"], "command": "move", "args": {"by": "lines", "forward": false } },
	{ "keys": ["ctrl+j"], "command": "move", "args": {"by": "lines", "forward": true } },

	{ "keys": ["alt+m"], "command": "markdown_preview", "args": {"target": "browser", "parser":"markdown"} },

	{ "keys": ["ctrl+down"], "command": "goto_css_declaration", "args": {"goto": "next"} },
	{ "keys": ["ctrl+up"],  "command": "goto_css_declaration", "args": {"goto": "prev"} },

	{ "keys": ["ctrl+w"], "command": "toggle_setting", "args": {"setting": "word_wrap"} }
]
```


## Snippet

1. Tools > Developer > New Snippet
2. ファイルの拡張子は「.sublime-snippet」


## Shortcut

* ctrl + t 選択した2つの文字列を交換
