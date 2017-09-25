<?php

namespace Backpack\CRUD\Tests\Unit\CrudPanel;

use Illuminate\Support\Facades\DB;
use Backpack\CRUD\Tests\Unit\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CrudPanelDeleteTest extends BaseDBCrudPanelTest
{
    public function testDelete()
    {
        $this->markTestIncomplete('Not correctly implemented');

        $this->crudPanel->setModel(Article::class);
        $article = Article::find(1);

        $wasDeleted = $this->crudPanel->delete($article->id);

        // TODO: the delete method should not convert the returned result to a string
        $deletedArticle = Article::find(1);
        $this->assertTrue($wasDeleted);
        $this->assertNull($deletedArticle);
    }

    public function testDeleteUnknown()
    {
        $this->markTestIncomplete('Not correctly implemented');

        $this->setExpectedException(ModelNotFoundException::class);

        $this->crudPanel->setModel(Article::class);
        $unknownId = DB::getPdo()->lastInsertId() + 1;

        // TODO: if the delete method is called with an unknown id, it should return a model not found exception. change
        //       the find call inside the delete method to a findOrFail to avoid the error.
        $this->crudPanel->delete($unknownId);
    }
}