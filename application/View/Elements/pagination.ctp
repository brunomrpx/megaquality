<div class="text-center">
    <ul class="pagination">
        <?php
            echo $this->Paginator->prev('&laquo;',
                                        array('tag' => 'li',
                                              'title' => __('Previous page'),
                                              'disabledTag' => 'span',
                                              'escape' => false),
                                        null,
                                        array('tag' => 'li',
                                              'disabledTag' => 'span',
                                              'escape' => false,
                                              'class' => 'disabled'));

            echo $this->Paginator->numbers(array('separator' => false,
                                                 'tag' => 'li',
                                                 'currentTag' => 'span',
                                                 'currentClass' => 'active'));

            echo $this->Paginator->next('&raquo;',
                                        array('tag' => 'li',
                                              'disabledTag' => 'span',
                                              'title' => __('Next page'),
                                              'escape' => false),
                                         null,
                                         array('tag' => 'li',
                                               'disabledTag' => 'span',
                                               'escape' => false,
                                               'class' => 'disabled'));
        ?>
    </ul>
</div>
