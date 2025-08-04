import express from "express";
import { PrismaClient } from "@prisma/client";

const prisma = new PrismaClient();

const app = express();

app.get("/api", (_req, res) => {
  res.json({ message: "Hello from Express + TSX!" });
});

app.listen(3001, () => {
  console.log("✅ Backend running on http://localhost:3001");
});

app.get("/users", async (_req, res) => {
  const users = await prisma.user.findMany();
  res.json(users);
});
