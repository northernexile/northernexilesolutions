
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";

export default function Resume() {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={{
                      paddingTop: 0,
                      paddingLeft:0,
                      paddingRight:0,
                      paddingBottom:8,
                      margin:8,
                      marginTop:80,
                      marginBottom:32,
                      backgroundColor:'rgba(255,255,255,0.8)'
                  }}
            >
                <CardHeader className={`title-bar`} title={`Our Experience`}/>
                <CardContent>
                    TODO
                </CardContent>
            </Card>
        </Grid>
    )
}
