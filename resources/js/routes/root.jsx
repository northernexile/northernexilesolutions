import React from 'react'
import ButtonAppBar from "../components/Header/Header";
import { Outlet } from "react-router-dom";
import SiteBottomNavigation from "../components/Footer/BottomNavigation";
import {Grid,Box} from "@mui/material";

export default function Root() {
    return (
        <>
            <div id="header">
                <ButtonAppBar />
            </div>
            <div id="content">
                <Box display="flex"
                     justifyContent="center">
                    <Grid containerspacing={1}>
                        <Outlet />
                    </Grid>
                </Box>
            </div>
            <div id="footer">
                <SiteBottomNavigation />
            </div>
        </>
    )
}
