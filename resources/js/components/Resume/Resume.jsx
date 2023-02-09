
import React, {useState} from "react";
import {Card, CardContent, CardHeader, Grid, Tab, Tabs} from "@mui/material";
import CV from "./CV";
import Box from "@mui/material/Box";
import Graphs from "./Graphs";
import Education from "./Education";

export default function Resume() {

    const [tabIndex,setTabIndex] = useState(0)

    const handleTabChange = (event, newTabIndex) => {
        setTabIndex(newTabIndex);
    };

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
                    <Tabs value={tabIndex} onChange={handleTabChange}>
                        <Tab label="Work History" />
                        <Tab label="Technical Record" />
                        <Tab label="Education" />
                    </Tabs>
                    <Box sx={2}>
                        {tabIndex === 0 && (
                            <CV />
                        )}
                        {tabIndex === 1 && (
                            <Graphs />
                        )}
                        {tabIndex === 2 && (
                            <Education />
                        )}
                    </Box>
                </CardContent>
            </Card>
        </Grid>
    )
}
