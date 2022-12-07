import React from 'react'
import ButtonAppBar from "../components/Header/Header";
import { Outlet } from "react-router-dom";
import SiteBottomNavigation from "../components/Footer/BottomNavigation";

export default function Root() {
    return (
        <>
            <div id="header">
                <ButtonAppBar />
            </div>
            <div id="content">
                <Outlet />
            </div>
            <div id="footer">
                <SiteBottomNavigation />
            </div>
        </>
    )
}
