
const inscription = document.querySelector('a #inscription')
console.log(inscription)
inscription.addEventListener('click',
    (e)=>{
        e.preventDefault()
        e.stopPropagation()
        alert("Un mail vous a été envoyé à votre adresse email")
    }
)