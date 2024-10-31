const cientists = [
  {
    name: 'Ada',
    surname: 'Lovelace',
    wiki: 'https://pt.wikipedia.org/wiki/Ada_Lovelace',
    imageUrl:
      'https://upload.wikimedia.org/wikipedia/commons/0/0f/Ada_lovelace.jpg',
    imageSize: 100,
  },
  {
    name: 'Albert',
    surname: 'Einstein',
    wiki: 'https://pt.wikipedia.org/wiki/Albert_Einstein',
    imageUrl:
      'https://upload.wikimedia.org/wikipedia/commons/7/75/Einstein1921_by_F_Schmutzer_3.jpg',
    imageSize: 100,
  },
];

return (
  <>
    {/* {show && <AdaClass />} */}
    {/* {show && <Ada />} */}
    {show &&
      cientists.map((cientist) => {
        <Cientist
          name={cientist.name}
          surname={cientist.surname}
          wiki={cientist.wiki}
          imageUrl={cientist.imageUrl}
          imageSize={cientist.imageSize}
        />;
      })}