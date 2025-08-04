import { Route, Routes } from "react-router-dom";
import "./globals.css";
import SignUp from "./pages/SignUp.tsx";
import Home from "./pages/Home.tsx";
import Test from "./pages/Test.tsx";
import Layout from "./components/Layout.tsx";
import GameList from "./pages/GameList.tsx";
import About from "./pages/About.tsx";

export default function App() {
  return (
    <Routes>
      <Route element={<Layout />}>
        <Route index element={<Home />} />
        <Route path="/" element={<Home />} />
        <Route path="/test" element={<Test />} />
        <Route path="/liste-jeu" element={<GameList />} />
        <Route path="/a-propos" element={<About />} />
      </Route>
      <Route path="/sign-up" element={<SignUp />} />
    </Routes>
  );
}
