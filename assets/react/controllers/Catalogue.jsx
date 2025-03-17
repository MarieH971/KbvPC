import React from 'react';
import '../../styles/catalog.css'

const Catalogue = () => {
  // Tableau d'articles
  const articles = [
    { id: 1, name: 'Short Azura', image: 'build/images/BKShortsWeb.jpg', description: 'Design moderne et fonctionnel - Tissu technique à séchage rapide' },
    { id: 2, name: 'Brassière Horizon', image: 'build/images/BrassiereBleueWeb.jpg', description: 'Confortable et performant - Tissu respirant à séchage rapide' },
    { id: 3, name: 'Brassière Pop', image: 'build/images/BrassiereMultiWeb.jpg', description: 'Design minimaliste avec un maintien maximal - Dos ouvert pour un bronzage parfait' },
    { id: 4, name: 'Short Gwada', image: 'build/images/ShortsMultiWeb.jpg', description: 'Maille intégrée pour le nettoyage des mains - Coupe ergonomique pour une liberté de mouvement maximale' },
    // Ajoute plus d'articles ici si nécessaire
  ];

  return (
    <div className="catalogue-container">
      <h1>Catalogue d'articles</h1>
      <div className="catalogue-gallery">
        {/* Affichage des articles */}
        {articles.map((article) => (
          <div key={article.id} className="catalogue-item">
            <img src={article.image} alt={article.name} className="catalogue-item-image"/>
            <h4 class="h4catalog">{article.name}</h4>
            <p>{article.description}</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Catalogue;
