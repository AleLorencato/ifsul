import { initializeApp } from 'firebase/app'
import { firebaseConfig } from './firebaseConfig'
import { getFirestore } from 'firebase/firestore'

import firebase from 'firebase/compat/app'
import 'firebase/compat/firestore'
import 'firebase/compat/auth'

export const firebaseApp = firebase.initializeApp(firebaseConfig)

export const db = firebaseApp.firestore()
