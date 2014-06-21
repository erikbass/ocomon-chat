<?php

	foreach ($mensagens as $mensagem) {
		echo "
			<div class='chat-line bs-callout'>
				$mensagem->mensagem
				<span>$mensagem->data</span>
			</div>";
	}

?>