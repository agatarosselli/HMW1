
function caricaContenuti(contenutoSuccessivo){
    for(let i of contenutoSuccessivo){ /*i sarà la mia persona */
        let content=document.createElement("div");
        content.setAttribute('class', 'content');
        
    
        let sinistra=document.createElement("div");
        sinistra.setAttribute('class', 'sinistra');
    
        let sopra=document.createElement("div");
        sopra.setAttribute('class', 'sopra');
        
        let unico=document.createElement("div");
        unico.setAttribute('class','unico');
        unico.appendChild(sopra);
    
        let preferito=document.createElement("a");
        preferito.setAttribute('class', 'bottonePref');/*tag a */
      
        let simbpref=document.createElement("img");/*immagine + */
        simbpref.src="img2/add-user.png";
        simbpref.setAttribute('class', 'simbpref');
        preferito.appendChild(simbpref);
    
    
        let circle=document.createElement("img"); /*logo palestra */
        circle.src="img2/circle.png";
    
        let titolo= document.createElement("h1"); /*nome persona*/ 
        let testo=document.createTextNode(i.name.first+' '+i.name.last);
            titolo.appendChild(testo);
            sinistra.appendChild(titolo);
      
        
        let bottCambio=document.createElement("a");
        let testobott=document.createTextNode("Show More");
        bottCambio.appendChild(testobott);
        bottCambio.setAttribute('class', 'bottCambio');
        bottCambio.addEventListener('click', mostraPiu);
    
        let descr=document.createElement("p");
        descr.setAttribute('class','hidden');
    
        let paragrafo=document.createTextNode('Data nascita: '+i.dob.date);
        descr.appendChild(paragrafo);
        
        
     
         preferito.addEventListener('click', sezionePreferiti);
         content.appendChild(preferito);
         
        sopra.appendChild(circle);
        
        content.appendChild(descr);
        content.appendChild(sinistra);
        content.appendChild(unico);
        sinistra.appendChild(preferito);
      
        sinistra.appendChild(descr);
        sinistra.appendChild(bottCambio);
        persone.appendChild(content);      
      }
    }
    
     
    function filtroRicerca(event){
    
    let filtro=event.currentTarget.value.toUpperCase(); 
    let elementiDaFiltrare=persone.querySelectorAll(".content");
    
    console.log(elementiDaFiltrare);
    
    for(let i of elementiDaFiltrare){ 
      let titolo2=i.querySelector("h1").textContent.toUpperCase(); 
    
      if(titolo2.indexOf(filtro)>-1){ 
        i.style.display="";
      }else{
        i.style.display="none";
      }
    }
    }
    
    const input=document.querySelector("#filtro");
    input.addEventListener("keyup", filtroRicerca);
    
    
    /*PREFERITI*/
    
    function sezionePreferiti(event){
      let tit=event.currentTarget.parentNode.querySelector("h1").textContent;
      console.log(tit);
    
      
      //let immagi=event.currentTarget.parentNode.parentNode.querySelector(".immagPersona").src;
      //console.log(immagi);
    
      let nuovElem=document.createElement("div");
      nuovElem.setAttribute('class', 'nuovElem');
    
      let pref=document.createElement("a");
      let immPref=document.createElement("img");
      immPref.src="img2/remove-user.png";
      pref.addEventListener('click',rimuoviPreferiti);
    
      let tit2=document.createElement("h1");
      let testo2=document.createTextNode(tit);
      tit2.appendChild(testo2);
    
     // let immag2=document.createElement("img");
      //immag2.setAttribute('src', immagi);
    
      tit2.appendChild(testo2);
    
      pref.appendChild(tit2);
      pref.appendChild(immPref);
    
    
      nuovElem.appendChild(pref);
      //nuovElem.appendChild(immag2);
      selez.appendChild(nuovElem);
    
     
      controllaNumElementi();
      
      let nome = tit.split(' ')[0]; //fino a li
      let cognome = tit.split(' ')[1];//successivo
      let data_nascita = event.currentTarget.parentNode.querySelector('p').textContent.split('Data nascita: ')[1];
      //console.log(event.currentTarget.parentNode.querySelector('p').textContent.split('Data nascita: ')[1]);
        event.currentTarget.removeEventListener("click",sezionePreferiti);

        //passo il valore delle variabili all'api
        //faccio una post alle api
        const formdata = new FormData(); //il form data passa i valori come post, ed è una tipologia di dato definito già da javascript
        formdata.append("nome", nome);
        formdata.append("cognome", cognome);
        formdata.append("data_nascita", data_nascita);
        fetch("allievi3.php", {method: "post",
        body: formdata}).then(onResponse).then(onJson2);
    }
    
    
    /*controlla numero di elementi*/
    function controllaNumElementi(){
      let tuttiDiv=selez.querySelectorAll(".nuovElem");
    
      if(tuttiDiv.length>0){
          nascondi.classList.remove("hidden");
        }else{
          nascondi.classList.add("hidden");
        }
    
    }
    
    /*Rimuovi preferiti */
    
    function rimuoviPreferiti(event){
      
      selez.removeChild(event.currentTarget.parentNode);
      
    
      let elementiDaFiltrare=persone.querySelectorAll(".content");
    
    
        let titPre=event.currentTarget.parentNode.querySelector("h1").textContent;
       
        let nome=titPre.split(' ')[0];
        let cognome=titPre.split(' ')[1];
       // let data_nascita = event.currentTarget.parentNode.querySelector('p').textContent.split('Data nascita: ')[1];
   // console.log(data_nascita);
        for(let i of elementiDaFiltrare){
            let titolo=i.querySelector("h1").textContent;
    
          if(titPre.indexOf(titolo)>-1){
            i.querySelector(".bottonePref").addEventListener('click',sezionePreferiti);
          }
    
      }
      controllaNumElementi();

      const formdata = new FormData();
      formdata.append("nome", nome);
      formdata.append("cognome", cognome);
      fetch("allievi5.php", {method: "post",
      body: formdata}).then(onResponse).then(onJson2);
      
    }
    
    
    /*Mostra di più*/
    function mostraPiu(event){
      
      let bottCambio=event.currentTarget.parentNode.querySelector(".bottCambio");
        let tasto=event.currentTarget.parentNode.querySelector("p");
    
           if(tasto.classList.contains("hidden")){
            tasto.classList.remove("hidden");
            bottCambio.textContent="Show Less";
           }else{
            tasto.classList.add("hidden");  
            bottCambio.textContent="Show More";
           }
    }
    
    
      const selez=document.querySelector(".selezionati");
      const nascondi=document.querySelector("#sezione0");
      const persone= document.querySelector(".persone");
    
      
    
 /**-------------------------------------------------------------------------api-------------------------------------------------------------- */
      
    function onJson(json){
        console.log(json);
        caricaContenuti(json.results); 
      }

      function onJson2(json){
       // console.log(json);//mi stamperà solo il json, per quanto riguarda l'aggiunta ai preferiti
       
      }
    
      function onResponse(response) {
        return response.json();
      }
    

      fetch('allievi2.php').then(onResponse).then(onJson);
      
      
      