<?php

	foreach ($mensagens as $mensagem) {
		$sender = "";
		if($mensagem->from == 1){
			$sender = "-sender";
		}
		echo "
			<div class='chat-line chat-msg$sender'>
				$mensagem->mensagem
				<span>$mensagem->data</span>
			</div>";
	}

?>