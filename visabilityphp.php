<?php
	class visability {
		public $fish = 'Salmon';
		public $frog = 'Poison Dart Frog';
		public $burb = 'DUCK BOI';
		public function set_fish($animal) {
			$this->fish = $animal;
			if(isset($animal)) echo '<br/>' . $animal;
		}
		public function set_frog($animal) {
			$this->frog = $animal;
			if(isset($animal)) echo '<br/>' . $animal;
		}
		public function set_burb($animal) {
			if(isset($animal)) echo '<br/>' . 'HOW DARE YOU TRY TO CHANGE MY DUCK!';
			
		}
	}
	$class = new visability;
	$class->set_fish('Macril');
	$class->set_frog('Wood Frog');
	$class->set_burb('Seagul');
	unset($class);
?>