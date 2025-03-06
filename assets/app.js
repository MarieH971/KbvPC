import React from 'react';
import ReactDOM from 'react-dom';
import { registerReactControllerComponents } from '@symfony/ux-react';
import './bootstrap.js';




/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));


import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Inscription from './react/controllers/Inscription.jsx';
import Catalogue from './react/controllers/Catalogue.jsx';
import Actualites from './react/controllers/Actualites.jsx';

ReactDOM.render(
    <Router>
        <Switch>
            {/* Route pour la page d'inscription */}
            <Route path="/inscription" component={Inscription} />
            {/* Route pour la page Catalogue */}
            <Route path="/catalog" component={Catalogue} />
            {/* Route pour la page Actualites */}
            <Route path="/actualites" component={Actualites} />
        </Switch>
    </Router>,
    document.getElementById('root') // Assurez-vous que cet ID correspond à l'élément HTML dans Twig
);