// symfony ux
import './bootstrap.js';

// Importer le JavaScript de Bootstrap
import 'bootstrap';
// Importer le CSS de Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';

import './styles/style.css';


import { registerReactControllerComponents } from '@symfony/ux-react';

registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));
