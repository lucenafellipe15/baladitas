<?php
	class Validacao{
		private $dados; //responsavel por guardar o nome que será validado
		private $erro = array();//responsavel por guardar a mensagem de erro
		
		//passa o nome do campo e o seu valor
		public function set($valor, $nome){
			$this->dados = array("valor" =>trim($valor), "nome" =>$nome);
			return $this;
		}
		public function obrigatorio(){
			if(empty($this->dados['valor'])){
				$this->erro[] = sprintf("O campo %s é obrigatório",$this->dados['nome']);
			}
			return $this;
		}
		public function email(){
			if(!filter_var($this->dados['valor'],FILTER_VALIDATE_EMAIL)){
				$this->erro[] = sprintf("Campo %s no formato invalido",$this->dados['nome']);
			}
			return $this;
		}
		public function data(){
			//formato será esse 99-99-9999
			if(!preg_match("/^[0-9{2}]\-[0-9]{2}\-[0-9]{4}$/", $this->dados['valor']))
			{
				$this->erro[] = sprintf("O campo %s so aceita no formato 99-99-9999",$this->dados['nome']);
			}
			return $this;
		}
		public function tel(){
			//(99) 9999-9999
			if(!preg_match("/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/",$this->dados['valor']))
			{
				$this->erro[] = sprintf("O campo %s so aceita o formato (99) 9999-9999",$this->dados['nome']);
			}
			return $this;
		}
	
		public function validar(){
			if (count($this->erro) > 0 ){
				return false;
			}else{
				return true;
			}
		}
		public function getErros(){
			return $this->erro;
		}
	}
?>