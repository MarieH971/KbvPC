import React from 'react';



const Actualites = () => {
  return (
    <div>
      <h1>Actualités</h1>

      <p>Tous nos évènements pour la saison 2024/2025</p>


      <img src="/assets/images/0610Web.jpg" alt="" width="350" height="550"/>
      <img src="/assets/images/0311Web.jpg" alt="" width="350" height="550"/>
      <img src="/assets/images/0112Web.jpg" alt="" width="350" height="550"/>
      <img src="/assets/images/1901Web.jpg" alt="" width="350" height="550"/>
      <img src="/assets/images/0903Web.jpg" alt="" width="350" height="550"/>


      {/* Tu peux ajouter ici le contenu de tes actualités */}
      <div>
        <h3>Bientôt la fin du championnat !</h3>
        <h3>Qui disputera les play-off cette année ?</h3>

        <p>Les équipes sont dans la dernière ligne droite...</p>
      </div>
    </div>
  );
};

export default Actualites;
