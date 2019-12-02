<?php if (count($transactions) > 0) : ?>
    <div class="error">
        <?php foreach ($transactions as $transaction) : ?>
            <p><?php echo $transaction ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>