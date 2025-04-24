// run `node index.js` in the terminal

import { initializeApp } from "firebase/app";
import { getDatabase, set, ref, push} from "firebase/database"
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getDatabase();

let newUserID = 1
let refNode = ref(db,`users/${newUserID}`);
let newUserData = {email: "fulano@ifsul.edu.br", username: "fulano"};
set(refNode,newUserData);


const newUser ={
  email:"beltrano@ifsul.edu.br",
  username: "beltrano"
}
push(ref(db,'users/'),newUser);
console.log(`Hello Node.js v${process.versions.node}!`);
process.exit()

