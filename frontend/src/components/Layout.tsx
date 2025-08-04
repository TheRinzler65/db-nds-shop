import { NavBar } from "@/components/Navbar";
import { Outlet } from "react-router-dom";

export default function Layout() {
  return (
    <>
      <NavBar />
      <Outlet />
    </>
  );
}
