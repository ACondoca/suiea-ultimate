/*====================
		Efeito Digitação JS
	======================*/
function writeEfect(el, txt, speed){

    const char = txt.split("").reverse();
    const typer = setInterval(() =>{
      if(!char.length){
        return clearInterval(typer);
      }
      speed = Math.floor(Math.random()*1000);
      const next = char.pop();
      el.innerHTML += next;
    }, speed);
  }

  var el = document.querySelector("#writeEfect");
  var speed = 100;
  const txt = "Sistema Unificado de Inscrições Escolares de Angola - SUIEA.";

  writeEfect(el, txt, speed);