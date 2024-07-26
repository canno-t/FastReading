const interval = setInterval(function (){
    let date = new Date();
    let time = document.getElementById('timer');
    let seconds = time.innerText.split(':');
    if(seconds.length == 2){
        seconds = (parseInt(seconds[0], 10)*60)+parseInt(seconds[1], 10)
    }
    if(seconds<=0){
        Array.from(document.getElementsByClassName('first-stage')).forEach((element)=>{
           element.style.display = 'none';
        });
        document.getElementById('second-stage').style.display = 'block';
        clearInterval(interval);
    }
    seconds--;
    let min = Math.floor(seconds/60);
    let sec = seconds-(min*60);
    if(sec<10){
        time.innerText = min+':0'+sec;
        if( min===0){
            time.style.color = 'red';
        }
    }
    else{
        time.innerText = min+':'+sec;
        time.style.color = 'black';
    }

}, 1000);
document.getElementById('form').onsubmit = (event) =>{
    event.preventDefault();
    let html = document.getElementById('response-card');
    let form = document.getElementById('form');
    let formData = new FormData(form);
    let csrf = document.getElementById('_token').content;
    const url = "http://localhost/chat";
    try {
        fetch(url, {
            method:'POST',
            body:formData,
            headers:{
                'X-CSRF-TOKEN':csrf
            }
        }).then(response=>{
            return response.text();
        }).then(data=>{
           html.innerHTML = data
        }).then(function (){
            document.getElementById('second-stage').style.display = 'none';
            document.getElementById('third-stage').style.display = 'block';
            let bar = document.getElementById('progress-chart');
            let percent = document.getElementById('resoult').innerText.split('%')[0];
            bar.animate([
                {width:0+'%'},
                {width:percent+'%'}
            ],
                {
                    duration: 2000,
                    fill:'forwards'
                });
            console.log(document.getElementById('resoult'))
        });
    } catch (error) {
        console.error(error.message);
    }
}
