<?php

use Migrations\AbstractMigration;

class CreateArticlesTags extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles_tags');
        $table->addColumn('article_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('tag_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'article_id',
            'tag_id',
        ]);
        $table->addForeignKey('article_id', 'articles');
        $table->addForeignKey('tag_id', 'tags');
        $table->create();
    }
}
