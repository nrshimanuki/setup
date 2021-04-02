<?php

/** ========================================
 * URL設定
 */
add_rewrite_rule('blog/([^0-9][^/]+)/?$', 'index.php?blog_category=$matches[1]', 'top');
add_rewrite_rule('blog/([^0-9][^/]+)/?/page/?([0-9]{1,})/?$', 'index.php?blog_category=$matches[1]&paged=$matches[2]', 'top');

add_rewrite_rule('news/([^0-9][^/]+)/?$', 'index.php?news_category=$matches[1]', 'top');
add_rewrite_rule('news/([^0-9][^/]+)/page/?([0-9]{1,})/?$', 'index.php?news_category=$matches[1]&paged=$matches[2]', 'top');



/** ========================================
 * titleタグ
 */
function custom_title_separator($sep) {
	$sep = '|';
	return $sep;
}
add_filter( 'document_title_separator', 'custom_title_separator' );



/** ========================================
 * remove_menus
 */
function remove_menus() {

	if (!current_user_can('administrator')) {
	// 管理者以外の場合
	}

	if ( current_user_can( 'administrator' ) ) {
	// 管理者の場合
	} elseif ( current_user_can( 'editor' ) ) {
	// 編集者の場合
	} elseif ( current_user_can( 'author' ) ) {
	// 投稿者の場合
	} elseif ( current_user_can( 'contributor' ) ) {
	// 寄稿者の場合
	} elseif ( current_user_can( 'subscriber' ) ) {
	// 購読者の場合
	}

	// --- ダッシュボード ---
	remove_menu_page( 'index.php' ); // ダッシュボード
	remove_submenu_page( 'index.php', 'index.php' ); // ダッシュボード / ホーム.
	remove_submenu_page( 'index.php', 'update-core.php' ); // ダッシュボード / 更新.

	// --- 投稿 ---
	remove_menu_page( 'edit.php' ); // 投稿
	remove_submenu_page( 'edit.php', 'edit.php' ); // 投稿 / 投稿一覧.
	remove_submenu_page( 'edit.php', 'post-new.php' ); // 投稿 / 新規追加.
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); // 投稿 / カテゴリー.
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // 投稿 / タグ.

	// --- メディア ---
	remove_menu_page( 'upload.php' ); // メディア
	remove_submenu_page( 'upload.php', 'upload.php' ); // メディア / ライブラリ.
	remove_submenu_page( 'upload.php', 'media-new.php' ); // メディア / 新規追加.

	// --- 固定 ---
	remove_menu_page( 'edit.php?post_type=page' ); // 固定
	remove_submenu_page( 'edit.php?post_type=page', 'edit.php?post_type=page' ); // 固定 / 固定ページ一覧.
	remove_submenu_page( 'edit.php?post_type=page', 'post-new.php?post_type=page' ); // 固定 / 新規追加.

	// --- コメント ---
	remove_menu_page( 'edit-comments.php' );

	// --- 外観 ---
	remove_menu_page( 'themes.php' ); // 外観
	remove_submenu_page( 'themes.php', 'themes.php' ); // 外観 / テーマ.
	remove_submenu_page( 'themes.php', 'customize.php?return=' . rawurlencode( $_SERVER['REQUEST_URI'] ) ); // 外観 / カスタマイズ.
	remove_submenu_page( 'themes.php', 'nav-menus.php' ); // 外観 / メニュー.
	remove_submenu_page( 'themes.php', 'widgets.php' ); // 外観 / ウィジェット.
	remove_submenu_page( 'themes.php', 'theme-editor.php' ); // 外観 / テーマエディタ.

	// --- プラグイン ---
	remove_menu_page( 'plugins.php' ); // プラグイン
	remove_submenu_page( 'plugins.php', 'plugins.php' ); // プラグイン / インストール済みプラグイン.
	remove_submenu_page( 'plugins.php', 'plugin-install.php' ); // プラグイン / 新規追加.
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); // プラグイン / プラグインエディタ.

	// --- ユーザー ---
	remove_menu_page( 'users.php' ); // ユーザー
	remove_submenu_page( 'users.php', 'users.php' ); // ユーザー / ユーザー一覧.
	remove_submenu_page( 'users.php', 'user-new.php' ); // ユーザー / 新規追加.
	remove_submenu_page( 'users.php', 'profile.php' ); // ユーザー / あなたのプロフィール.

	// --- ツール ---
	remove_menu_page( 'tools.php' ); // ツール
	remove_submenu_page( 'tools.php', 'tools.php' ); // ツール / 利用可能なツール.
	remove_submenu_page( 'tools.php', 'import.php' ); // ツール / インポート.
	remove_submenu_page( 'tools.php', 'export.php' ); // ツール / エクスポート.
	remove_submenu_page( 'tools.php', 'site-health.php' ); // ツール / サイトヘルス.
	remove_submenu_page( 'tools.php', 'export_personal_data' ); // ツール / 個人データのエクスポート.
	remove_submenu_page( 'tools.php', 'remove_personal_data' ); // ツール / 個人データの消去.

	// --- 設定 ---
	remove_menu_page( 'options-general.php' ); // 設定
	remove_submenu_page( 'options-general.php', 'options-general.php' ); // 設定 / 一般.
	remove_submenu_page( 'options-general.php', 'options-writing.php' ); // 設定 / 投稿設定.
	remove_submenu_page( 'options-general.php', 'options-reading.php' ); // 設定 / 表示設定.
	remove_submenu_page( 'options-general.php', 'options-discussion.php' ); // 設定 / ディスカッション.
	remove_submenu_page( 'options-general.php', 'options-media.php' ); // 設定 / メディア.
	remove_submenu_page( 'options-general.php', 'options-permalink.php' ); // 設定 / メディア.
	remove_submenu_page( 'options-general.php', 'privacy.php' ); // 設定 / プライバシー.

	// プラグイン（例）
	remove_menu_page( 'wpcf7' ); // Contact Form 7.
	remove_menu_page( 'edit.php?post_type=mw-wp-form' ); // MW WP Form.
	remove_menu_page( 'all-in-one-seo-pack/aioseop_class.php' ); // All In One SEO Pack.
	remove_submenu_page( 'tools.php', 'aiosp_import' ); // All In One SEO Pack.
	remove_menu_page( 'wpseo_dashboard' ); // Yoast SEO.
	remove_menu_page( 'jetpack' ); // Jetpack.
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Advanced Custom Fields.
	remove_menu_page( 'cptui_main_menu' ); // Custom Post Type UI.
	remove_menu_page( 'backwpup' ); // BackWPup.
	remove_menu_page( 'ai1wm_export' ); // All-in-One WP Migration.
	remove_menu_page( 'advgb_main' ); // Advanced Gutenberg.
	remove_submenu_page( 'options-general.php', 'tinymce-advanced' ); // TinyMCE Advanced.
	remove_submenu_page( 'options-general.php', 'table-of-contents' ); // Table of Contents Plus.
	remove_submenu_page( 'options-general.php', 'duplicatepost' ); // Duplicate Post.
	remove_submenu_page( 'upload.php', 'ewww-image-optimizer-bulk' ); // EWWWW.
	remove_submenu_page( 'options-general.php', 'ewww-image-optimizer/ewww-image-optimizer.php' ); // EWWWW.
}
add_action( 'admin_menu', 'remove_menus', 999 );

