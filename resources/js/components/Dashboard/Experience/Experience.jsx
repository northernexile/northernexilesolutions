
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {cardStyle} from "../../../snippets/cardStyle";
import ResumeData from "../../Resume/Data/ResumeData";

export default function Experience() {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader className={`title-bar`} title={`Experience`}/>
                <CardContent>
                    <ResumeData />
                </CardContent>
            </Card>
        </Grid>
    )
}
