<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ocomon - Chat Suporte</title>
		<link type="text/css" rel="stylesheet" href="<?= ARQUIVOS ?>bootstrap/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="<?= ARQUIVOS ?>style.css" />
	</head>
	<body>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Suporte ao Usuário</h3>
				</div>
				<div class="panel-body" id="chatbox">
				</div>
				<form name="message" action="" id="frmChat">  
		            <div class="input-group">
						<input name="usermsg" type="text" id="usermsg" class="form-control" placeholder="Chat!" />  
						<span class="input-group-btn">
							<input class="btn btn-default" type="submit" value="Enviar" />  
						</span>
					</div>		            
		        </form>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>  

	<script type="text/javascript">
		loadChat();
		$("#frmChat").submit(function(e){ 
            e.preventDefault();

            var clientmsg = $("#usermsg").val();  
            $("#usermsg").attr("value", ""); 

            <?php $postpage = site_url("chat/postar"); ?>
            $.ajax({
                type: "POST",
                url: "<?= $postpage ?>",
                data: { mensagem: clientmsg }
            }); 
            loadChat();                
        });

        function loadChat(){
        	<?php $chatlist = site_url("chat/mensagens"); ?>

            var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            $.ajax({  
                url: "<?= $chatlist ?>",  
                cache: false,  
                success: function(html){          
                    $("#chatbox").html(html);
                    
                    var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                    if(newscrollHeight > oldscrollHeight){  
                        $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
                    }
                }  
            });  
        }
        setInterval (loadChat, 2500);
	</script>
</html>