// remove_customs
function remove_customs() {
	remove_theme_support( 'custom-header' );
	remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'remove_customs' );



/** ========================================
 * remove_admin_bar_menus
 */
function remove_admin_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'my-account' ); // こんにちは、[ユーザー名]さん.
	$wp_admin_bar->remove_menu( 'user-info' ); // ユーザー / [ユーザー名].
	$wp_admin_bar->remove_menu( 'edit-profile' ); // ユーザー / プロフィールを編集.
	$wp_admin_bar->remove_menu( 'logout' ); // ユーザー / ログアウト.

	$wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressロゴ.
	$wp_admin_bar->remove_menu( 'about' ); // WordPressロゴ / WordPressについて.
	$wp_admin_bar->remove_menu( 'wporg' ); // WordPressロゴ / WordPress.org.
	$wp_admin_bar->remove_menu( 'documentation' ); // WordPressロゴ / ドキュメンテーション.
	$wp_admin_bar->remove_menu( 'support-forums' ); // WordPressロゴ / サポート.
	$wp_admin_bar->remove_menu( 'feedback' ); // WordPressロゴ / フィードバック.

	$wp_admin_bar->remove_menu( 'site-name' ); // サイト名.
	$wp_admin_bar->remove_menu( 'view-site' ); // サイト名 / サイトを表示.

	$wp_admin_bar->remove_menu( 'updates' ); // 更新.
	$wp_admin_bar->remove_menu( 'comments' ); // コメント.

	$wp_admin_bar->remove_menu( 'new-content' ); // 新規投稿.
	$wp_admin_bar->remove_menu( 'new-post' ); // 新規投稿 / 投稿.
	$wp_admin_bar->remove_menu( 'new-media' ); // 新規投稿 / メディア.
	$wp_admin_bar->remove_menu( 'new-page' ); // 新規投稿 / 固定.
	$wp_admin_bar->remove_menu( 'new-user' ); // 新規投稿 / ユーザー.

	$wp_admin_bar->remove_menu( 'menu-toggle' ); // メニュー.
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 999 );

	// プラグイン（例）
