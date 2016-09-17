<?php

use yii\db\Migration;

class m160917_082100_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(1),
            'title' => $this->string(64)->notNull(),
        ]);

        $this->addForeignKey('parent_fk', 'categories', 'parent_id', 'categories', 'id', 'CASCADE');

        $this->createTable('items', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string(128)->notNull(),
        ]);
        $this->addForeignKey('category_fk', 'items', 'category_id', 'categories', 'id', 'CASCADE');

        // Add some initial data
        $this->insert('categories', ['id' => 1, 'title' => 'Каталог продукции']);
        $this->insert('categories', ['title' => 'Мясо и птица']);
        $this->insert('categories', ['title' => 'Хлебобулочные изделия']);
        $this->insert('categories', ['title' => 'Напитки, соки']);
        $this->insert('categories', ['title' => 'Чай, кофе, какао']);
        $this->insert('categories', ['parent_id' => 2, 'title' => 'Птица']);
        $this->insert('categories', ['parent_id' => 2, 'title' => 'Мясо']);

        $this->insert('items', ['category_id' => 6, 'title' => 'Бедро цыпленка']);
        $this->insert('items', ['category_id' => 6, 'title' => 'Стейк из грудки индейки']);
        $this->insert('items', ['category_id' => 7, 'title' => 'Свинина карбонад']);
        $this->insert('items', ['category_id' => 7, 'title' => 'Говядина для фарша']);
        $this->insert('items', ['category_id' => 7, 'title' => 'Гаучо стейк из аргентинской мраморной говядины']);
    }

    public function safeDown()
    {
        $this->dropTable('items');
        $this->dropTable('categories');
    }
}
