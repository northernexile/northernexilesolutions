
import React from "react";
import {Grid, Paper} from "@mui/material";

export default function Home() {
    return (
        <Grid item xs={8}>
            <Paper elevation={2}
                   style={{
                       padding: 8,
                       marginTop:8,
                       marginBottom:8
                   }}
            >
                <h2>Welcome to Northern Exile Solutions Ltd</h2>
                <p>We are based in the Forest of Dean and Wye Valley, providing web development solutions primarily on
                a contract basis.</p>
                <p>We provide a full stack service, specialising in progressive server side php frameworks such as <strong>Symfony</strong> and <strong>Laravel</strong></p>
                <p>On the client side we have extensive experience with modern Javascript frameworks such as <strong>VueJs</strong> and <strong>React</strong></p>
                <p>Our industry experience covers many sectors, including:</p>
                <ul>
                    <li>Flights/Holidays</li>
                    <li>Manufacturing</li>
                    <li>Fintech</li>
                    <li>Real Estate</li>
                    <li>Telecommunications</li>
                    <li>Digital Agencies</li>
                    <li>Price Comparison</li>
                </ul>
                <p>We strive to remain current and on top of the latest innovations in our working practices</p>
                <p>We are especially interested in working with progressive well organised teams, who are committed to open and accountable communication and delivering quality software.</p>
            </Paper>
        </Grid>
    )
}