function remove_admin_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'new-mw-wp-form' ); // 新規投稿 / MW WP Form.
	$wp_admin_bar->remove_menu( 'wpseo-menu' ); // Yoast SEO.
	$wp_admin_bar->remove_menu( 'all-in-one-seo-pack' ); // All in One SEO Pack.
	$wp_admin_bar->remove_menu( 'show_template_file_name_on_top' ); // Show Current Template.
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 100000 );
add_filter( 'aioseo_show_in_admin_bar', '__return_false' ); // All in One SEO Pack.



/** ========================================
 * 投稿をカスタマイズ
 */
// function post_has_archive( $args, $post_type ) {
// if ( 'post' == $post_type ) {
// 		$args['rewrite'] = true;
// 		$args['has_archive'] = 'news';
// 	}
// 	return $args;
// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

function change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'お知らせ';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function change_objectlabel() {
	global $wp_post_types;
	$name = 'お知らせ';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'change_objectlabel' );
add_action( 'admin_menu', 'change_menulabel' );

function custom_rewrite_basic() {
	add_rewrite_rule('news/page/?([0-9]{1,})/?$', 'index.php?category_name=news&paged=$matches[1]', 'top');
	add_rewrite_rule('news/(.+?)/page/?([0-9]{1,})/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]', 'top');
}
add_action('init', 'custom_rewrite_basic');



/** ========================================
 * title-tag
 */
add_theme_support( 'title-tag' );

function custom_title_separator($sep) {
	$sep = '|';
	return $sep;
}
add_filter( 'document_title_separator', 'custom_title_separator' );



/** ========================================
 * 固定ページに抜粋フィールド表示
 */
add_post_type_support( 'page', 'excerpt' );



/** ========================================
 * 投稿保存時の自動整形を無効
 */
remove_filter('the_content', 'wpautop'); // 記事
remove_filter('the_excerpt', 'wpautop'); // 抜粋
remove_filter('term_description','wpautop');



/** ========================================
 * 固定ページに抜粋フィールド表示
 */
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'my_custom_init');



/** ========================================
 * contentの抜粋文字数
 */
function my_excerpt_length($length) {
	return 28;
}
add_filter('excerpt_length', 'my_excerpt_length');



/** ========================================
 * カスタムクエリ変数追加
 */
function add_query_vars_filter( $vars ) {
	$vars[] = "calendar_year";
	$vars[] = "calendar_month";
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );



/** ========================================
 * description
 */
