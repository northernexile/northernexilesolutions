
import React from "react"
import {Grid, Paper, Typography} from "@mui/material";

const Education = () => {

    return (
        <Paper style={{padding:8,marginBottom:8,paddingBottom:16}}>
            <Grid container spacing={2}>
                <Grid item>
                    <Typography component={`div`} style={{paddingBottom:6}} variant={`p`}>Sheffield Hallam University 2003 - 2006 BSc (Hons) Information Technology Software (2:1)</Typography>
                    <Typography component={`div`} variant={`p`}>Wombwell High School 1985 -1990 GCSE`s (A-C) including Maths, English and Science</Typography>
                </Grid>
            </Grid>
        </Paper>
    )
}

export default Education
