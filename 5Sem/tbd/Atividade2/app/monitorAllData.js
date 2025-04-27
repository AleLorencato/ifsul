import  * as fb from "firebase/database";// sera preciso usar fb antes de cada funcao
import { dbConnect } from "./connetToFB.js";

dbConnect()
.then(db=>{//db contem a referencia ao banco
    console.log(db)//mostra informacoes da conexao(pode excluir)
    const dbRef = fb.ref(db, 'produtos')
    fb.onValue(dbRef, (snapshot) => {
        if (snapshot.exists()) {
            console.log(snapshot.val())
        } else {
            console.log('Não há dados disponíveis')
        }
    }, { onlyOnce: false })
}).catch(err=>console.log(err))
