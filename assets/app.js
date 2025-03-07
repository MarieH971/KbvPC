import React from 'react';
import ReactDOM from 'react-dom';
import { registerReactControllerComponents } from '@symfony/ux-react';
import './bootstrap.js';

// Importer le fichier CSS
import './styles/app.css';

// Importer les composants
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';  // Utilisation de Routes au lieu de Switch

import Catalogue from './react/controllers/Catalogue.jsx';
import Actualites from './react/controllers/Actualites.jsx';
 

// Enregistrer les composants React pour Symfony UX
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));

ReactDOM.render(
    <Router>
        <Routes>
            {/* Définition des routes */}
            
            <Route path="/catalog" element={<Catalogue />} />
            <Route path="/actualites" element={<Actualites />} />
            
        </Routes>
    </Router>,
    document.getElementById('root') // Assurez-vous que cet ID correspond à l'élément HTML dans Twig
);