add_action('admin_menu', 'add_custom_fields');
add_action('save_post', 'save_custom_fields');

// 記事ページと固定ページでカスタムフィールドを表示
function add_custom_fields() {
  add_meta_box( 'my_sectionid', 'カスタムフィールド', 'my_custom_fields', 'post');
  add_meta_box( 'my_sectionid', 'カスタムフィールド', 'my_custom_fields', 'page');
}
function my_custom_fields() {
  global $post;
  $keywords = get_post_meta($post->ID,'keywords',true);
  $description = get_post_meta($post->ID,'description',true);
  // echo '<p>キーワード（半角カンマ区切り）<br>';
  // echo '<input type="text" name="keywords" value="'.esc_html($keywords).'" size="60"></p>';
  echo '<p>ページの説明（description）160文字以内<br>';
  echo '<input type="text" style="width: 600px;height: 40px;" name="description" value="'.esc_html($description).'" maxlength="160"></p>';
}

// カスタムフィールドの値を保存
function save_custom_fields( $post_id ) {
  if(!empty($_POST['keywords'])){
    update_post_meta($post_id, 'keywords', $_POST['keywords'] );
  }else{
    delete_post_meta($post_id, 'keywords');
  }
  if(!empty($_POST['description'])){
    update_post_meta($post_id, 'description', $_POST['description'] );
  }else{
    delete_post_meta($post_id, 'description');
  }
}

// 表示
function set_description() {
  $custom = get_post_custom();
  $description = '';
  if(!empty( $custom['description'][0])) {
    $description = $custom['description'][0];
  }
  if(is_home()) {
    echo get_bloginfo('description');
  }elseif(is_single()) {
  }elseif(is_page()) {
    echo $description;
  }elseif(is_archive()) {
    echo single_cat_title().'の記事一覧';
  }elseif(is_category()) {
    echo single_cat_title().'の記事一覧';
  }elseif(is_tag()) {
  }else {
  };
}



/** ========================================
 * パンくず
 */
function breadcrumbs_list() {
	echo '<ol class="bread_list">' . "\n";

	$home = '<li class="bread_item"><a class="bread_link" href="/">TOP</a></li>' . "\n";
	$current_category_name = single_cat_title('', false);
	$post_title = get_the_title();

	if (is_category()) {
		$current_page_data = sanitize_post($GLOBALS['wp_the_query']->get_queried_object());
		$parent_id = $current_page_data->parent;
		$category_list = array();
		// array_unshift($category_list, '<li class="bread_item"><span> &gt; </span><a class="bread_link" href="/news/">お知らせ</a></li>' . "\n");
		while ($parent_id != 0) {
			$parent_category_data = get_category($parent_id);
			$parent_category_slug = $parent_category_data->slug;
			$parent_category_name = $parent_category_data->name;
			$parent_category_link = get_category_link($parent_id);
			array_unshift($category_list, '<li class="bread_item"><span> &gt; </span><a class="bread_link" href="' . $parent_category_link . '">' . $parent_category_name . '</a></li>' . "\n");
			$parent_id = $parent_category_data->parent;
		}
		echo $home;
		foreach($category_list as $category) {
			echo $category;
		}
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">' . $current_category_name . '</span></li>' . "\n";

	} elseif (is_archive()) {
		echo $home;
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">' . $current_category_name . '</span></li>' . "\n";
		// the_archive_title('<li class="bread_item"><span> &gt; </span><span class="bread_link">', '</span></li>'  . "\n");

	} elseif (is_single()) {
		$category_data = get_the_category();
		$category_data = $category_data[0];
		if (isset($category_data->cat_ID)) {
			$category_id = $category_data->cat_ID;
		}
		$category_list = array();
		while ($category_id != 0) {
			$category_data = get_category( $category_id );
			$category_link = get_category_link( $category_id );
			array_unshift($category_list, '<li class="bread_item"><span> &gt; </span><a class="bread_link" href="' . $category_link . '">' . $category_data->name . '</a></li>' . "\n");
			$category_id = $category_data->parent;
		}
		echo $home;
		foreach($category_list as $category) {
			echo $category;
		}
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">' . $post_title . '</span></li>' . "\n";

	} elseif (is_page()) {
		$ancestors_ids = array_reverse(get_post_ancestors(get_the_ID()));
		$category_list = array();
		foreach($ancestors_ids as $ancestors_id){
			array_unshift($category_list, '<li class="bread_item"><span> &gt; </span><a class="bread_link" href="' . get_page_link($ancestors_id) . '">' . get_page($ancestors_id)->post_title . '</a></li>' . "\n");
		}
		echo $home;
		foreach($category_list as $category) {
			echo $category;
		}
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">' . $post_title . '</span></li>' . "\n";

	} elseif (is_search()) {
		echo $home;
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">「' . get_search_query() . '」の検索結果</span></li>' . "\n";

	} elseif (is_404()) {
		echo $home;
		echo '<li class="bread_item"><span> &gt; </span><span class="bread_link">ページが存在しません</span></li>' . "\n";

	} else {
		echo $home;
	}

	echo '</ol>' . "\n";
}



