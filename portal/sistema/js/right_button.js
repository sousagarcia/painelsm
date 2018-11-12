				function showmenuie5(e){
				//Pega a posição do frame clicado
					var rightedge = document.body.clientWidth - event.clientX;
					var bottomedge = document.body.clientHeight - event.clientY;
						
						if (rightedge < ie5menu.offsetWidth)
							ie5menu.style.left = document.body.scrollLeft + event.clientX - ie5menu.offsetWidth;

						else
							ie5menu.style.left=document.body.scrollLeft + event.clientX;
						
						if (bottomedge < ie5menu.offsetHeight)
							ie5menu.style.top = document.body.scrollTop + event.clientY - ie5menu.offsetHeight;
						
						//Ao clicar, torna o menu visível. 
						else
							ie5menu.style.top = document.body.scrollTop + event.clientY;
							ie5menu.style.visibility = "visible";
						
						//Pega o id do elemento selecionado.
						//var pegaElemento = e.target.id;
						//alert(pegaElemento);
						
  $('table').on('click', 'td', function(e){
   $(this).closest('tr').remove()
  })
						
						return false;
				}
				
				//Apagar os filhos da table em si
				function clique(e){
				var tbl = document.getElementById("adminlist");
					if(e.target.id == "deletar" && tbl != null){
		
							for(var i = 0; i < tbl.rows.length; i++) {
								tbl.rows[i].onclick = function () { getval(this); };
							}
						
						function getval(row){
							var apaga = confirm("Tem certeza que deseja excluir este equipamento ?");
								if(apaga == true){
									removerConteudo(row);
								} 
						}
					}
				}
				
				//Esconde o menu
				function hidemenuie5(){
					ie5menu.style.visibility = "hidden";
				}
				
				
				function highlightie5(){
					if (event.srcElement.className == "menuitems"){
						event.srcElement.style.backgroundColor = "";
 
					// cor ao passar o mouse
					event.srcElement.style.color = "#fff";

					if (display_url == 1) {
						window.status = event.srcElement.url;
					}
					}
				}
				//
				function lowlightie5(){
					if (event.srcElement.className == "menuitems"){
						event.srcElement.style.backgroundColor = "";
						event.srcElement.style.color = "#555";
						window.status = '';
					}
				}

//Remove o conteúdo da estrutura escolhida(topo, rodapé etc) caso possua.
function removerConteudo(estrutura) {
	while(estrutura.hasChildNodes()) {
	   	estrutura.removeChild(estrutura.childNodes[0]);
	}		

	estrutura.style.backgroundColor = "#FFF";
}
