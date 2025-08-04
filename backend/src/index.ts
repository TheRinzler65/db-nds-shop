import express from "express";
import cors from "cors";
import dotenv from "dotenv";
import { PrismaClient } from "@prisma/client";

dotenv.config();

const app = express();
const prisma = new PrismaClient();
const port = 3001;

app.use(cors());
app.use(express.json());

app.get("/utilisateurs", async (req, res) => {
  const utilisateurs = await prisma.utilisateur.findMany();
  res.json(utilisateurs);
});

app.post("/utilisateurs", async (req, res) => {
  const { nom, email } = req.body;
  const newUser = await prisma.utilisateur.create({ data: { nom, email } });
  res.json(newUser);
});

app.listen(port, () => {
  console.log(`Backend démarré : http://localhost:${port}`);
});
