<?php if (empty($items) && $group_id === null): ?>
    <p class="alert alert-info"><?php echo t('No bookmark') ?></p>
<?php else: ?>
    <?php echo Miniflux\Template\load('search_form') ?>
    <div class="page-header">
        <h2 class="mobiletitle"><?php echo t('Miniflux - Bookmarks') ?><span id="page-counter"><?php echo isset($nb_items) ? $nb_items : '' ?></span></h2>
        <?php if (!empty($groups)): ?>
        <nav>
            <ul id="grouplist">
                <?php foreach ($groups as $group): ?>
                <li  <?php echo $group['id'] == $group_id ? 'class="active"' : '' ?>>
                    <a href="?action=bookmarks&group_id=<?php echo$group['id']?>"><?php echo$group['title']?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <?php endif ?>

    </div>

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/mobilehide.js"></script>


    <?php if ($nothing_to_read): ?>
        <p class="alert alert-info"><?php echo t('There is nothing new to read, enjoy your favorites articles!') ?></p>
    <?php endif ?>

    <section class="items" id="listing">
        <?php foreach ($items as $item): ?>
            <?php echo Miniflux\Template\load('item', array(
                'item' => $item,
                'menu' => $menu,
                'offset' => $offset,
                'hide' => false,
                'display_mode' => $display_mode,
                'item_title_link' => $item_title_link,
                'favicons' => $favicons,
                'original_marks_read' => $original_marks_read,
            )) ?>
        <?php endforeach ?>

        <?php echo Miniflux\Template\load('paging', array('menu' => $menu, 'nb_items' => $nb_items, 'items_per_page' => $items_per_page, 'offset' => $offset, 'order' => $order, 'direction' => $direction, 'group_id' => $group_id)) ?>
    </section>
<?php endif ?>
