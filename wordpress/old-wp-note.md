# WP note (old)

## Sample

```
<?php
  $paged = get_query_var('paged');
  $cat_id = get_query_var('cat');

  if($cat_id != 1):
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 15,
      'post_status' => 'publish',
      'category__in' => array($cat, 2),
      'paged' => $paged
    );
  else:
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 15,
      'post_status' => 'publish',
      'paged' => $paged
    );
  endif;
  query_posts($args);
  if(have_posts()):
?>
<dl class="list">
<?php
  while(have_posts()): the_post();
    $cats = get_the_category();
    foreach($cats as $cat):
      if($cat->category_parent > 0):
        $term = $cat;
        break;
      endif;
    endforeach;

    if($term->name == '全店'):
      $term->name = '全　店';
    endif;
?>
  <dt class="date">
  	<?php the_time('Y.m.d'); ?>
  	<span class="shop<?php if($term->slug == 'all') echo ' all'; ?>">
  		<?php echo $term->name; ?>
  	</span>
  </dt>
  <dd>
  	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </dd>
  <?php endwhile; ?>
</dl>
<?php endif; ?>
```


```
<?php
  $cats = get_categories();
  foreach($cats as $cat):
    if($cat->name != 'お知らせ' && $cat->name != '全店'):
?>
<li>
	<a href="<?php bloginfo('url'); ?>/info/<?php echo $cat->slug; ?>/">
		<?php echo $cat->name; ?>
	</a>
</li>
<?php
    endif;
  endforeach;
?>
```


## 管理画面の投稿一覧ページにカスタムタクソノミーの絞り込み条件を追加

```
function add_post_taxonomy_restrict_filter() {
    global $post_type;
    if('【post-name】' == $post_type):
?>
    <select name="【tax-name】">
        <option value="">カテゴリー指定なし</option>
        <?php
            $terms = get_terms('【tax-name】');
            foreach($terms as $term):
        ?>
        <option value="<?php echo $term->slug; ?>"<?php if($_GET['【tax-name】'] == $term->slug) echo ' selected'; ?>><?php echo $term->name; ?></option>
        <?php endforeach; ?>
    </select>
<?php
    endif;
}
add_action('restrict_manage_posts', 'add_post_taxonomy_restrict_filter');


function add_post_taxonomy_restrict_filter() {
    global $post_type;
    if('post' == $post_type):
?>
    <select name="tag">
        <option value="">タグ指定なし</option>
        <?php
            $terms = get_terms('post_tag');
            foreach($terms as $term):
        ?>
        <option value="<?php echo $term->slug; ?>"<?php if($_GET['tag'] == $term->slug) echo ' selected'; ?>><?php echo $term->name; ?></option>
        <?php endforeach; ?>
    </select>
<?php
    endif;
}
add_action('restrict_manage_posts', 'add_post_taxonomy_restrict_filter');
```


## アクションフック

```
add_action('アクションフック名', '実行する関数名');

// 投稿の保存時に実行されるアクションフック
function set_meta($post_id){
    global $post;
    $str = get_the_title($post_id);
    update_post_meta($post_id, 'hoge', $str);
}
add_action('save_post', 'set_meta');
```


## プレビューができない

ドキュメントルート下の「index.php」で「wp-blog-header.php」をrequireしている場合に発生。
( プレビュー時のURL: ```http://sample.com/?p=123&preview=true``` )

「wp-blog-header.php」をrequireする前に下記を記述。

```
if (isset($_GET['preview'])):
  header("Location: /wp". $_SERVER["REQUEST_URI"]);
  exit;
endif;
```
