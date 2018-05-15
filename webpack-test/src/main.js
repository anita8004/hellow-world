import { person } from './person'
import './main.css'
const myDiv = document.getElementById('div1')
myDiv.innerHTML = `<h2>${person.firstName} ${person.lastName}</h2>`