/** ========================================
 * アーカイブの余計なタイトルを削除
 */
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('', false);
	} elseif (is_date()) {
		$title = get_the_time('Y年n月');
	} elseif (is_search()) {
		$title = '検索結果：' . esc_html(get_search_query(false));
	} elseif (is_404()) {
		$title = '「404」ページが見つかりません';
	} else {
	}
	return $title;
});



/** ========================================
 * contactform7 p,brタグを削除
 */
add_filter('wpcf7_autop_or_not', '__return_false');



/** ========================================
 * contactform7 メールアドレス再確認チェック
 */
function wpcf7_validate_email_filter_confrim( $result, $tag ) {
	$type = $tag['type'];
	$name = $tag['name'];
	if ( 'email' == $type || 'email*' == $type ) {
		if (preg_match('/(.*)_confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
			$target_name = $matches[1];
				$posted_value = trim( (string) $_POST[$name] ); //前後空白の削除
				$posted_target_value = trim( (string) $_POST[$target_name] ); //前後空白の削除
			if ($posted_value != $posted_target_value) {
				$result->invalidate( $tag,"確認用のメールアドレスが一致していません");
			}
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_email', 'wpcf7_validate_email_filter_confrim', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_confrim', 11, 2 );



/** ========================================
 * Contact Form 7のエラーメッセージの場所を必要な項目のみ変更
 */
function wpcf7_custom_item_error_position( $items, $result ) {
	// メッセージを表示させたい場所のタグのエラー用のクラス名
	$class = 'wpcf7-custom-item-error';
	// メッセージの位置を変更したい項目名
	$names = array( 'birth', 'month', 'month_day', 'age' );

	// 入力エラーがある場合
	if ( isset( $items['invalidFields'] ) ) {
		foreach ( $items['invalidFields'] as $k => $v ) {
			$orig = $v['into'];
			$name = substr( $orig, strrpos($orig, ".") + 1 );
			// 位置を変更したい項目のみ、エラーを設定するタグのクラス名を差替
			if ( in_array( $name, $names ) ) {
				$items['invalidFields'][$k]['into'] = ".{$class}.{$name}";
			}
		}
	}
	return $items;
}
add_filter( 'wpcf7_ajax_json_echo', 'wpcf7_custom_item_error_position', 10, 2 );



/** ========================================
 * 記事公開時にタイトルに日付を付与する
 */
function add_date_to_title() {
	if (!empty($_POST['publish']) && $_POST['post_type'] == 'calendar') {
		$args = $_POST;
		$post_title = $_POST['post_title'] . '__' . date('Ymd');
		$args['post_title'] = $post_title;
		wp_update_post($args);
	}
	add_action('save_post', 'update_post');
}
add_action( 'new_to_publish', 'add_date_to_title' );
add_action( 'pending_to_publish', 'add_date_to_title' );
add_action( 'draft_to_publish', 'add_date_to_title' );
add_action( 'auto-draft_to_publish', 'add_date_to_title' );
add_action( 'future_to_publish', 'add_date_to_title' );
add_action( 'private_to_publish', 'add_date_to_title' );



/** ========================================
 * カレンダーの予約投稿機能を無効にする
 */
function stop_post_status_future_func($data, $postarr) {
	if (($data['post_type'] == 'calendar' && $data['post_status'] == 'future') && $postarr['post_status'] == 'publish') {
		$data['post_status'] = 'publish';
	}
	return $data;
};
add_filter( 'wp_insert_post_data', 'stop_post_status_future_func', 10, 2 );



/** ========================================
 * カレンダーにイベント表示
 */
function get_cpt_calendar($cpt, $initial = true, $echo = true) {
    global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

    $cache = array();
    $key = md5( $m . $monthnum . $year );
    if ( $cache = wp_cache_get( 'get_calendar', 'calendar' ) ) {
        if ( is_array($cache) && isset( $cache[ $key ] ) ) {
            if ( $echo ) {
                echo apply_filters( 'get_calendar',  $cache[$key] );
                return;
            } else {
                return apply_filters( 'get_calendar',  $cache[$key] );
            }
        }
    }

    if ( !is_array($cache) )
        $cache = array();

    // Quick check. If we have no posts at all, abort!
    if ( !$posts ) {
        $gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = '$cpt' AND post_status = 'publish' LIMIT 1");
        if ( !$gotsome ) {
            $cache[ $key ] = '';
            wp_cache_set( 'get_calendar', $cache, 'calendar' );
            return;
        }
    }

    if ( isset($_GET['w']) )
        $w = ''.intval($_GET['w']);

    // week_begins = 0 stands for Sunday
    $week_begins = intval(get_option('start_of_week'));

    // Let's figure out when we are
    if ( !empty($monthnum) && !empty($year) ) {
        $thismonth = ''.zeroise(intval($monthnum), 2);
        $thisyear = ''.intval($year);
    } elseif ( !empty($w) ) {
        // We need to get the month from MySQL
        $thisyear = ''.intval(substr($m, 0, 4));
        $d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
        $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
    } elseif ( !empty($m) ) {
        $thisyear = ''.intval(substr($m, 0, 4));
        if ( strlen($m) < 6 )
                $thismonth = '01';
        else
                $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
    } else {
        $thisyear = gmdate('Y', current_time('timestamp'));
        $thismonth = gmdate('m', current_time('timestamp'));
    }

    $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
    $last_day = date('t', $unixmonth);

    // Get the next and previous month and year with at least one post
    $previous = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date < '$thisyear-$thismonth-01'
        AND post_type = '$cpt' AND post_status = 'publish'
            ORDER BY post_date DESC
            LIMIT 1");
    $next = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date > '$thisyear-$thismonth-{$last_day} 23:59:59'
        AND post_type = '$cpt' AND post_status = 'publish'
            ORDER BY post_date ASC
            LIMIT 1");

    /* translators: Calendar caption: 1: month name, 2: 4-digit year */
    // $calendar_caption = _x('%1$s %2$s', 'calendar caption');
    $calendar_caption = _x('%1$s', 'calendar caption');
    $calendar_output = '<table id="wp-calendar" class="event_table">
    <caption>' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . 'のイベント情報</caption>
    <thead>
    <tr>';

    $myweek = array();

    for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
        // $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
        $myweek[] = $wp_locale->get_weekday(($wdcount)%7);
    }

    foreach ( $myweek as $wd ) {
        $day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
        $wd = esc_attr($wd);
        $calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
    }

    $calendar_output .= '
    </tr>
    </thead>
    ';

    $calendar_output .= '

    <tbody>
    <tr>';

    // Get days with posts
    $dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
        FROM $wpdb->posts WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00'
        AND post_type = '$cpt' AND post_status = 'publish'
        AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59'", ARRAY_N);
    if ( $dayswithposts ) {
        foreach ( (array) $dayswithposts as $daywith ) {
            $daywithpost[] = $daywith[0];
        }
    } else {
        $daywithpost = array();
    }

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
        $ak_title_separator = "\n";
    else
        $ak_title_separator = ', ';

    $ak_titles_for_day = array();
    $ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
        ."FROM $wpdb->posts "
        ."WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00' "
        ."AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59' "
        ."AND post_type = '$cpt' AND post_status = 'publish'"
    );
    if ( $ak_post_titles ) {
        foreach ( (array) $ak_post_titles as $ak_post_title ) {

                /** This filter is documented in wp-includes/post-template.php */
                $post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );

                if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
                    $ak_titles_for_day['day_'.$ak_post_title->dom] = '';
                if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
                    $ak_titles_for_day["$ak_post_title->dom"] = $post_title;
                else
                    $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
        }
    }

    // See how much we should pad in the beginning
    // $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
    $pad = calendar_week_mod(date('w', $unixmonth));
    if ( 0 != $pad )
        $calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';

    $daysinmonth = intval(date('t', $unixmonth));
    for ( $day = 1; $day <= $daysinmonth; ++$day ) {
        if ( isset($newrow) && $newrow )
            $calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
        $newrow = false;

        if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
            $calendar_output .= '<td id="today">';
        else
            $calendar_output .= '<td>';

        if ( in_array($day, $daywithpost) ) // any posts today?
                // $calendar_output .= '<a class="event_link" href="' . get_day_link( $thisyear, $thismonth, $day ) . '?post_type='.$cpt.'" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
                $calendar_output .= '<a class="event_link" href="/calendar/' . esc_attr( $ak_titles_for_day[ $day ] ) . '" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
        else
            $calendar_output .= $day;
        $calendar_output .= '</td>';

        // if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
        if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))) )
            $newrow = true;
    }

    // $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
    $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear)));
    if ( $pad != 0 && $pad != 7 )
        $calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';

    $calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

    $cache[ $key ] = $calendar_output;
    wp_cache_set( 'get_calendar', $cache, 'calendar' );

    if ( $echo )
        echo apply_filters( 'get_calendar',  $calendar_output );
    else
        return apply_filters( 'get_calendar',  $calendar_output );

}

