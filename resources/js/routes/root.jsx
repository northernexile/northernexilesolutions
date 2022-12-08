import React from 'react'
import ButtonAppBar from "../components/Header/Header";
import { Outlet } from "react-router-dom";
import SiteBottomNavigation from "../components/Footer/BottomNavigation";
import {Grid} from "@mui/material";

export default function Root() {
    return (
        <>
            <div id="header">
                <ButtonAppBar />
            </div>
            <div id="content">
                <Grid container spacing={2}>
                    <Outlet />
                    <Grid item xs={4}>R Nav</Grid>
                </Grid>
            </div>
            <div id="footer">
                <SiteBottomNavigation />
            </div>
        </>
    )
}
