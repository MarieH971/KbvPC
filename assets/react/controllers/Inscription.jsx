import React from 'react';
import { useNavigate } from 'react-router-dom';


const Inscription = () => {
    // Utilisation de useNavigate pour la redirection
    const navigate = useNavigate();

    // Fonction pour rediriger vers la page du formulaire d'adhésion
    const goToAdhesionForm = () => {
        navigate('/adhesion'); // Redirige vers la page de formulaire d'adhésion
    };

   

    return (
        <div>
            {/* Partie 1 : Logo et Menu */}
            <div className="header">
                <div className="logo">
                    <img src="https://fakeimg.pl/100x100/" alt="Logo" />
                </div>
                <div className="menu">
                    <h2>Menu de la page</h2>
                    <button onClick={goToAdhesionForm}>Adhérer à l'association</button>
                </div>
            </div>

            {/* Partie 2 : Documents à fournir */}
            <div className="documents">
                <h2>Documents à fournir</h2>
                <ul>
                    <li>Formulaire demande de licence</li>
                    <li>Certificat médical (annotation: le certificat est valable 3 ans)</li>
                </ul>
                <button>Transmettre mes documents</button> {/* Tu peux rajouter un bouton pour télécharger ou envoyer les documents */}
            </div>

            {/* Partie 3 : Tarifs */}
            <div className="tarifs">
                <h2>Tarifs</h2>
                <ul>
                    <li>Adhésion simple : Jeu libre compris sur réservation</li>
                    <li>Adhésion avec Entraînements</li>
                    <li>Sport Santé</li>
                </ul>
            </div>
        </div>
    );
}

export default Inscription;