function get_cpt_calendar_next($cpt, $initial = true, $echo = true) {
    global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

    $cache = array();
    $key = md5( $m . $monthnum + 1 . $year );
    if ( $cache = wp_cache_get( 'get_calendar', 'calendar' ) ) {
        if ( is_array($cache) && isset( $cache[ $key ] ) ) {
            if ( $echo ) {
                echo apply_filters( 'get_calendar',  $cache[$key] );
                return;
            } else {
                return apply_filters( 'get_calendar',  $cache[$key] );
            }
        }
    }

    if ( !is_array($cache) )
        $cache = array();

    // Quick check. If we have no posts at all, abort!
    if ( !$posts ) {
        $gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = '$cpt' AND post_status = 'publish' LIMIT 1");
        if ( !$gotsome ) {
            $cache[ $key ] = '';
            wp_cache_set( 'get_calendar', $cache, 'calendar' );
            return;
        }
    }

    if ( isset($_GET['w']) )
        $w = ''.intval($_GET['w']);

    // week_begins = 0 stands for Sunday
    $week_begins = intval(get_option('start_of_week'));

    // Let's figure out when we are
    if ( !empty($monthnum) && !empty($year) ) {
        $thismonth = ''.zeroise(intval($monthnum), 2);
        $thisyear = ''.intval($year);
    } elseif ( !empty($w) ) {
        // We need to get the month from MySQL
        $thisyear = ''.intval(substr($m, 0, 4));
        $d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
        $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
    } elseif ( !empty($m) ) {
        $thisyear = ''.intval(substr($m, 0, 4));
        if ( strlen($m) < 6 )
                $thismonth = '01';
        else
                $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
    } else {
        // $thisyear = gmdate('Y', current_time('timestamp'));
        // $thismonth = gmdate('m', current_time('timestamp'));
        $date_next = new DateTime();
        $date_next->add(new DateInterval('P1M'));
        $thisyear = $date_next->format('Y');
        $thismonth = $date_next->format('m');
    }

    $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
    $last_day = date('t', $unixmonth);

    // Get the next and previous month and year with at least one post
    $previous = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date < '$thisyear-$thismonth-01'
        AND post_type = '$cpt' AND post_status = 'publish'
            ORDER BY post_date DESC
            LIMIT 1");
    $next = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date > '$thisyear-$thismonth-{$last_day} 23:59:59'
        AND post_type = '$cpt' AND post_status = 'publish'
            ORDER BY post_date ASC
            LIMIT 1");

    /* translators: Calendar caption: 1: month name, 2: 4-digit year */
    // $calendar_caption = _x('%1$s %2$s', 'calendar caption');
    $calendar_caption = _x('%1$s', 'calendar caption');
    $calendar_output = '<table id="wp-calendar" class="event_table">
    <caption>' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . 'のイベント情報</caption>
    <thead>
    <tr>';

    $myweek = array();

    for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
        // $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
        $myweek[] = $wp_locale->get_weekday(($wdcount)%7);
    }

    foreach ( $myweek as $wd ) {
        $day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
        $wd = esc_attr($wd);
        $calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
    }

    $calendar_output .= '
    </tr>
    </thead>
    ';

    $calendar_output .= '

    <tbody>
    <tr>';

    // Get days with posts
    $dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
        FROM $wpdb->posts WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00'
        AND post_type = '$cpt' AND post_status = 'publish'
        AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59'", ARRAY_N);
    if ( $dayswithposts ) {
        foreach ( (array) $dayswithposts as $daywith ) {
            $daywithpost[] = $daywith[0];
        }
    } else {
        $daywithpost = array();
    }

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
        $ak_title_separator = "\n";
    else
        $ak_title_separator = ', ';

    $ak_titles_for_day = array();
    $ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
        ."FROM $wpdb->posts "
        ."WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00' "
        ."AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59' "
        ."AND post_type = '$cpt' AND post_status = 'publish'"
    );
    if ( $ak_post_titles ) {
        foreach ( (array) $ak_post_titles as $ak_post_title ) {

                /** This filter is documented in wp-includes/post-template.php */
                $post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );

                if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
                    $ak_titles_for_day['day_'.$ak_post_title->dom] = '';
                if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
                    $ak_titles_for_day["$ak_post_title->dom"] = $post_title;
                else
                    $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
        }
    }

    // See how much we should pad in the beginning
    // $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
    $pad = calendar_week_mod(date('w', $unixmonth));
    if ( 0 != $pad )
        $calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';

    $daysinmonth = intval(date('t', $unixmonth));
    for ( $day = 1; $day <= $daysinmonth; ++$day ) {
        if ( isset($newrow) && $newrow )
            $calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
        $newrow = false;

        if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
            $calendar_output .= '<td id="today">';
        else
            $calendar_output .= '<td>';

        if ( in_array($day, $daywithpost) ) // any posts today?
                // $calendar_output .= '<a class="event_link" href="' . get_day_link( $thisyear, $thismonth, $day ) . '?post_type='.$cpt.'" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
                $calendar_output .= '<a class="event_link" href="/calendar/' . esc_attr( $ak_titles_for_day[ $day ] ) . '" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
        else
            $calendar_output .= $day;
        $calendar_output .= '</td>';

        // if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
        if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))) )
            $newrow = true;
    }

    // $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
    $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear)));
    if ( $pad != 0 && $pad != 7 )
        $calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';

    $calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

    $cache[ $key ] = $calendar_output;
    wp_cache_set( 'get_calendar', $cache, 'calendar' );

    if ( $echo )
        echo apply_filters( 'get_calendar',  $calendar_output );
    else
        return apply_filters( 'get_calendar',  $calendar_output );

}
