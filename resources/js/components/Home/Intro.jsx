
import {Card, CardContent, CardHeader} from "@mui/material";
import React from "react";
import Typography from "@mui/material/Typography";
import {Link} from "react-router-dom";

export default function Intro() {
    return (
            <Card elevation={2}
                   style={{
                       padding: 8,
                       marginTop:8,
                       marginBottom:8
                   }}
            >
                <CardHeader title="About us"/>
                <CardContent>
                    <Typography variant="p" component="div" >We are Software Developers based in The Forest of Dean & provide web development solutions primarily on
                        a contract basis.</Typography>
                    <Typography variant="p" component="div"><Link title="Contact us" to="/contact">Contact us</Link></Typography>
                </CardContent>
            </Card>
    )
}
