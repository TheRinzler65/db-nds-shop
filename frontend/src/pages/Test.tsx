import { useEffect, useState } from "react";
import axios from "axios";

interface Utilisateur {
  id: number;
  nom: string;
  email: string;
}

function App() {
  const [utilisateurs, setUtilisateurs] = useState<Utilisateur[]>([]);

  useEffect(() => {
    axios
      .get("http://localhost:3001/utilisateurs")
      .then((response) => {
        setUtilisateurs(response.data);
      })
      .catch((error) => {
        console.error("Erreur lors du chargement des utilisateurs:", error);
      });
  }, []);

  return (
    <div>
      <h1>Liste des utilisateurs</h1>
      <ul>
        {utilisateurs.map((u) => (
          <li key={u.id}>
            {u.nom} ({u.email})
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
