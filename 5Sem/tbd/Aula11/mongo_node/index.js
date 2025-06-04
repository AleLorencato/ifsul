import mongodb from 'mongodb'
const { MongoClient } = mongodb

const mongo = new MongoClient('mongodb://localhost:27017')

let database = mongo.db('teste')

let documents = database.collection('empregos.empregosti')

const result = await documents.find({}).toArray((err, docs) => {
  if (err) {
    console.error('Error fetching documents:', err)
    return
  }
  console.log('Documents:', docs)
})

console.log('Result:', result)
