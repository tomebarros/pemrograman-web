var snow_fall_rate = 5 //decrease for faster fall speed
function snow() {  
  var b = document.createElement('div')
  var size = (Math.random()*10) + 5
  b.className = 'flake'
  b.style.width = size + 'px'
  b.style.height = size + 'px'
  b.style.position = 'fixed'
  b.style.zIndex = '9999'
  b.style.left = Math.random()*window.innerWidth + 'px'
  b.style.top = '-20px'
  b.style.borderRadius = '50%'
  b.style.background = 'white' 
  b.style.opacity = '.5' 
  b.style.filter = Math.random() < .5 ? 'blur(3px)' : 'blur(1px)'
  b.style.transition = Math.random < .5 ? snow_fall_rate*.75 + 's' : snow_fall_rate + 's'
  b.style.transitionTimingFunction = 'ease-in'
  document.body.appendChild(b)
 
  setTimeout(function(){
    var flakes = document.querySelectorAll('.flake')
    var flake = flakes[flakes.length - 1]  
    var flake_loc = flake.getBoundingClientRect()
    flake.style.top = '105%'
    flake.style.left = Math.random() < .5 ? flake_loc.left - 150 + 'px' : flake_loc.left + 150 + 'px'
  },10)  
 
  var flakes = document.getElementsByClassName('flake')
  for(var i=0;i<flakes.length;i++){
    if(flakes[i].getBoundingClientRect().top > window.innerHeight) {
      flakes[i].remove()
    }      
  }
  setTimeout(function(){ snow() },200)
}
snow()