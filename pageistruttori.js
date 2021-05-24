function caricaContenuti(schedaIstruttore){
  scheda.innerHTML='';
    for(let i of schedaIstruttore){ 

        let singoloIstr=document.createElement("div");
        singoloIstr.setAttribute('class', 'singoloIstr');
       
        
        let intestazione=document.createElement("div");
        intestazione.setAttribute('class', 'intestazione');
         singoloIstr.appendChild(intestazione);
       

        let divfoto=document.createElement("div");
        divfoto.setAttribute('class', 'divfoto');
         intestazione.appendChild(divfoto);

        let imgIstruttore=document.createElement('img');
        imgIstruttore.src=i.foto_profilo;
        divfoto.appendChild(imgIstruttore);

        let nomeCognome=document.createElement('h1');
        nomeCognome.setAttribute('class', 'nomeCognome');
        testo=document.createTextNode(i.nome+' '+i.cognome);
        nomeCognome.appendChild(testo);
        intestazione.appendChild(nomeCognome);

        let divParag=document.createElement('div');
        divParag.setAttribute('class', 'divParag');
        singoloIstr.appendChild(divParag);
        let divParag2=document.createElement('div');
        divParag2.setAttribute('class', 'paragrafo2');
        divParag2.classList.add('hidden');
        divParag.appendChild(divParag2);
            
        let bottCambio2=document.createElement("a");
        let testobott=document.createTextNode("Show More");
        bottCambio2.appendChild(testobott);
        bottCambio2.setAttribute('class', 'bottCambio2');
        bottCambio2.addEventListener('click', mostraPiu);
        divParag.appendChild(bottCambio2);

  
        let sottotitolo=document.createElement('h2');
        testo2=document.createTextNode('Qualifiche Autodifesa:');
        sottotitolo.setAttribute('class', 'titoliqual');
        sottotitolo.appendChild(testo2);
        divParag2.appendChild(sottotitolo);

        
        for(let c of i.autodifesa){
  
        let autodifesa = document.createElement('h3');
        testoAutodifesa=document.createTextNode(c.nome_qual_aut);
        autodifesa.appendChild(testoAutodifesa);
      
        divParag2.appendChild(autodifesa);
        }

        let sottotitolo1=document.createElement('h2');
        testo3=document.createTextNode('Qualifiche Combattimento:');
        sottotitolo1.setAttribute('class', 'titoliqual');
     
    
        sottotitolo1.appendChild(testo3);
        divParag2.appendChild(sottotitolo1);

        for(let d of i.combattimento){
       

        let combattimento = document.createElement('h3');
        testoCombattimento=document.createTextNode(d.nome_qual_comb);

        combattimento.appendChild(testoCombattimento);
        divParag2.appendChild(combattimento);
        }

        let sottotitolo2=document.createElement('h2');
        testo4=document.createTextNode('Corsi tenuti:');
        sottotitolo2.setAttribute('class', 'titoliqual');


        sottotitolo2.appendChild(testo4);
        divParag2.appendChild(sottotitolo2);

        for(let e of i.corsi){
       

        let nomeCorso = document.createElement('h3');
     
        testonomeCorso=document.createTextNode(e.nome_corso);
        nomeCorso.appendChild(testonomeCorso);
        divParag2.appendChild(nomeCorso);
      }
        

        scheda.appendChild(singoloIstr);
      }
    }

    function mostraPiu(event){
  
      let bottCambio2=event.currentTarget.parentNode.querySelector(".bottCambio2");
     
        let tasto=event.currentTarget.parentNode.querySelector("div");
    
           if(tasto.classList.contains("hidden")){
            tasto.classList.remove("hidden");
            bottCambio2.textContent="Show Less";
           }else{
            tasto.classList.add("hidden");  
            bottCambio2.textContent="Show More";
           }
    }
    
     

  
  const input=document.querySelector("#filtro");
  


  function validazione(event){
    
    event.preventDefault();
    let ingresso =document.querySelector('#filtro').value;
    fetch("ricerca2.php?q="+ingresso).then(onResponse).then(onJson3);
   /* if(form.cerca.value.lenght == 0)
        { 
         
          alert("Digita il nome e il cognome dell'istruttore da ricercare.");
         
       
        }*/
  }

  const form = document.forms['form_istr'];
  form.addEventListener('submit', validazione);


  function onJson3(json){
    console.log(json);
    caricaContenuti(json);;
  }
  
  
    function onJson(json){
        console.log(json);
        caricaContenuti(json); 
      }
    
    function onResponse(response) {
        return response.json();
      }
    
      fetch('pageistruttori.php').then(onResponse).then(onJson);  
      
      const scheda = document.querySelector('.scheda');