import React from 'react';
import '../../styles/app.css'

const Catalogue = () => {
  // Tableau d'articles
  const articles = [
    { id: 1, name: 'Article 1', image: 'https://via.placeholder.com/150', description: 'Description de l\'article 1' },
    { id: 2, name: 'Article 2', image: 'https://via.placeholder.com/150', description: 'Description de l\'article 2' },
    { id: 3, name: 'Article 3', image: 'https://via.placeholder.com/150', description: 'Description de l\'article 3' },
    { id: 4, name: 'Article 4', image: 'https://via.placeholder.com/150', description: 'Description de l\'article 4' },
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
            <h3>{article.name}</h3>
            <p>{article.description}</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Catalogue;