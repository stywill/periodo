<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
   use RefreshDatabase;
    /**
     * @var Serie
     */
   private $serie;
   protected function setUp(): void
   {
       parent::setUp();
       $criadorDeSerie = new CriadorDeSerie();
       $this->serie = $criadorDeSerie->criarSerie('Nome da serie',1,1);
   }

    public function testRemoverSerie()
    {
        $this->assertDatabaseHas('series',['id'=>$this->serie->id]);
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removeSerie($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da serie', $this->serie->nome);
        $this->assertDatabaseMissing('series',['id'=>$this->serie->id]);
    }
}
