<?php

class Pokemon {
    public $nome;
    public $tipo;
    public $experiencia;
    public $hp;
    public $ataque;
    public $defesa;
    public $velocidade;
    public $nivel;

    public function aumentarNivel() {
        $this->nivel++;
        $this->ataque += 2;
        $this->defesa += 1;
        $this->velocidade += 1;
        $this->hp += 5;
    }

    public function ganharExperiencia($xp) {
        $this->experiencia += $xp;
    }

    public function curar($quantidade) {
        $this->hp += $quantidade;
    }

    public function batalhar($oponente) {
        $dano = max(1, $this->ataque - intval($oponente->defesa / 2));
        $oponente->hp = max(0, $oponente->hp - $dano);
    }

    public function exibirDados() {
        echo "Nome: {$this->nome}\n";
        echo "Tipo: {$this->tipo}\n";
        echo "Nível: {$this->nivel}\n";
        echo "Experiência: {$this->experiencia}\n";
        echo "HP: {$this->hp}\n";
        echo "Ataque: {$this->ataque}\n";
        echo "Defesa: {$this->defesa}\n";
        echo "Velocidade: {$this->velocidade}\n";
        echo "--------------------------\n";
    }
}

$pikachu = new Pokemon();
$pikachu->nome = "Pikachu";
$pikachu->tipo = "Elétrico";
$pikachu->experiencia = 0;
$pikachu->hp = 35;
$pikachu->ataque = 55;
$pikachu->defesa = 40;
$pikachu->velocidade = 90;
$pikachu->nivel = 1;

$charizard = new Pokemon();
$charizard->nome = "Charizard";
$charizard->tipo = "Fogo/Voador";
$charizard->experiencia = 0;
$charizard->hp = 78;
$charizard->ataque = 84;
$charizard->defesa = 78;
$charizard->velocidade = 100;
$charizard->nivel = 1;

$pikachu->ganharExperiencia(100);
$charizard->ganharExperiencia(120);

$pikachu->aumentarNivel();
$charizard->aumentarNivel();

$pikachu->batalhar($charizard);
$charizard->batalhar($pikachu);

$pikachu->curar(15);
$charizard->curar(10);

echo "Dados de Pikachu:\n";
$pikachu->exibirDados();

echo "Dados de Charizard:\n";
$charizard->exibirDados();

?>