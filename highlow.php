<?php


$isInput = false;

if ($argc == 3) {
	
	$minNum = (int)$argv[1];
	$maxNum = (int)$argv[2];
	
	if ($minNum < $maxNum) {
		
		$isInput = true;

	}
}


if ($isInput) {

	do {

	$keepPlay = true;
	$randoNum = mt_rand($minNum,$maxNum);
	$keepGuess = true;
	$guesses = 0;

	fwrite(STDOUT, "Guess an integer between $minNum and $maxNum genius \n");
		
		do {
			
			$guessNum = fgets(STDIN);
			$guessNum = (int) trim($guessNum);
			++$guesses;

			fwrite(STDOUT, "You guessed $guessNum \n");

			if (is_int($guessNum)) {
				
				if ($guessNum < $randoNum) {
					
					fwrite(STDOUT, "too low my little snow pony! guess higher HIGHER!\n");
					fwrite(STDOUT, "you have made $guesses guesses \n");

				} else if ($guessNum > $randoNum) {

					fwrite(STDOUT, "that's not the number. you are high\n");
					fwrite(STDOUT, "you have made $guesses guesses \n");

				} else {

					$keepGuess = false;

					fwrite(STDOUT, "you are my sun shine,\nyour guess is super fine.\nthat is my number,\nyou can guess it anytime.\nyou won the game friend,\nplayed it out till the end.\nthank you for makeing my sunshiney day.\n");

					fwrite(STDOUT, "\nwanna play again? (y/n)\n");
					
					do {
						
						$keepPlay = fgets(STDIN);
						$keepPlay = trim($keepPlay);

						if ($keepPlay == "y") {

							fwrite(STDOUT, "okay here we go...\n");
							$keepPlay = true;

						} else if ($keepPlay == "n"){

							fwrite(STDOUT, "keep the change you filthy animal\n");
							$keepPlay = false;

						} else {

							fwrite(STDOUT, "please give a valid answer\n");

						}

					} while (!is_bool($keepPlay));
				}
			} else {

				fwrite(STDOUT, "sorry that's not an integer my friend\n please input an integer between 1 and 100\n");
				fwrite(STDOUT, "you have made $guesses guesses \n");
			}

		} while ($keepGuess);

	} while ($keepPlay);
	
} else {
	
	exit ( "unable to open $argv[0] \nYou must pass a min and max number in that order (highlow.php min max) to play the game\n" );

}



