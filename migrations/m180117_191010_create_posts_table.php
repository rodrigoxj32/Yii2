<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180117_191010_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'titulo' => $this->string()->notNull(),
            'contenido' => $this->text()->notNull()
            
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
