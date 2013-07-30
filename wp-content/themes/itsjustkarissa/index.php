<!DOCTYPE html>
<html>
<head>
  <meta charset="<? bloginfo('charset') ?>">

  <link rel="pingback" href="<? bloginfo('pingback_url') ?>">

  <title><? wp_title('|', true, 'right') ?> <? bloginfo('name') ?></title>

  <link rel="stylesheet" type="text/css" href="<?= get_stylesheet_uri() ?>">

  <? wp_head() ?>
</head>

<body class="<?= is_user_logged_in() ? 'logged_in' : NULL ?>">
  <div class="container">
    <h1 class="logo"><a href="/">It's Just Karissa</a></h1>

    <div class="foliage"></div>
    <div class="birdy"></div>

    <div class="content">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div <?php post_class(); ?>>

          <div class="date"><?php the_time('dmY'); ?></div>

          <div class="post-content">
            <?php the_content('Read the rest of this entry &raquo;'); ?>
          </div>
        </div>
      <?php endwhile; ?>

        <div class="navigation">
          <?
            $older = get_adjacent_post(false, '', true);
            $newer = get_adjacent_post(false, '', false);
          ?>
          <? if(!empty($older)): ?>
            <a href="<?= get_permalink($older->ID); ?>" class="right">Older Entry</a>
          <? endif;if(!empty($newer)): ?>
            <a href="<?= get_permalink($newer->ID); ?>" class="left">Newer Entry</a>
          <? endif; ?>
        </div>

      <?php else: ?>
        <!-- No posts found -->
      <?php endif; ?>
    </div>

    <div id="buddha"></div>
  </div>

  <div id="bee"></div>
  <div class="banner"></div>

  <script type="text/javascript">
    // Bee mouse follow (not on touch devices)
    if(!('ontouchstart' in document.documentElement)) {
      document.onmousemove = function(e) {
        document.getElementById('bee').style.top = e.pageY*1 + 20 + 'px';
        document.getElementById('bee').style.left = e.pageX*1 + 10 + 'px';
      }
    }

    // Buddha levitate
    function buddha(element) {
      var direction = 1;
      var top = 0;

      function frame() {
        if(direction)
        {
          top++;
        }
        else
        {
          top--;
        }

        element.style.top = top + 'px';

        if(top == 30)
        {
          direction = 0;
        }
        if(top == 0)
        {
          direction = 1;
        }
      }

      var id = setInterval(frame, 75);
    }
    buddha(document.getElementById('buddha'));
  </script>

  <? wp_footer(); ?>
</body>
</html>