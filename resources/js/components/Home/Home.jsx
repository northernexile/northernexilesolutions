
import React from "react";
import {Grid} from "@mui/material";
import Intro from './Intro'
import Technologies from "./Technologies";
import Sectors from "./Sectors";

export default function Home() {
    return (
        <>
            <Grid
                spacing={2}

                justifyContent="center"
                container item xs={12}>
                <Grid item xs={7}>
                    <Intro />
                </Grid>
                <Grid item xs={3}>
                    <Technologies />
                    <Sectors />
                </Grid>
            </Grid>
        </>
    )
}
