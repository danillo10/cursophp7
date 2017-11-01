<?php 

// class Pessoa {
// 	public $nome;

// 	public function falar(){
// 		return "O meu nome é " . $this->nome;
// 	}
// }

// $danillo = new Pessoa();
// $danillo->nome = "Danillo Leão Lopes";
// echo $danillo->falar();
// echo "<br>";


class Carro {
	private $modelo;
	private $motor;
	private $ano;

	public function getModelo(){

		return $this->modelo;

	}

	public function setModelo($modelo){

		$this->modelo = $modelo;

	}

	public function getMotor():float{

		return $this->motor;

	}

	public function setMotor($motor){

		$this->motor = $motor;

	}

	public function getAno():int{

		return $this->ano;

	}

	public function setAno($ano){

		$this->ano = $ano;

	}

	public function exibir(){
		return array(
			'modelo' => $this->getModelo(),
			'motor' => $this->getMotor(),
			'ano' => $this->getAno() 
		);
	}
}

$gol = new Carro();
$gol->setModelo("Gol GT");
$gol->setMotor("1.6");
$gol->setAno("2017");
print_r($gol->exibir());
echo "<br>";

class Documento{

	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$resultado = Documento::validaCPF($numero);
		if($resultado == false){
			throw new Exception("CPF informado não é válido!", 1);
		}
		$this->numero = $numero;
	}

	public static function validaCPF($cpf){
		if(empty($cpf)) {
        	return false;
    	}
 
	    $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

	    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	     
	    
	    if (strlen($cpf) != 11) {
	        echo "length";
	        return false;
	    }
	    
	    else if ($cpf == '00000000000' || 
	        $cpf == '11111111111' || 
	        $cpf == '22222222222' || 
	        $cpf == '33333333333' || 
	        $cpf == '44444444444' || 
	        $cpf == '55555555555' || 
	        $cpf == '66666666666' || 
	        $cpf == '77777777777' || 
	        $cpf == '88888888888' || 
	        $cpf == '99999999999') {
	        return false;

	     } else {   
	         
	        for ($t = 9; $t < 11; $t++) {
	             
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	            $d = ((10 * $d) % 11) % 10;
	            if ($cpf{$c} != $d) {
	                return false;
	            }
	        }
	 
	        return true;
	    }
	}
}

$cpf = new Documento();
$cpf->setNumero("60052076369");
echo $cpf->getNumero();
echo "<br>";


class Endereco {
	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a, $b, $c){
		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;	
	}

	public function __destruct(){
		//var_dump("Destruir");
	}

	public function __toString(){
		return $this->logradouro . ", " . $this->numero . ", " . $this->cidade . "<br>";
	}
}

$meuEndereco = new Endereco("Rua Claudino", "23", "Açailandia");
echo $meuEndereco;

class Pessoa {
	public $nome = "Rasmus Lerdorf";
	protected $idade = 48;
	private $senha = "123456";

	public function verDados(){
		echo $this->nome . "<br>";
		echo $this->idade . "<br>";
		echo $this->senha . "<br>";
	}
}

// $objeto = new Pessoa();
// echo $objeto->nome;
// $objeto->verDados();

class Programador extends Pessoa {

	public function verDados(){
		echo $this->nome . "<br>";
		echo $this->idade . "<br>";
		// echo $this->senha . "<br>";
	}
}

$objeto = new Programador();
$objeto->verDados();

class DocumentoO {
	
	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($n){
		$this->numero = $n;
	}
}

class CPF extends DocumentoO {

	public function validar():bool{
		// Validação CPF
		$numeroCPF = $this->getNumero();
		return true;
	}
}

$doc = new CPF();
$doc->setNumero("60052076369");
var_dump($doc->validar());
echo "<br>";

interface Veiculo {

	public function acelerar($velocidade);
	public function freiar($velocidade);
	public function trocarMarcha($marcha);

}

class Civic implements Veiculo {
	public function acelerar($velocidade){
		echo "O veículo acelerou até " . $velocidade . " km/h";
	}

	public function freiar($velocidade){
		echo "O veículo frenou até " . $velocidade . " km/h";
	}

	public function trocarMarcha($marcha){	
		echo "O veículo engatou a marcha " . $marcha;
	}
}

$carro = new Civic();
$carro->acelerar("180");
echo "<br>";
$carro->freiar("20");
echo "<br>";
$carro->trocarMarcha(1);
echo "<br>";


abstract class Automovel implements Veiculo {
	public function acelerar($velocidade){
		echo "O veículo acelerou até " . $velocidade . " km/h";
	}

	public function freiar($velocidade){
		echo "O veículo frenou até " . $velocidade . " km/h";
	}

	public function trocarMarcha($marcha){	
		echo "O veículo engatou a marcha " . $marcha;
	}
}


class DelRey extends Automovel {
	public function empurrar(){

	}
}

$carro = new DelRey();
$carro->acelerar(200);

abstract class Animal {
	public function falar(){
		return "AUUUUU";
	}

	public function mover(){
		return "anda";
	}
}

class Cachorro extends Animal {
	public function falar(){
		return "Late";
	}
}

class Gato extends Animal {
	public function falar(){
		return "Mia";
	}
}

class Passaro extends Animal {
	public function falar(){
		return "Canta";
	}

	public function mover(){
		return "Voa e " . parent::mover();
	}
}

$pluto = new Cachorro();
echo "<br>" . $pluto->falar();
echo "<br>" . $pluto->mover();

echo "<br>---------------------";

$garfield = new Gato();
echo "<br>" . $garfield->mover();
echo "<br>" . $garfield->falar();

echo "<br>---------------------";

$picapau = new Passaro();
echo "<br>" . $picapau->mover();
echo "<br>" . $picapau->falar();

?>